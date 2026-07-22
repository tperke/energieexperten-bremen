<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$failures = [];

function check(bool $condition, string $message): void
{
    global $failures;
    if (!$condition) {
        $failures[] = $message;
        echo "FEHLER: {$message}\n";
        return;
    }
    echo "OK: {$message}\n";
}

function rgb_from_hex(string $hex): array
{
    $hex = ltrim($hex, '#');
    return [
        hexdec(substr($hex, 0, 2)) / 255,
        hexdec(substr($hex, 2, 2)) / 255,
        hexdec(substr($hex, 4, 2)) / 255,
    ];
}

function relative_luminance(string $hex): float
{
    $channels = array_map(
        static fn (float $value): float => $value <= 0.04045 ? $value / 12.92 : (($value + 0.055) / 1.055) ** 2.4,
        rgb_from_hex($hex)
    );
    return 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];
}

function contrast_ratio(string $foreground, string $background): float
{
    $first = relative_luminance($foreground);
    $second = relative_luminance($background);
    return (max($first, $second) + 0.05) / (min($first, $second) + 0.05);
}

$jsonFiles = ['leistungen.json', 'artikel.json', 'experten.json', 'stadtteile.json'];
foreach ($jsonFiles as $file) {
    $path = $root . '/data/' . $file;
    $data = json_decode((string) file_get_contents($path), true);
    check(json_last_error() === JSON_ERROR_NONE && is_array($data), $file . ' ist gültiges JSON');
}

$articles = json_decode((string) file_get_contents($root . '/data/artikel.json'), true, 512, JSON_THROW_ON_ERROR);
check(count($articles) >= 6, 'Mindestens sechs Ratgeberbeiträge vorhanden');
$slugs = array_column($articles, 'slug');
check(count($slugs) === count(array_unique($slugs)), 'Artikeladressen sind eindeutig');
foreach ($articles as $article) {
    check(!empty($article['title']) && !empty($article['intro']) && count($article['sections'] ?? []) >= 4, 'Beitrag vollständig: ' . ($article['slug'] ?? 'ohne Adresse'));
    check(!empty($article['sources']) && !empty($article['updated']), 'Quelle und Aktualisierung vorhanden: ' . $article['slug']);
}

require $root . '/includes/config.php';
require $root . '/includes/seo.php';
require $root . '/includes/form_security.php';

check($config['mail']['host'] === 'smtp.ionos.de', 'IONOS SMTP-Server ist konfiguriert');
check($config['mail']['port'] === 465 && $config['mail']['encryption'] === 'ssl', 'SMTP nutzt SSL auf Port 465');
check($config['mail']['auto_tls'] === true && $config['mail']['authentication'] === true, 'Auto TLS und SMTP-Authentifizierung sind aktiviert');
check($config['mail']['recipient'] === 'info@energieexperten-bremen.de', 'Formularziel ist korrekt konfiguriert');
check(mail_is_configured() === false, 'Passwort-Platzhalter verhindert unbeabsichtigten SMTP-Versand');

$contrastChecks = [
    ['#17242c', '#fcfcfa', 4.5, 'Fließtext auf Seitenhintergrund'],
    ['#5a6870', '#fcfcfa', 4.5, 'Sekundärtext auf Seitenhintergrund'],
    ['#245f47', '#ffffff', 4.5, 'Textlink auf Weiß'],
    ['#ffffff', '#2f775a', 4.5, 'Primärschaltfläche'],
    ['#d9f3e3', '#245f47', 4.5, 'CTA-Eyebrow auf dunklem Grün'],
    ['#ffffff', '#1d5b43', 4.5, 'Hero-Überschrift auf hellstem Verlaufswert'],
    ['#e7f0f4', '#1d5b43', 4.5, 'Hero-Einleitung auf hellstem Verlaufswert'],
    ['#aebfc7', '#0b2332', 4.5, 'Footer-Sekundärtext'],
    ['#647982', '#ffffff', 3.0, 'Formularrahmen als UI-Komponente'],
];
foreach ($contrastChecks as [$foreground, $background, $minimum, $label]) {
    $ratio = contrast_ratio($foreground, $background);
    check($ratio >= $minimum, sprintf('Kontrast %s: %.2f:1 (mindestens %.1f:1)', $label, $ratio, $minimum));
}

$expectedSeo = ['home', 'energieberater', 'energieberatung', 'sanierungsfahrplan', 'energieausweis', 'foerdermittel', 'baubegleitung', 'nichtwohngebaeude', 'experten', 'anbieter', 'anfrage', 'ratgeber', 'ueber_uns', 'redaktion', 'kontakt', 'impressum', 'datenschutz', '404'];
foreach ($expectedSeo as $key) {
    check(isset($seoPages[$key]['title'], $seoPages[$key]['description'], $seoPages[$key]['path']), 'SEO Konfiguration vorhanden: ' . $key);
}
$titles = array_column($seoPages, 'title');
check(count($titles) === count(array_unique($titles)), 'Seitentitel sind eindeutig');

foreach ($config['sources'] as $key => $source) {
    check(str_starts_with($source['url'], 'https://'), 'Quelle nutzt HTTPS: ' . $key);
    check((bool) preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $source['checked']), 'Quelle besitzt Prüfdatum: ' . $key);
}

$requiredFiles = ['index.php', '.htaccess', 'robots.txt', 'sitemap.php', 'assets/css/style.css', 'assets/js/main.js', 'assets/images/logo.svg', 'assets/images/favicon.svg', 'assets/images/hero_bremen.webp', 'README.md'];
foreach ($requiredFiles as $file) {
    check(is_file($root . '/' . $file) && filesize($root . '/' . $file) > 0, 'Erforderliche Datei vorhanden: ' . $file);
}

if ($failures !== []) {
    echo "\n" . count($failures) . " Prüfung oder Prüfungen fehlgeschlagen.\n";
    exit(1);
}

echo "\nAlle Projektprüfungen erfolgreich.\n";
