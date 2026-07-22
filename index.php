<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$services = load_json('leistungen.json');
$articles = array_values(array_filter(load_json('artikel.json'), static fn (array $article): bool => !empty($article['published_public'])));
$homeFaqs = [
    ['question' => 'Wann ist eine Energieberatung sinnvoll?', 'answer' => 'Vor einem Heizungstausch, dem Kauf eines älteren Gebäudes oder mehreren Sanierungsmaßnahmen schafft eine Beratung eine fachliche Entscheidungsgrundlage.'],
    ['question' => 'Wie finde ich einen qualifizierten Energieberater?', 'answer' => 'Prüfen Sie Erfahrung, Leistungsumfang und die für Ihr Vorhaben passende Eintragung in der Energieeffizienz Expertenliste des Bundes.'],
    ['question' => 'Welche Unterlagen sollte ich vorbereiten?', 'answer' => 'Hilfreich sind Baupläne, Flächenangaben, Verbrauchsdaten, Informationen zur Heizung und Nachweise über bereits ausgeführte Modernisierungen.'],
    ['question' => 'Werden meine Daten automatisch an Anbieter gesendet?', 'answer' => 'Nein. Derzeit erfolgt keine automatische Weitergabe. Eine Übermittlung setzt eine vorherige Information über den konkreten Empfänger und eine gesonderte Bestätigung voraus.'],
    ['question' => 'Sind Förderangaben dauerhaft gültig?', 'answer' => 'Nein. Programme und Bedingungen können sich kurzfristig ändern. Prüfen Sie vor Antrag oder Auftrag die verlinkten Originalquellen.'],
];

