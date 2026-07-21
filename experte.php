<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$slug = normalize_text($_GET['slug'] ?? '', 120);
$data = load_json('experten.json');
$profile = null;
foreach ($data['public_profiles'] ?? [] as $candidate) {
    if (!empty($candidate['published']) && !empty($candidate['verified']) && hash_equals((string) $candidate['slug'], $slug)) {
        $profile = $candidate;
        break;
    }
}
if (!$profile) {
    not_found();
}

$profileTitle = (string) $profile['company'];
$path = '/energieexperten/' . $profile['slug'] . '/';
$breadcrumbs = [
    ['name' => 'Startseite', 'url' => site_url()],
    ['name' => 'Energieexperten', 'url' => site_url('energieexperten/')],
    ['name' => $profileTitle, 'url' => site_url(ltrim($path, '/'))],
];
$seo = ['title' => $profileTitle . ' in Bremen', 'description' => (string) ($profile['summary'] ?? 'Bestätigtes Anbieterprofil im Portal Energieexperten Bremen.'), 'path' => $path];
site_header('experten', ['seo' => $seo, 'breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <article>
        <header class="page-hero compact"><div class="wrap narrow">
            <?php if (($profile['profile_type'] ?? '') === 'premium'): ?><span class="ad-label">Premiumeintrag</span><?php endif; ?>
            <p class="eyebrow">Bestätigtes Anbieterprofil</p><h1><?= e($profileTitle) ?></h1><p class="lead"><?= e($profile['summary'] ?? '') ?></p>
        </div></header>
        <div class="wrap content-layout"><div class="article-content">
            <section class="content-section"><h2>Leistungen</h2><ul class="check-list"><?php foreach ($profile['service_labels'] ?? [] as $service): ?><li><?= e($service) ?></li><?php endforeach; ?></ul></section>
            <section class="content-section"><h2>Gebäude und Tätigkeitsgebiete</h2><p><?= e(implode(', ', $profile['building_types'] ?? [])) ?></p><p><?= e(implode(', ', $profile['regions'] ?? [])) ?></p></section>
            <section class="content-section"><h2>Qualifikation</h2><ul class="check-list"><?php foreach ($profile['qualifications'] ?? [] as $qualification): ?><li><?= e($qualification) ?></li><?php endforeach; ?></ul><?php if (!empty($profile['official_list_url'])): ?><a class="text-link" href="<?= e($profile['official_list_url']) ?>" rel="noopener noreferrer">Eintrag in der offiziellen Expertenliste prüfen</a><?php endif; ?></section>
            <section class="content-section"><h2>Über den Anbieter</h2><p><?= e($profile['description'] ?? '') ?></p></section>
            <p class="review-status"><strong>Profil geprüft am:</strong> <?= e(format_date_de($profile['verified_at'] ?? $config['site']['content_reviewed_at'])) ?></p>
        </div><aside class="side-card"><h2>Kontakt</h2><address><?= e($profile['company']) ?><br><?= e($profile['street'] ?? '') ?><br><?= e(trim(($profile['postal_code'] ?? '') . ' ' . ($profile['city'] ?? ''))) ?></address><?php if (!empty($profile['phone'])): ?><p><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $profile['phone'])) ?>"><?= e($profile['phone']) ?></a></p><?php endif; ?><?php if (!empty($profile['website'])): ?><a class="button full" href="<?= e($profile['website']) ?>" rel="noopener noreferrer">Webseite besuchen</a><?php endif; ?><p class="small">Kontaktdaten und Veröffentlichung wurden vom Anbieter bestätigt. Prüfen Sie Leistungsumfang und Eignung für Ihr Vorhaben selbst.</p></aside></div>
    </article>
</main>
<?php site_footer(); ?>
