<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Redaktionsrichtlinien', 'url' => site_url('redaktionsrichtlinien/')]];
site_header('redaktion', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero"><div class="wrap narrow"><p class="eyebrow">Recherche, Prüfung und Kennzeichnung</p><h1>Redaktionsrichtlinien und Transparenz</h1><p class="lead">Diese Regeln beschreiben, wie Inhalte, Anbieterprofile und mögliche bezahlte Platzierungen ausgewählt, geprüft, sortiert und aktualisiert werden.</p></div></section>
    <section class="section"><div class="wrap content-layout"><article class="article-content">
        <section class="content-section"><h2>Quellen und Aktualität</h2><p>Für Förderprogramme, Gesetze und regionale Vorgaben werden vorrangig zuständige Behörden, offizielle Programmseiten und Gesetzestexte genutzt. Ergänzende Quellen werden nur verwendet, wenn sie einen klaren zusätzlichen Nutzen haben.</p><p>Jede zeitabhängige Aussage erhält einen dokumentierten Prüfstand. Lassen sich Gültigkeit, Zuständigkeit oder regionale Anwendung nicht zweifelsfrei bestätigen, wird die Angabe nicht als gesicherte Tatsache veröffentlicht.</p></section>
        <section class="content-section"><h2>Autoren und fachliche Prüfung</h2><p>Beiträge nennen eine verantwortliche Redaktion und den Stand der Prüfung. Eine fachliche oder rechtliche Prüfung wird nur ausgewiesen, wenn eine konkrete qualifizierte Person den veröffentlichten Inhalt tatsächlich geprüft hat.</p><p>Korrekturen werden nach nachvollziehbarer Prüfung eingearbeitet. Wesentliche Änderungen führen zu einem neuen Aktualisierungsdatum.</p></section>
        <section class="content-section"><h2>Aufnahme von Anbietern</h2><p>Vor Veröffentlichung werden Unternehmensidentität, Kontaktdaten, angebotene Leistungen und angegebene Qualifikationen anhand geeigneter Nachweise geprüft. Personenbezogene Angaben, Logos und Bilder erfordern eine dokumentierte Bestätigung des Anbieters.</p><p>Öffentlich auffindbare Angaben werden nicht allein deshalb übernommen, weil sie an anderer Stelle im Internet stehen. Anbieter können Berichtigung oder Entfernung verlangen.</p></section>
        <section class="content-section"><h2>Standardsortierung</h2><p>Die vorgesehene Standardsortierung zeigt zunächst vollständig geprüfte Basisprofile alphabetisch. Ein Filter kann nach nachgewiesenen Leistungen oder bedienten Gebieten eingrenzen. Bezahlte Platzierungen verändern diese Standardsortierung nur in einem getrennten und deutlich gekennzeichneten Bereich.</p><p>Das Portal gibt keine Ranking, Sichtbarkeits oder Anfragegarantie. Ein Eintrag ist keine individuelle Empfehlung für jeden Besucher.</p></section>
        <section class="content-section"><h2>Werbung, Provisionen und Unabhängigkeit</h2><p>Premiumprofile tragen die Bezeichnung Premiumeintrag oder Anzeige. Gesponserte Beiträge werden am Anfang als Werbung oder gesponserter Inhalt gekennzeichnet. Affiliate Links erhalten eine verständliche Kennzeichnung und passende technische Linkattribute.</p><p>Aktuell sind Premiumprofile, gesponserte Inhalte, Affiliate Links und Vermittlungsprovisionen deaktiviert. Sollte ein Anbieter künftig für eine Anfrage oder Platzierung zahlen, wird das Modell vor Aktivierung auf dieser Seite beschrieben.</p></section>
        <section class="content-section"><h2>Bewertungen und Nachweise</h2><p>Das Portal veröffentlicht keine erfundenen Bewertungen, künstlichen Sterne, Zertifikate oder Erfolgszahlen. Ein Bewertungssystem wird erst eingeführt, wenn Echtheit, Moderation, Betroffenenrechte und Darstellung nachvollziehbar geregelt sind.</p></section>
    </article><aside class="side-card"><p class="eyebrow">Stand</p><h2>21. Juli 2026</h2><p>Die Richtlinien werden vor Aktivierung eines neuen Geschäftsmodells und mindestens bei wesentlichen gesetzlichen oder redaktionellen Änderungen geprüft.</p><a class="text-link" href="<?= e(site_url('kontakt/')) ?>">Hinweis an die Redaktion</a></aside></div></section>
</main>
<?php site_footer(); ?>

