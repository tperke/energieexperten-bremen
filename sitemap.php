<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

header('Content-Type: application/xml; charset=UTF-8');
header('X-Robots-Tag: noindex');
$entries = [];
$paths = [
    '/', '/energieberater-bremen/', '/energieberatung-bremen/', '/sanierungsfahrplan-bremen/',
    '/energieausweis-bremen/', '/foerdermittelberatung-bremen/', '/baubegleitung-bremen/',
    '/nichtwohngebaeude-bremen/', '/energieexperten/', '/ratgeber/', '/anbieter-eintragen/',
    '/ueber-uns/', '/redaktionsrichtlinien/', '/glossar/'
];
foreach ($paths as $path) {
    $entries[] = ['path' => $path, 'lastmod' => $config['site']['content_reviewed_at']];
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
