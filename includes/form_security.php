<?php

declare(strict_types=1);

function form_context(string $formName): array
{
    start_secure_session();
    $token = bin2hex(random_bytes(32));
    $startedAt = time();
    $_SESSION['forms'][$formName] = [
        'token' => $token,
        'started_at' => $startedAt,
    ];
    return ['token' => $token, 'started_at' => $startedAt];
}

function validate_form_context(string $formName, array $post): array
{
    global $config;
    start_secure_session();
    $errors = [];
    $stored = $_SESSION['forms'][$formName] ?? [];
    unset($_SESSION['forms'][$formName]);

    $token = isset($post['_token']) && is_string($post['_token']) ? $post['_token'] : '';
    if (!isset($stored['token']) || !hash_equals((string) $stored['token'], $token)) {
        $errors[] = 'Die Sitzung ist abgelaufen. Bitte laden Sie das Formular neu und versuchen Sie es erneut.';
    }

    $startedAt = isset($post['_started_at']) ? filter_var($post['_started_at'], FILTER_VALIDATE_INT) : false;
    if ($startedAt === false || !isset($stored['started_at']) || (int) $stored['started_at'] !== $startedAt) {
        $errors[] = 'Das Formular konnte nicht eindeutig geprüft werden. Bitte laden Sie die Seite neu.';
    } elseif (time() - $startedAt < $config['forms']['minimum_seconds']) {
        $errors[] = 'Das Formular wurde ungewöhnlich schnell abgesendet. Bitte prüfen Sie Ihre Angaben.';
    }

    if (!empty($post['website'])) {
        $errors[] = 'Die Anfrage konnte nicht verarbeitet werden.';
    }

    if (!rate_limit_allows($formName)) {
        $errors[] = 'Es wurden zu viele Anfragen gesendet. Bitte versuchen Sie es später erneut.';
    }

    return $errors;
}

function rate_limit_allows(string $formName): bool
{
    global $config;
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $key = hash_hmac('sha256', $formName . '|' . $ip, $config['forms']['rate_limit_salt']);
    $path = sys_get_temp_dir() . '/eeb_rate_' . $key . '.json';
    $now = time();
    $window = (int) $config['forms']['window_seconds'];
    $limit = (int) $config['forms']['maximum_requests'];
    $handle = fopen($path, 'c+');
    if ($handle === false) {
        return true;
    }

    try {
        if (!flock($handle, LOCK_EX)) {
            return true;
        }
        $raw = stream_get_contents($handle);
        $timestamps = json_decode($raw ?: '[]', true);
        if (!is_array($timestamps)) {
            $timestamps = [];
        }
        $timestamps = array_values(array_filter($timestamps, static fn ($item): bool => is_int($item) && $item > $now - $window));
        if (count($timestamps) >= $limit) {
            return false;
        }
        $timestamps[] = $now;
        ftruncate($handle, 0);
        rewind($handle);
        fwrite($handle, json_encode($timestamps, JSON_THROW_ON_ERROR));
        fflush($handle);
        return true;
    } finally {
        flock($handle, LOCK_UN);
        fclose($handle);
    }
}

function normalize_text(mixed $value, int $maxLength = 500): string
{
    if (!is_string($value)) {
        return '';
    }
    $value = trim(preg_replace('/\s+/u', ' ', $value) ?? '');
    return mb_substr($value, 0, $maxLength);
}

function normalize_multiline(mixed $value, int $maxLength = 3000): string
{
    if (!is_string($value)) {
        return '';
    }
    $value = trim(str_replace(["\r\n", "\r"], "\n", $value));
    return mb_substr($value, 0, $maxLength);
}

function valid_email(mixed $value): ?string
{
    $email = normalize_text($value, 190);
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
}

function valid_phone(mixed $value): ?string
{
    $phone = normalize_text($value, 50);
    if ($phone === '') {
        return '';
    }
    return preg_match('/^[0-9+()\/ .]{6,50}$/', $phone) ? $phone : null;
}

function mail_is_configured(): bool
{
    global $config;
    if (!$config['mail']['enabled']) {
        return false;
    }

    if (($config['mail']['transport'] ?? '') !== 'smtp') {
        return false;
    }

    $host = (string) ($config['mail']['host'] ?? '');
    $port = (int) ($config['mail']['port'] ?? 0);
    $username = valid_email($config['mail']['username'] ?? '');
    $password = (string) ($config['mail']['password'] ?? '');
    return preg_match('/^[a-z0-9.-]+$/i', $host) === 1
        && $port >= 1
        && $port <= 65535
        && $username !== null
        && $password !== ''
        && $password !== 'HIER_E-MAIL-PASSWORT_EINFUEGEN';
}

function smtp_read_response($socket): array|false
{
    $lines = [];
    $code = 0;
    while (($line = fgets($socket, 2048)) !== false) {
        $lines[] = rtrim($line, "\r\n");
        if (preg_match('/^(\d{3})([ -])/', $line, $matches) !== 1) {
            continue;
        }
        $code = (int) $matches[1];
        if ($matches[2] === ' ') {
            return ['code' => $code, 'lines' => $lines];
        }
    }
    return false;
}

