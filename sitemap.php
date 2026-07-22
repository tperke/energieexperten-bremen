<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

header('Content-Type: application/xml; charset=UTF-8');
header('X-Robots-Tag: noindex');
$entries = [];
$pageKeys = [
    'home', 'energieberater', 'energieberatung', 'sanierungsfahrplan',
    'energieausweis', 'foerdermittel', 'baubegleitung', 'nichtwohngebaeude',
    'experten', 'ratgeber', 'anbieter', 'ueber_uns', 'redaktion', 'glossar',
];
foreach ($pageKeys as $pageKey) {
    $seo = seo_for($pageKey);
    $entries[] = ['path' => $seo['path'], 'lastmod' => $seo['modified']];
}
foreach (load_json('artikel.json') as $article) {
    if (!empty($article['published_public'])) {
        $entries[] = ['path' => '/ratgeber/' . $article['slug'] . '/', 'lastmod' => $article['updated']];
    }
}
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($entries as $entry) {
    echo '  <url><loc>' . e(site_url(ltrim($entry['path'], '/'))) . '</loc><lastmod>' . e($entry['lastmod']) . '</lastmod></url>' . "\n";
}
echo '</urlset>';
