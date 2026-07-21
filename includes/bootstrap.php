<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

date_default_timezone_set($config['site']['timezone']);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', dirname(__DIR__) . '/storage/logs/php-error.log');

function start_secure_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');
    session_name('eeb_session');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id(true);
        $_SESSION['initiated'] = time();
    }
}

$cspNonce = base64_encode(random_bytes(18));

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/form_security.php';
require_once __DIR__ . '/seo.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/content.php';
require_once __DIR__ . '/navigation.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/footer.php';
require_once __DIR__ . '/page_renderer.php';
