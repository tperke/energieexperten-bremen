<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Über das Portal', 'url' => site_url('ueber-uns/')]];
site_header('ueber_uns', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero"><div class="wrap narrow"><p class="eyebrow">Orientierung und Vermittlung</p><h1>Über das Portal Energieexperten Bremen</h1><p class="lead">Energieexperten Bremen ist als regionales Informationsportal und transparentes Anbieterportal konzipiert. Es erklärt Fachthemen, unterstützt bei der Auswahl und kann später bestätigte Anfragen an konkret benannte Anbieter vermitteln.</p></div></section>
    <section class="section"><div class="wrap content-layout"><article class="article-content">
        <section class="content-section"><h2>Was das Portal leistet</h2><p>Eigentümer, Vermieter, Wohnungseigentümergemeinschaften und Unternehmen erhalten eine verständliche Einordnung zu Energieberatung, Sanierungsfahrplan, Energieausweis, Förderung und Baubegleitung. Inhalte werden mit Prüfdatum und vorrangig amtlichen Quellen veröffentlicht.</p><p>Das Verzeichnis soll nachweisbare Leistungen realer Anbieter sichtbar machen. Profile erscheinen erst nach einer dokumentierten Prüfung zentraler Angaben und einer Bestätigung für die Veröffentlichung.</p></section>
        <section class="content-section"><h2>Was das Portal nicht ist</h2><p>Das Portal erbringt selbst keine Energieberatung, sofern dies nicht künftig ausdrücklich und mit nachgewiesener Qualifikation angeboten wird. Redaktionelle Informationen ersetzen keine Beratung für ein konkretes Gebäude, keine Rechtsberatung und keine Förderzusage.</p><p>Wir behaupten weder eine vollständige Marktübersicht noch eine automatische Neutralität jeder Platzierung. Umfang des Verzeichnisses, Prüfmaßstab und wirtschaftliche Beziehungen werden offen beschrieben.</p></section>
        <section class="content-section"><h2>Regionale Verantwortung</h2><p>Bremer Gebäude unterscheiden sich nach Bauzeit, Konstruktion, Nutzung und Wärmeversorgung. Das Portal verbindet deshalb bundesweite Anforderungen mit offiziellen Informationen des Landes Bremen und örtlichen Beratungsangeboten.</p><p>Stadtteilseiten werden erst veröffentlicht, wenn eigenständige, nachprüfbare Inhalte vorliegen. Automatisch erzeugte Seiten, die lediglich Ortsnamen austauschen, sind ausgeschlossen.</p></section>
        <section class="content-section"><h2>Finanzierung und künftige Angebote</h2><p>Geplant sind Basisprofile, sichtbar gekennzeichnete Premiumprofile, gesponserte Fachbeiträge und mögliche Vermittlungsmodelle. Diese Funktionen sind im Ausgangszustand deaktiviert. Bezahlte Inhalte oder Affiliate Empfehlungen werden erst nach Festlegung transparenter Regeln aktiviert und eindeutig gekennzeichnet.</p></section>
        <section class="content-section"><h2>Kontakt und Korrekturen</h2><p>Hinweise auf veraltete Quellen, fachliche Fehler oder Änderungen an einem Anbieterprofil sind willkommen. Jede nachvollziehbare Korrektur wird geprüft. Das Datum der letzten inhaltlichen Prüfung bleibt sichtbar.</p><a class="button secondary" href="<?= e(site_url('kontakt/')) ?>">Redaktion kontaktieren</a></section>
    </article><aside class="side-card"><p class="eyebrow">Transparenz</p><h2>Unsere Grundlagen</h2><ul class="check-list"><li>Keine erfundenen Anbieter</li><li>Keine künstlichen Bewertungen</li><li>Quellen mit Prüfdatum</li><li>Werbung klar gekennzeichnet</li><li>Keine automatische Datenweitergabe</li></ul><a class="text-link" href="<?= e(site_url('redaktionsrichtlinien/')) ?>">Richtlinien ansehen</a></aside></div></section>
</main>
<?php site_footer(); ?>

