<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$data = load_json('experten.json');
$profiles = array_values(array_filter($data['public_profiles'] ?? [], static fn (array $profile): bool => !empty($profile['published']) && !empty($profile['verified'])));
$filter = normalize_text($_GET['leistung'] ?? '', 80);
if ($filter !== '') {
    $profiles = array_values(array_filter($profiles, static fn (array $profile): bool => in_array($filter, $profile['services'] ?? [], true)));
}
$directoryFaqs = [
    ['question' => 'Wie finde ich einen geeigneten Energieberater in Bremen?', 'answer' => 'Grenzen Sie zuerst Gebäudetyp, gewünschte Leistung und mögliches Förderprogramm ein. Prüfen Sie anschließend Listenkategorie, Erfahrung, Leistungsumfang, Termin und Honorar mehrerer geeigneter Fachpersonen.'],
    ['question' => 'Ist jeder Energieberater für BAFA oder KfW zugelassen?', 'answer' => 'Nein. Je nach Programm, Gebäude und Maßnahme ist eine bestimmte Qualifikation oder Listenkategorie erforderlich. Kontrollieren Sie die Eintragung für Ihr konkretes Vorhaben in der offiziellen Energieeffizienz Expertenliste.'],
    ['question' => 'Was kostet ein Energieberater in Bremen?', 'answer' => 'Das Honorar hängt von Gebäudegröße, Unterlagen, Beratungsprodukt, Berechnungen, Förderbegleitung und Anzahl der Termine ab. Fordern Sie ein schriftliches Angebot mit eindeutigem Leistungsumfang an.'],
    ['question' => 'Welche Unterlagen benötigt ein Energieexperte?', 'answer' => 'Hilfreich sind Baupläne, Flächen, Verbrauchsdaten, Angaben zur Heizung, Schornsteinfegerprotokolle und Nachweise früherer Modernisierungen. Fehlende Unterlagen sollten vor dem Angebot genannt werden.'],
    ['question' => 'Empfiehlt das Portal einzelne Anbieter?', 'answer' => 'Nein. Das Portal stellt bestätigte Angaben transparent dar. Bezahlte Hervorhebungen werden gekennzeichnet und verändern weder Prüfung noch Sortiergrundsätze. Die Auswahlentscheidung bleibt bei den Auftraggebenden.'],
];
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Energieexperten', 'url' => site_url('energieexperten/')]];
site_header('experten', ['breadcrumbs' => $breadcrumbs, 'faqs' => $directoryFaqs, 'robots' => $filter !== '' ? 'noindex,follow' : 'index,follow,max-image-preview:large']);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero">
        <div class="wrap narrow">
            <p class="eyebrow">Transparentes Verzeichnis</p>
            <h1>Energieexperten in Bremen finden</h1>
            <p class="lead">Finden Sie fachliche Unterstützung für Energieberatung, Sanierungsfahrplan, Energieausweis und energetische Fachplanung. Das Verzeichnis veröffentlicht ausschließlich bestätigte Anbieterangaben und kennzeichnet bezahlte Hervorhebungen sichtbar.</p>
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
    <section class="section directory-guide" aria-labelledby="directory-guide-heading">
        <div class="wrap">
            <div class="section-heading">
                <div><p class="eyebrow">Auswahl vorbereiten</p><h2 id="directory-guide-heading">Energieberater in Bremen gezielt vergleichen</h2></div>
                <p>Die passende Fachperson richtet sich nach Gebäude, Beratungsziel und Förderweg. Ein allgemeiner Listeneintrag genügt nicht für jede Aufgabe.</p>
            </div>
            <div class="split-layout directory-guide-row">
                <div>
                    <h3>Welche Leistung benötigen Sie?</h3>
                    <p>Eine erste Energieberatung, ein individueller Sanierungsfahrplan, ein Energieausweis und die Fachplanung einer konkreten Maßnahme unterscheiden sich deutlich. Beschreiben Sie, welche Entscheidung vorbereitet werden soll und ob bereits Angebote oder Förderanträge geplant sind.</p>
                    <p>Für Wohngebäude, Nichtwohngebäude, Baudenkmale und bestimmte Förderprogramme bestehen unterschiedliche Qualifikationsbereiche. Prüfen Sie deshalb die passende Kategorie und Erfahrung mit vergleichbaren Gebäuden.</p>
                    <ul class="check-list"><li>Energieberatung für Wohngebäude</li><li>Individueller Sanierungsfahrplan</li><li>Energieausweis</li><li>Fördermittelberatung und Antragsschritte</li><li>Energetische Fachplanung und Baubegleitung</li><li>Nichtwohngebäude und betriebliche Anlagen</li></ul>
                </div>
                <div>
                    <h3>Angebote richtig anfragen</h3>
                    <p>Nennen Sie Baujahr, Nutzung, Größe, bekannte Modernisierungen und die gewünschte Leistung. Vorhandene Pläne, Verbrauchsdaten und Angaben zur Heizung helfen der Fachperson, Aufwand und Bearbeitungszeit realistisch einzuschätzen.</p>
                    <p>Ein vergleichbares Angebot sollte Vor Ort Termine, Berechnungen, Ergebnisunterlagen, Abschlussgespräch, Förderaufgaben und mögliche Zusatzkosten eindeutig ausweisen. Fragen Sie auch, wann die Bearbeitung beginnen kann und welche Unterlagen vorab benötigt werden.</p>
                    <a class="text-link" href="<?= e(site_url('energieberater-bremen/')) ?>">Auswahlkriterien für Energieberater lesen</a>
                </div>
            </div>
            <div class="split-layout directory-guide-row">
                <div>
                    <h3>Qualifikation und Unabhängigkeit prüfen</h3>
                    <p>Fragen Sie nach Ausbildung, Weiterbildungen, Listeneintragung und Referenzen für Ihren Gebäudetyp. Wenn Beratung, Produktempfehlung und Ausführung aus einer Hand angeboten werden, sollten wirtschaftliche Interessen transparent gemacht und Verantwortlichkeiten klar getrennt werden.</p>
                    <p>Ein Profil im Verzeichnis ersetzt diese Prüfung nicht. Es macht bestätigte Angaben vergleichbar und zeigt, für welche Leistungen ein Anbieter aufgenommen wurde.</p>
                </div>
                <div>
                    <h3>Honorar und mögliche Förderung einordnen</h3>
                    <p>Das Honorar hängt von Gebäudegröße, Komplexität, Unterlagen, Berechnungen und gewünschter Begleitung ab. Vergleichen Sie deshalb nie nur den Endpreis. Ein günstiges Angebot kann einen wesentlich geringeren Leistungsumfang enthalten.</p>
                    <p>Für bestimmte Beratungen können Förderprogramme bestehen. Bedingungen ändern sich jedoch. Prüfen Sie die aktuelle Originalquelle und die Reihenfolge von Antrag und Beauftragung, bevor Sie verbindliche Verträge schließen.</p>
                    <a class="text-link" href="<?= e(site_url('foerdermittelberatung-bremen/')) ?>">Fördermittelberatung in Bremen einordnen</a>
                </div>
            </div>
            <section class="content-section faq-section directory-faq" aria-labelledby="directory-faq-heading">
                <p class="eyebrow">Häufige Fragen</p>
                <h2 id="directory-faq-heading">Fragen zur Suche nach Energieexperten</h2>
                <?php render_faqs($directoryFaqs); ?>
            </section>
        </div>
    </section>
    <section class="editorial-note"><div class="wrap narrow"><h2>Aufnahme und Sortierung</h2><p>Basisprofile werden nach Vollständigkeit der Prüfung und anschließend alphabetisch dargestellt. Bezahlte Platzierungen erscheinen nur bei aktivierter Funktion und tragen eine sichtbare Kennzeichnung. Provisionen oder Anfragegarantien bestehen derzeit nicht.</p><a class="text-link" href="<?= e(site_url('redaktionsrichtlinien/')) ?>">Alle Kriterien lesen</a></div></section>
</main>
<?php site_footer(); ?>
