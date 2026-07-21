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