site_header('home', ['faqs' => $homeFaqs]);
?>
<main id="main-content">
    <section class="home-hero">
        <img class="hero-image" src="<?= e(site_url('assets/images/hero_bremen.webp')) ?>" srcset="<?= e(site_url('assets/images/hero_bremen_800.webp')) ?> 800w, <?= e(site_url('assets/images/hero_bremen_1200.webp')) ?> 1200w, <?= e(site_url('assets/images/hero_bremen.webp')) ?> 1600w" sizes="100vw" width="1600" height="900" alt="Illustration Bremer Wohnhäuser mit beispielhaft dargestellter energetischer Modernisierung">
        <div class="hero-overlay"></div>
        <div class="wrap hero-content">
            <p class="eyebrow light">Orientierung für Bremen</p>
            <h1>Energieberater und Energieexperten in Bremen finden</h1>
            <p>Informieren Sie sich verständlich über Energieberatung, Sanierungsplanung und Förderwege. Finden Sie anschließend eine Fachperson, deren Qualifikation zu Ihrem Gebäude und Vorhaben passt.</p>
            <div class="hero-actions">
                <a class="button light" href="<?= e(site_url('energieexperten/')) ?>">Energieexperten finden</a>
                <a class="button outline-light" href="<?= e(site_url('anfrage/')) ?>">Unverbindliche Anfrage stellen</a>
            </div>
            <ul class="trust-row">
                <li>Quellenbasiert</li><li>Regional eingeordnet</li><li>Ohne Tracking</li>
            </ul>
        </div>
    </section>

    <section class="quick-search" aria-labelledby="search-heading">
        <div class="wrap search-panel">
            <div><p class="eyebrow">Schneller Einstieg</p><h2 id="search-heading">Welche Unterstützung suchen Sie?</h2></div>
            <form action="<?= e(site_url('energieexperten/')) ?>" method="get" role="search">
                <label for="service-filter">Leistung auswählen</label>
                <select id="service-filter" name="leistung">
                    <option value="">Alle Leistungen</option>
                    <?php foreach ($services as $service): ?><option value="<?= e($service['slug']) ?>"><?= e($service['name']) ?></option><?php endforeach; ?>
                </select>
                <button class="button" type="submit">Auswahl anzeigen</button>
            </form>
        </div>
    </section>

    <section class="section services-section" aria-labelledby="services-heading">
        <div class="wrap">
            <div class="section-heading">
                <div><p class="eyebrow">Leistungen verstehen</p><h2 id="services-heading">Von der ersten Beratung bis zur Umsetzung</h2></div>
                <p>Wählen Sie zuerst die Leistung, die Ihre aktuelle Entscheidung unterstützt. Detaillierte Planung folgt erst, wenn Ziel und Gebäudezustand ausreichend geklärt sind.</p>
            </div>
            <div class="card-grid service-grid">
                <?php foreach ($services as $service): ?>
                    <article class="service-card">
                        <span class="service-icon" aria-hidden="true"><?= e($service['icon']) ?></span>
                        <h3><?= e($service['name']) ?></h3>
                        <p><?= e($service['summary']) ?></p>
                        <a class="card-link" href="<?= e(site_url($service['url'])) ?>">Mehr erfahren<span aria-hidden="true">›</span></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section process-section" aria-labelledby="process-heading">
        <div class="wrap split-layout">
            <div>
                <p class="eyebrow">Klarer Ablauf</p>
                <h2 id="process-heading">In vier Schritten zur passenden Unterstützung</h2>
                <p>Eine gute Anfrage beschreibt nicht nur die gewünschte Maßnahme. Gebäudetyp, Ausgangslage und Beratungsziel helfen, die richtige Qualifikation zu bestimmen.</p>
                <a class="text-link" href="<?= e(site_url('energieberatung-bremen/')) ?>">Ablauf einer Beratung kennenlernen</a>
            </div>
            <ol class="process-grid">
                <li><span>01</span><div><h3>Vorhaben beschreiben</h3><p>Gebäude, Anlass und geplante Maßnahmen einordnen.</p></div></li>
                <li><span>02</span><div><h3>Qualifikation prüfen</h3><p>Passende Listenkategorie und Erfahrung vergleichen.</p></div></li>
                <li><span>03</span><div><h3>Angebot abgrenzen</h3><p>Leistungen, Termine, Unterlagen und Honorar klären.</p></div></li>
                <li><span>04</span><div><h3>Ergebnisse nutzen</h3><p>Planung, Förderung und Umsetzung in richtiger Reihenfolge starten.</p></div></li>
            </ol>
        </div>
    </section>

    <section class="section qualification-section" aria-labelledby="qualification-heading">
        <div class="wrap split-layout reverse">
            <div class="info-visual" aria-hidden="true">
                <span class="visual-ring"></span><span class="visual-house">⌂</span>
                <div><strong>Qualifikation</strong><small>für das konkrete Vorhaben</small></div>
            </div>
            <div>
                <p class="eyebrow">Sorgfältig auswählen</p>
                <h2 id="qualification-heading">Ein Listeneintrag muss zum Förderweg passen</h2>
                <p>Die Energieeffizienz Expertenliste umfasst unterschiedliche Kategorien. Prüfen Sie, ob die Fachperson genau für Wohngebäude, Nichtwohngebäude, Denkmale oder das vorgesehene Förderprogramm eingetragen ist.</p>
                <ul class="check-list"><li>Qualifikationsnachweise</li><li>Erfahrung mit vergleichbaren Gebäuden</li><li>Transparenter Leistungsumfang</li><li>Offengelegte wirtschaftliche Interessen</li></ul>
                <a class="button secondary" href="<?= e(site_url('energieberater-bremen/')) ?>">Auswahlkriterien ansehen</a>
            </div>
        </div>
    </section>

    <section class="section bremen-section" aria-labelledby="bremen-heading">
        <div class="wrap narrow center">
            <p class="eyebrow light">Regionaler Kontext</p>
            <h2 id="bremen-heading">Sanierung in Bremen braucht den Blick auf Gebäude und Wärmeversorgung</h2>
            <p>Altbremer Häuser, Mehrfamilienhäuser und Nachkriegsbauten stellen unterschiedliche Anforderungen. Gleichzeitig geben Wärmeplanung, Landesrecht und verfügbare Beratungsangebote den örtlichen Rahmen vor. Entscheidungen sollten deshalb weder allein aus dem Baujahr noch aus einer allgemeinen Empfehlung abgeleitet werden.</p>
            <div class="region-links">
                <a href="<?= e(site_url('energieberatung-bremen/')) ?>">Energieberatung in Bremen</a>
                <a href="<?= e(site_url('foerdermittelberatung-bremen/')) ?>">Aktuelle Förderwege</a>
                <a href="https://klimabauzentrum.de/standorte/bremen" rel="noopener noreferrer">Klima Bau Zentrum</a>
            </div>
        </div>
    </section>

    <section class="section experts-preview" aria-labelledby="experts-heading">
        <div class="wrap">
            <div class="section-heading">
                <div><p class="eyebrow">Verzeichnis im Aufbau</p><h2 id="experts-heading">Geprüfte Anbieterprofile statt erfundener Einträge</h2></div>
                <p>Öffentliche Profile erscheinen erst, wenn Angaben, Veröffentlichung und Bildrechte bestätigt wurden. Bis dahin zeigen wir keine Beispielunternehmen, die mit echten Anbietern verwechselt werden könnten.</p>
            </div>
            <div class="empty-state">
                <div class="empty-icon" aria-hidden="true">✓</div>
                <div><h3>Noch keine öffentlichen Profile</h3><p>Nutzen Sie vorerst die offizielle Expertenliste des Bundes oder senden Sie eine Anfrage an das Portal. Eine automatische Weiterleitung findet nicht statt.</p></div>
                <a class="button secondary" href="https://www.energie-effizienz-experten.de/" rel="noopener noreferrer">Offizielle Liste öffnen</a>
            </div>
        </div>
    </section>

    <section class="section funding-section" aria-labelledby="funding-heading">
        <div class="wrap funding-panel">
            <div>
                <p class="eyebrow">Stand 22. Juli 2026</p>
                <h2 id="funding-heading">Förderbedingungen wurden aktuell angepasst</h2>
                <p>BAFA und KfW führen Programme für Beratung und energetische Maßnahmen. Die KfW weist seit dem 21. Juli 2026 auf angepasste Bedingungen mehrerer Produkte hin. Die früheren Bremer Landesprogramme zum Heizungstausch und zum Wärmeschutz im Wohngebäudebestand sind eingestellt.</p>
                <p class="small">Prüfen Sie Beträge, Fristen und Beginn des Vorhabens direkt bei der zuständigen Stelle.</p>
            </div>
            <div class="funding-links"><a href="<?= e(site_url('foerdermittelberatung-bremen/')) ?>">Förderwege einordnen</a><a href="https://www.kfw.de/inlandsfoerderung/Bundesf%C3%B6rderung-f%C3%BCr-effiziente-Geb%C3%A4ude/" rel="noopener noreferrer">Aktuelle KfW Informationen</a><a href="https://umwelt.bremen.de/klima/uebersicht-foerderprogramme-2147359" rel="noopener noreferrer">Bremer Förderübersicht</a></div>
        </div>
    </section>

    <section class="section guide-section" aria-labelledby="guide-heading">
        <div class="wrap">
            <div class="section-heading">
                <div><p class="eyebrow">Ratgeber</p><h2 id="guide-heading">Entscheidungen besser vorbereiten</h2></div>
                <a class="text-link" href="<?= e(site_url('ratgeber/')) ?>">Alle Beiträge ansehen</a>
            </div>
            <div class="card-grid article-grid">
                <?php foreach (array_slice($articles, 0, 3) as $article): ?>
                    <article class="article-card">
                        <span class="article-category"><?= e($article['category']) ?></span>
                        <h3><a href="<?= e(site_url('ratgeber/' . $article['slug'] . '/')) ?>"><?= e($article['title']) ?></a></h3>
                        <p><?= e($article['excerpt']) ?></p>
                        <div class="article-meta"><span>Aktualisiert <?= e(format_date_de($article['updated'])) ?></span><span><?= e($article['reading_time']) ?> Minuten</span></div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section faq-section home-faq" aria-labelledby="home-faq-heading">
        <div class="wrap narrow"><p class="eyebrow">Kurz beantwortet</p><h2 id="home-faq-heading">Häufige Fragen zur Energieberatung in Bremen</h2><?php render_faqs($homeFaqs); ?></div>
    </section>

    <section class="final-cta"><div class="wrap narrow"><p class="eyebrow light">Gut vorbereitet starten</p><h2>Ordnen Sie Ihr Vorhaben unverbindlich ein</h2><p>Beschreiben Sie Gebäude und Ziel. Ihre Angaben bleiben beim Portal, bis Sie einer konkret benannten Weitergabe gesondert zustimmen.</p><div class="hero-actions centered"><a class="button light" href="<?= e(site_url('anfrage/')) ?>">Anfrage stellen</a><a class="button outline-light" href="<?= e(site_url('energieexperten/')) ?>">Experten finden</a></div></div></section>
</main>
<?php site_footer(); ?>
