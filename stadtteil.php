<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$slug = normalize_text($_GET['slug'] ?? '', 100);
$district = null;
foreach (load_json('stadtteile.json') as $candidate) {
    if (hash_equals((string) $candidate['slug'], $slug) && !empty($candidate['published']) && !empty($candidate['indexable'])) {
        $district = $candidate;
        break;
    }
}
if (!$district || !$config['features']['public_district_pages']) {
    not_found();
}
not_found();

