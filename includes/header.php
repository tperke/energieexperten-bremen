<?php

declare(strict_types=1);

function site_header(string $pageKey, array $options = []): void
{
    global $config, $cspNonce;
    $seo = seo_for($pageKey, $options['seo'] ?? []);
    $robots = $options['robots'] ?? $seo['robots'] ?? 'index,follow,max-image-preview:large';
    $canonical = site_url(ltrim($seo['path'], '/'));
    $schema = build_schema($pageKey, $seo, $options);
    $titleWithBrand = $seo['title'] . ' | ' . $config['site']['name'];
    $documentTitle = mb_strlen($titleWithBrand) <= 70 ? $titleWithBrand : $seo['title'];

    if (!headers_sent()) {
        header('Content-Type: text/html; charset=UTF-8');
        header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-" . $cspNonce . "'; style-src 'self'; img-src 'self'; font-src 'self'; connect-src 'self'; media-src 'none'; object-src 'none'; frame-src 'none'; frame-ancestors 'none'; base-uri 'self'; form-action 'self'; upgrade-insecure-requests");
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=()');
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: DENY');
        header('Cross-Origin-Opener-Policy: same-origin');
    }

    ?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($documentTitle) ?></title>
    <meta name="description" content="<?= e($seo['description']) ?>">
    <meta name="robots" content="<?= e($robots) ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">
    <meta property="og:locale" content="de_DE">
    <meta property="og:type" content="<?= e($seo['type'] ?? 'article') ?>">
    <meta property="og:title" content="<?= e($seo['title']) ?>">
    <meta property="og:description" content="<?= e($seo['description']) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:site_name" content="<?= e($config['site']['name']) ?>">
    <meta property="og:image" content="<?= e(site_url('assets/images/og_image.webp')) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="theme-color" content="#123247">
    <link rel="icon" href="<?= e(site_url('assets/images/favicon.svg')) ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?= e(asset_url('css/style.css')) ?>">
    <script type="application/ld+json" nonce="<?= e($cspNonce) ?>"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>
    <script src="<?= e(asset_url('js/main.js')) ?>" defer></script>
</head>
<body>
<a class="skip-link" href="#main-content">Direkt zum Inhalt</a>
<header class="site-header">
    <div class="wrap header-inner">
        <a class="brand" href="<?= e(site_url()) ?>" aria-label="Energieexperten Bremen Startseite">
            <img src="<?= e(site_url('assets/images/logo.svg')) ?>" width="238" height="50" alt="Energieexperten Bremen">
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="main-navigation">
            <span aria-hidden="true"></span><span aria-hidden="true"></span><span aria-hidden="true"></span>
            <span class="visually-hidden">Navigation öffnen</span>
        </button>
        <?php render_navigation(); ?>
        <a class="button header-cta" href="<?= e(site_url('anfrage/')) ?>">Anfrage stellen</a>
    </div>
</header>
<?php
}
