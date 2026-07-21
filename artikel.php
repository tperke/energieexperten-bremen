<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$slug = normalize_text($_GET['slug'] ?? '', 120);
$articles = load_json('artikel.json');
$article = null;
foreach ($articles as $candidate) {
    if (!empty($candidate['published_public']) && hash_equals((string) $candidate['slug'], $slug)) {
        $article = $candidate;
        break;
    }
}
if (!$article) {
    not_found();
}

$path = '/ratgeber/' . $article['slug'] . '/';
$breadcrumbs = [
    ['name' => 'Startseite', 'url' => site_url()],
    ['name' => 'Ratgeber', 'url' => site_url('ratgeber/')],
    ['name' => $article['title'], 'url' => site_url(ltrim($path, '/'))],
];
$seoOverride = ['title' => $article['seo_title'] ?? $article['title'], 'description' => $article['excerpt'], 'path' => $path, 'type' => 'article'];
site_header('ratgeber', [
    'seo' => $seoOverride,
    'breadcrumbs' => $breadcrumbs,
    'faqs' => $article['faqs'],
    'article' => $article,
]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <article class="guide-article">
        <header class="article-header">
            <div class="wrap narrow">
                <span class="article-category"><?= e($article['category']) ?></span>
                <h1><?= e($article['title']) ?></h1>
                <p class="lead"><?= e($article['excerpt']) ?></p>
                <div class="byline">
                    <span>Von <?= e($article['author']) ?></span>
                    <span>Aktualisiert am <?= e(format_date_de($article['updated'])) ?></span>
                    <span><?= e($article['reading_time']) ?> Minuten Lesezeit</span>
                </div>
                <p class="review-status"><strong>Prüfstatus:</strong> <?= e($article['reviewer']) ?></p>
            </div>
        </header>
        <div class="wrap article-layout">
            <div class="article-content">
                <p class="answer-box"><?= e($article['intro']) ?></p>
                <?php foreach ($article['sections'] as $section): ?>
                    <section class="content-section">
                        <h2><?= e($section['heading']) ?></h2>
                        <?php foreach ($section['paragraphs'] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
                        <?php if (!empty($section['bullets'])): ?><ul class="check-list"><?php foreach ($section['bullets'] as $bullet): ?><li><?= e($bullet) ?></li><?php endforeach; ?></ul><?php endif; ?>
                    </section>
                <?php endforeach; ?>
                <section class="summary-box" aria-labelledby="summary-heading"><h2 id="summary-heading">Zusammenfassung</h2><p><?= e($article['summary']) ?></p></section>
                <section class="content-section"><h2>Ihre nächsten Schritte</h2><ol class="action-list"><?php foreach ($article['actions'] as $action): ?><li><?= e($action) ?></li><?php endforeach; ?></ol></section>
                <section class="content-section faq-section"><h2>Häufige Fragen</h2><?php render_faqs($article['faqs']); ?></section>
                <?php render_sources($article['sources']); ?>
            </div>
            <aside class="article-aside" aria-label="Weiterführende Aktion">
                <div class="side-card sticky"><p class="eyebrow">Passende Hilfe</p><h2>Vorhaben einordnen</h2><p>Finden Sie die für Gebäude und Förderweg passende fachliche Unterstützung.</p><a class="button full" href="<?= e(site_url('anfrage/')) ?>">Anfrage vorbereiten</a><a class="text-link" href="<?= e(site_url('energieexperten/')) ?>">Experten ansehen</a></div>
            </aside>
        </div>
    </article>
</main>
<?php site_footer(); ?>
