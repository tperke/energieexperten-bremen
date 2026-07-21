<?php

declare(strict_types=1);

function render_standard_page(string $pageKey): void
{
    global $pages;
    $page = $pages[$pageKey] ?? null;
    if (!$page) {
        not_found();
    }

    $seo = seo_for($pageKey);
    $breadcrumbs = [
        ['name' => 'Startseite', 'url' => site_url()],
        ['name' => $page['title'], 'url' => site_url(ltrim($seo['path'], '/'))],
    ];
    site_header($pageKey, [
        'breadcrumbs' => $breadcrumbs,
        'faqs' => $page['faqs'] ?? [],
        'service' => $page['service'] ?? null,
    ]);
    render_breadcrumbs($breadcrumbs);
    ?>
<main id="main-content">
    <section class="page-hero">
        <div class="wrap narrow">
            <p class="eyebrow"><?= e($page['eyebrow']) ?></p>
            <h1><?= e($page['title']) ?></h1>
            <p class="lead"><?= e($page['lead']) ?></p>
            <div class="hero-actions">
                <a class="button" href="<?= e(site_url('anfrage/')) ?>">Unverbindliche Anfrage stellen</a>
                <a class="text-link" href="<?= e(site_url('energieexperten/')) ?>">Expertenverzeichnis ansehen</a>
            </div>
        </div>
    </section>
    <div class="wrap content-layout">
        <article class="article-content">
            <?php foreach ($page['sections'] as $section): ?>
                <section class="content-section">
                    <h2><?= e($section['title']) ?></h2>
                    <?php foreach ($section['paragraphs'] ?? [] as $paragraph): ?>
                        <p><?= e($paragraph) ?></p>
                    <?php endforeach; ?>
                    <?php if (!empty($section['bullets'])): ?>
                        <ul class="check-list">
                            <?php foreach ($section['bullets'] as $bullet): ?><li><?= e($bullet) ?></li><?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (!empty($section['steps'])): ?>
                        <ol class="steps-list">
                            <?php foreach ($section['steps'] as $step): ?>
                                <li><div><h3><?= e($step['title']) ?></h3><p><?= e($step['text']) ?></p></div></li>
                            <?php endforeach; ?>
                        </ol>
                    <?php endif; ?>
                    <?php if (!empty($section['callout'])): ?><p class="callout"><?= e($section['callout']) ?></p><?php endif; ?>
                    <?php if (!empty($section['cta'])): ?><a class="text-link" href="<?= e(site_url($section['cta']['url'])) ?>"><?= e($section['cta']['label']) ?></a><?php endif; ?>
                </section>
            <?php endforeach; ?>
            <section class="content-section faq-section" aria-labelledby="faq-heading">
                <p class="eyebrow">Häufige Fragen</p>
                <h2 id="faq-heading">Fragen und Antworten</h2>
                <?php render_faqs($page['faqs'] ?? []); ?>
            </section>
            <?php render_sources($page['sources'] ?? []); ?>
        </article>
        <aside class="side-card" aria-label="Nächster Schritt">
            <p class="eyebrow">Gut vorbereitet</p>
            <h2>Ihr Vorhaben einordnen</h2>
            <p>Beschreiben Sie Gebäude, gewünschte Leistung und geplante Maßnahme. Eine Weitergabe erfolgt derzeit nicht automatisch.</p>
            <a class="button full" href="<?= e(site_url('anfrage/')) ?>">Anfrage vorbereiten</a>
        </aside>
    </div>
    <section class="final-cta">
        <div class="wrap narrow">
            <p class="eyebrow">Nächster Schritt</p>
            <h2>Finden Sie die passende fachliche Unterstützung</h2>
            <p>Vergleichen Sie Qualifikation und Leistungsumfang, bevor Sie Beratung oder Planung beauftragen.</p>
            <div class="hero-actions centered">
                <a class="button light" href="<?= e(site_url('energieexperten/')) ?>">Energieexperten finden</a>
                <a class="button outline-light" href="<?= e(site_url('anfrage/')) ?>">Anfrage stellen</a>
            </div>
        </div>
    </section>
</main>
<?php
    site_footer();
}

