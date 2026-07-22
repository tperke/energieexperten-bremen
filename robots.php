<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

header('Content-Type: text/plain; charset=UTF-8');
header('X-Robots-Tag: noindex');

if (empty($config['site']['public_launch_ready'])) {
    echo "User-agent: *\nDisallow: /\n";
    exit;
}

echo "User-agent: *\n";
echo "Allow: /\n";
echo "Disallow: /includes/\n";
echo "Disallow: /data/\n";
echo "Disallow: /storage/\n";
echo "Disallow: /*?*\n\n";
echo 'Sitemap: ' . site_url('sitemap.xml') . "\n";
