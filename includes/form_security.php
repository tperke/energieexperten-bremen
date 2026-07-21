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

function send_portal_mail(string $subject, array $lines): bool
{
    global $config;
    if (!$config['mail']['enabled']) {
        return false;
    }

    $recipient = valid_email($config['mail']['recipient']);
    $from = valid_email($config['mail']['from']);
    if ($recipient === null || $from === null || preg_match('/[\r\n]/', $subject)) {
        return false;
    }

    $body = implode("\n", array_map(static fn ($line): string => str_replace(["\r", "\0"], '', (string) $line), $lines));
    $headers = [
        'From: Energieexperten Bremen <' . $from . '>',
        'Content-Type: text/plain; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
    ];
    return mail($recipient, $subject, $body, implode("\r\n", $headers));
}
