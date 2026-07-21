<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

header('Content-Type: application/xml; charset=UTF-8');
$paths = [
    '/', '/energieberater-bremen/', '/energieberatung-bremen/', '/sanierungsfahrplan-bremen/',
    '/energieausweis-bremen/', '/foerdermittelberatung-bremen/', '/baubegleitung-bremen/',
    '/nichtwohngebaeude-bremen/', '/energieexperten/', '/ratgeber/', '/anbieter-eintragen/',
    '/ueber-uns/', '/redaktionsrichtlinien/'
];
foreach (load_json('artikel.json') as $article) {
    if (!empty($article['published_public'])) {
        $paths[] = '/ratgeber/' . $article['slug'] . '/';
    }
}
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($paths as $path) {
    echo '  <url><loc>' . e(site_url(ltrim($path, '/'))) . '</loc><lastmod>' . e($config['site']['content_reviewed_at']) . '</lastmod></url>' . "\n";
}
echo '</urlset>';