function smtp_command($socket, string $command, array $expectedCodes): array|false
{
    if (fwrite($socket, $command . "\r\n") === false) {
        return false;
    }
    $response = smtp_read_response($socket);
    return $response !== false && in_array($response['code'], $expectedCodes, true) ? $response : false;
}

function send_smtp_mail(string $recipient, string $from, string $subject, string $body, ?string $replyTo = null): bool
{
    global $config;
    $mail = $config['mail'];
    $host = (string) $mail['host'];
    $port = (int) $mail['port'];
    $encryption = strtolower((string) $mail['encryption']);
    $implicitTls = $encryption === 'ssl';
    $transport = ($implicitTls ? 'ssl' : 'tcp') . '://' . $host . ':' . $port;
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
            'peer_name' => $host,
            'SNI_enabled' => true,
            'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT,
        ],
    ]);
    $errorNumber = 0;
    $errorMessage = '';
    $socket = @stream_socket_client(
        $transport,
        $errorNumber,
        $errorMessage,
        (int) ($mail['timeout_seconds'] ?? 15),
        STREAM_CLIENT_CONNECT,
        $context
    );
    if ($socket === false) {
        return false;
    }

    stream_set_timeout($socket, (int) ($mail['timeout_seconds'] ?? 15));
    try {
        $greeting = smtp_read_response($socket);
        if ($greeting === false || $greeting['code'] !== 220) {
            return false;
        }

        $serverName = (string) parse_url($config['site']['base_url'], PHP_URL_HOST);
        $serverName = preg_match('/^[a-z0-9.-]+$/i', $serverName) === 1 ? $serverName : 'localhost';
        $ehlo = smtp_command($socket, 'EHLO ' . $serverName, [250]);
        if ($ehlo === false) {
            return false;
        }

        if (!$implicitTls && !empty($mail['auto_tls'])) {
            $supportsStartTls = stripos(implode("\n", $ehlo['lines']), 'STARTTLS') !== false;
            if ($supportsStartTls) {
                if (smtp_command($socket, 'STARTTLS', [220]) === false
                    || !stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                    return false;
                }
                $ehlo = smtp_command($socket, 'EHLO ' . $serverName, [250]);
                if ($ehlo === false) {
                    return false;
                }
            } elseif ($encryption === 'tls') {
                return false;
            }
        }

        if (!empty($mail['authentication'])) {
            if (smtp_command($socket, 'AUTH LOGIN', [334]) === false
                || smtp_command($socket, base64_encode((string) $mail['username']), [334]) === false
                || smtp_command($socket, base64_encode((string) $mail['password']), [235]) === false) {
                return false;
            }
        }

        if (smtp_command($socket, 'MAIL FROM:<' . $from . '>', [250]) === false
            || smtp_command($socket, 'RCPT TO:<' . $recipient . '>', [250, 251]) === false
            || smtp_command($socket, 'DATA', [354]) === false) {
            return false;
        }

        $domain = substr(strrchr($from, '@') ?: '@energieexperten-bremen.de', 1);
        $headers = [
            'Date: ' . date(DATE_RFC2822),
            'Message-ID: <' . time() . '.' . bin2hex(random_bytes(8)) . '@' . $domain . '>',
            'From: Energieexperten Bremen <' . $from . '>',
            'To: ' . $recipient,
            'Subject: ' . mb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n"),
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
        ];
        if ($replyTo !== null) {
            $headers[] = 'Reply-To: ' . $replyTo;
        }
        $normalizedBody = str_replace(["\r\n", "\r"], "\n", $body);
        $normalizedBody = preg_replace('/^\./m', '..', $normalizedBody) ?? $normalizedBody;
        $payload = implode("\r\n", $headers) . "\r\n\r\n" . str_replace("\n", "\r\n", $normalizedBody);
        if (fwrite($socket, $payload . "\r\n.\r\n") === false) {
            return false;
        }
        $result = smtp_read_response($socket);
        return $result !== false && $result['code'] === 250;
    } finally {
        @fwrite($socket, "QUIT\r\n");
        fclose($socket);
    }
}

function send_portal_mail(string $subject, array $lines, ?string $replyTo = null): bool
{
    global $config;
    if (!mail_is_configured()) {
        return false;
    }

    $recipient = valid_email($config['mail']['recipient']);
    $from = valid_email($config['mail']['from']);
    $replyTo = $replyTo !== null ? valid_email($replyTo) : null;
    if ($recipient === null || $from === null || preg_match('/[\r\n]/', $subject)) {
        return false;
    }

    $body = implode("\n", array_map(static fn ($line): string => str_replace(["\r", "\0"], '', (string) $line), $lines));
    return send_smtp_mail($recipient, $from, $subject, $body, $replyTo);
}
