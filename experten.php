<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$data = load_json('experten.json');
$profiles = array_values(array_filter($data['public_profiles'] ?? [], static fn (array $profile): bool => !empty($profile['published']) && !empty($profile['verified'])));
$filter = normalize_text($_GET['leistung'] ?? '', 80);
if ($filter !== '') {
    $profiles = array_values(array_filter($profiles, static fn (array $profile): bool => in_array($filter, $profile['services'] ?? [], true)));
}
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Energieexperten', 'url' => site_url('energieexperten/')]];
site_header('experten', ['breadcrumbs' => $breadcrumbs, 'robots' => $filter !== '' ? 'noindex,follow' : 'index,follow,max-image-preview:large']);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero">
        <div class="wrap narrow">
            <p class="eyebrow">Transparentes Verzeichnis</p>
            <h1>Energieexperten in Bremen finden</h1>
            <p class="lead">Das Verzeichnis veröffentlicht ausschließlich bestätigte Anbieterangaben. Bezahlte Hervorhebungen werden sichtbar gekennzeichnet und nicht mit einer fachlichen Empfehlung gleichgesetzt.</p>
        </div>
    </section>
    <section class="section directory-section">
        <div class="wrap">
            <form class="directory-filter" method="get" action="<?= e(site_url('energieexperten/')) ?>">
                <div><label for="leistung">Leistung</label><select id="leistung" name="leistung"><option value="">Alle Leistungen</option><?php foreach (load_json('leistungen.json') as $service): ?><option value="<?= e($service['slug']) ?>"<?= selected($filter, $service['slug']) ?>><?= e($service['name']) ?></option><?php endforeach; ?></select></div>
                <button class="button" type="submit">Filtern</button>
            </form>
            <?php if ($profiles === []): ?>
                <div class="empty-state large">
                    <div class="empty-icon" aria-hidden="true">✓</div>
                    <div><h2>Noch keine geprüften Profile veröffentlicht</h2><p>Wir zeigen keine erfundenen Beispielanbieter. Bis reale Profile geprüft und zur Veröffentlichung bestätigt wurden, nutzen Sie bitte die offizielle Energieeffizienz Expertenliste des Bundes.</p><p>Sie sind als Energieberater in Bremen tätig? Informieren Sie sich über Aufnahme und Prüfung.</p></div>
                    <div class="stack-actions"><a class="button" href="https://www.energie-effizienz-experten.de/" rel="noopener noreferrer">Offizielle Expertensuche</a><a class="button secondary" href="<?= e(site_url('anbieter-eintragen/')) ?>">Anbieter eintragen</a></div>
                </div>
            <?php else: ?>
                <div class="profile-grid">
                    <?php foreach ($profiles as $profile): ?>
                        <article class="profile-card">
                            <?php if (($profile['profile_type'] ?? '') === 'premium'): ?><span class="ad-label">Premiumeintrag</span><?php endif; ?>
                            <h2><a href="<?= e(site_url('energieexperten/' . $profile['slug'] . '/')) ?>"><?= e($profile['company']) ?></a></h2>
                            <p><?= e($profile['summary']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="editorial-note"><div class="wrap narrow"><h2>Aufnahme und Sortierung</h2><p>Basisprofile werden nach Vollständigkeit der Prüfung und anschließend alphabetisch dargestellt. Bezahlte Platzierungen erscheinen nur bei aktivierter Funktion und tragen eine sichtbare Kennzeichnung. Provisionen oder Anfragegarantien bestehen derzeit nicht.</p><a class="text-link" href="<?= e(site_url('redaktionsrichtlinien/')) ?>">Alle Kriterien lesen</a></div></section>
</main>
<?php site_footer(); ?>

