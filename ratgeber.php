<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$articles = array_values(array_filter(load_json('artikel.json'), static fn (array $article): bool => !empty($article['published_public'])));
$categories = array_values(array_unique(array_column($articles, 'category')));
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Ratgeber', 'url' => site_url('ratgeber/')]];
site_header('ratgeber', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero">
        <div class="wrap narrow">
            <p class="eyebrow">Wissen für bessere Entscheidungen</p>
            <h1>Ratgeber zu Energieberatung und Sanierung in Bremen</h1>
            <p class="lead">Die Beiträge beantworten konkrete Fragen, nennen ihren Prüfstand und führen zu den verwendeten Originalquellen. Zeitabhängige Angaben werden bei jeder Überarbeitung neu geprüft.</p>
        </div>
    </section>
    <section class="section">
        <div class="wrap">
            <nav class="category-nav" aria-label="Ratgeber Kategorien">
                <span>Kategorien:</span>
                <?php foreach ($categories as $category): ?><a href="#<?= e(id_slug($category)) ?>"><?= e($category) ?></a><?php endforeach; ?>
            </nav>
            <div class="card-grid article-grid wide">
                <?php $seenCategories = []; foreach ($articles as $article): $categoryId = id_slug($article['category']); $firstInCategory = !isset($seenCategories[$categoryId]); $seenCategories[$categoryId] = true; ?>
                    <article class="article-card"<?= $firstInCategory ? ' id="' . e($categoryId) . '"' : '' ?>>
                        <span class="article-category"><?= e($article['category']) ?></span>
                        <h2><a href="<?= e(site_url('ratgeber/' . $article['slug'] . '/')) ?>"><?= e($article['title']) ?></a></h2>
                        <p><?= e($article['excerpt']) ?></p>
                        <div class="article-meta"><span>Aktualisiert <?= e(format_date_de($article['updated'])) ?></span><span><?= e($article['reading_time']) ?> Minuten</span></div>
                        <a class="card-link" href="<?= e(site_url('ratgeber/' . $article['slug'] . '/')) ?>">Beitrag lesen<span aria-hidden="true">›</span></a>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="split-layout directory-guide-row guide-overview">
                <div>
                    <p class="eyebrow">Themen einordnen</p>
                    <h2>Energieberatung und Sanierung verständlich erklärt</h2>
                    <p>Eine energetische Modernisierung beginnt nicht mit einem einzelnen Produkt, sondern mit der Einordnung von Gebäude, Ziel und sinnvoller Reihenfolge. Unsere Beiträge erklären deshalb, wann eine Beratung sinnvoll ist, wie sich Beratungsformate unterscheiden und welche Unterlagen Entscheidungen belastbarer machen.</p>
                    <p>Bei zeitabhängigen Themen wie Fördermitteln nennen wir den Prüfstand und verlinken die zuständigen Originalquellen. Beträge und Bedingungen sollten dennoch unmittelbar vor Antrag oder Beauftragung erneut kontrolliert werden.</p>
                </div>
                <div>
                    <p class="eyebrow">Direkter Einstieg</p>
                    <h2>Passende Grundlagen für Ihr Vorhaben</h2>
                    <ul class="check-list"><li><a href="<?= e(site_url('energieberatung-bremen/')) ?>">Ablauf einer Energieberatung in Bremen</a></li><li><a href="<?= e(site_url('sanierungsfahrplan-bremen/')) ?>">Individuellen Sanierungsfahrplan verstehen</a></li><li><a href="<?= e(site_url('energieausweis-bremen/')) ?>">Bedarfs und Verbrauchsausweis einordnen</a></li><li><a href="<?= e(site_url('foerdermittelberatung-bremen/')) ?>">Förderwege und Antragsschritte prüfen</a></li><li><a href="<?= e(site_url('baubegleitung-bremen/')) ?>">Fachplanung und Baubegleitung vorbereiten</a></li></ul>
                </div>
            </div>
        </div>
    </section>
    <section class="editorial-note"><div class="wrap narrow"><h2>So entstehen unsere Beiträge</h2><p>Wir nutzen vorrangig amtliche und institutionelle Originalquellen, dokumentieren den Prüfstand und trennen redaktionelle Inhalte von bezahlten Platzierungen. Fachliche oder rechtliche Prüfung wird nur behauptet, wenn sie tatsächlich dokumentiert ist.</p><a class="text-link" href="<?= e(site_url('redaktionsrichtlinien/')) ?>">Redaktionsrichtlinien lesen</a></div></section>
</main>
<?php site_footer(); ?>
