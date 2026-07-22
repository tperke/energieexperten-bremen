<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$terms = [
    ['term' => 'BAFA', 'definition' => 'Das Bundesamt für Wirtschaft und Ausfuhrkontrolle setzt verschiedene Förderprogramme des Bundes um. Dazu gehört auch die geförderte Energieberatung für Wohngebäude.'],
    ['term' => 'BEG', 'definition' => 'Die Bundesförderung für effiziente Gebäude bündelt Förderangebote für energetische Maßnahmen an Wohngebäuden und Nichtwohngebäuden. Bedingungen und Zuständigkeiten können sich ändern.'],
    ['term' => 'Bedarfsausweis', 'definition' => 'Ein Bedarfsausweis bewertet den berechneten Energiebedarf eines Gebäudes anhand von Bauweise, Gebäudehülle und Anlagentechnik. Das Verhalten einzelner Bewohner steht dabei nicht im Mittelpunkt.'],
    ['term' => 'DIN V 18599', 'definition' => 'Diese Normenreihe beschreibt die energetische Bewertung von Gebäuden. Sie berücksichtigt unter anderem Heizung, Kühlung, Lüftung, Beleuchtung und Warmwasser.'],
    ['term' => 'DIN EN 16247-1', 'definition' => 'Die Norm beschreibt Anforderungen an Energieaudits. Sie betrifft insbesondere die strukturierte Untersuchung von Energieeinsatz und Einsparmöglichkeiten in Unternehmen und Organisationen.'],
    ['term' => 'Endenergiebedarf', 'definition' => 'Der Endenergiebedarf beschreibt die Energiemenge, die ein Gebäude unter festgelegten Bedingungen für Heizung, Warmwasser und weitere Anwendungen benötigt.'],
    ['term' => 'Energieeffizienz-Expertenliste', 'definition' => 'Die Liste des Bundes führt qualifizierte Fachleute für bestimmte Förderprogramme. Wichtig ist nicht nur ein Eintrag, sondern die passende Kategorie für Gebäude und Vorhaben.'],
    ['term' => 'Gebäudeenergiegesetz (GEG)', 'definition' => 'Das Gebäudeenergiegesetz enthält energetische Anforderungen an beheizte oder gekühlte Gebäude. Es regelt unter anderem Vorgaben für Neubau, Bestand und Energieausweise.'],
    ['term' => 'Heizlast', 'definition' => 'Die Heizlast ist die Wärmeleistung, die benötigt wird, um Räume auch bei einer festgelegten niedrigen Außentemperatur ausreichend warm zu halten.'],
    ['term' => 'Hydraulischer Abgleich', 'definition' => 'Beim hydraulischen Abgleich wird die Heizungsanlage so eingestellt, dass jeder Heizkörper oder Heizkreis die benötigte Wärmemenge erhält.'],
    ['term' => 'Individueller Sanierungsfahrplan (iSFP)', 'definition' => 'Ein iSFP zeigt aufeinander abgestimmte Sanierungsschritte für ein Wohngebäude. Er soll Eigentümern helfen, Maßnahmen in einer sinnvollen Reihenfolge zu planen.'],
    ['term' => 'KfW', 'definition' => 'Die Kreditanstalt für Wiederaufbau setzt Förderangebote des Bundes um. Dazu können Kredite und Zuschüsse für energetische Gebäudemaßnahmen gehören.'],
    ['term' => 'Primärenergiebedarf', 'definition' => 'Der Primärenergiebedarf berücksichtigt zusätzlich zur Energie im Gebäude den Aufwand für Gewinnung, Umwandlung und Transport des verwendeten Energieträgers.'],
    ['term' => 'U-Wert', 'definition' => 'Der Wärmedurchgangskoeffizient beschreibt, wie viel Wärme durch ein Bauteil fließt. Ein niedriger U-Wert steht in der Regel für eine bessere Wärmedämmung.'],
    ['term' => 'Verbrauchsausweis', 'definition' => 'Ein Verbrauchsausweis stützt sich auf den gemessenen Energieverbrauch mehrerer Abrechnungszeiträume. Das Ergebnis wird daher auch vom Verhalten der Bewohner beeinflusst.'],
    ['term' => 'Wärmebrücke', 'definition' => 'Eine Wärmebrücke ist ein Bereich der Gebäudehülle, an dem mehr Wärme nach außen gelangt als in angrenzenden Bauteilen. Dort können niedrigere Oberflächentemperaturen auftreten.'],
    ['term' => 'Wohnungseigentümergemeinschaft (WEG)', 'definition' => 'Eine WEG besteht aus den Eigentümern der einzelnen Wohnungen oder Einheiten eines Gebäudes. Viele energetische Maßnahmen erfordern gemeinschaftliche Beschlüsse.'],
];

$breadcrumbs = [
    ['name' => 'Startseite', 'url' => site_url()],
    ['name' => 'Glossar', 'url' => site_url('glossar/')],
];
site_header('glossar', ['breadcrumbs' => $breadcrumbs, 'defined_terms' => $terms]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero">
        <div class="wrap narrow">
            <p class="eyebrow">Einfach nachschlagen</p>
            <h1>Fachbegriffe zu Energieberatung und Sanierung erklärt</h1>
            <p class="lead">Das Glossar erklärt häufig verwendete Abkürzungen und Fachbegriffe in klarer Sprache. Die Erläuterungen dienen der ersten Orientierung und ersetzen keine Prüfung des konkreten Gebäudes oder Förderfalls.</p>
        </div>
    </section>
    <section class="section">
        <div class="wrap content-layout">
            <article class="article-content">
                <div class="glossary-intro">
                    <h2>Begriffe von BAFA bis Wärmebrücke</h2>
                    <p>Bei Beratung, Förderung und Sanierungsplanung tauchen viele Abkürzungen auf. Hier finden Sie eine kurze Bedeutung und den Zusammenhang, in dem der Begriff meist verwendet wird.</p>
                </div>
                <dl class="glossary-list">
                    <?php foreach ($terms as $term): ?>
                        <div id="<?= e(id_slug($term['term'])) ?>">
                            <dt><?= e($term['term']) ?></dt>
                            <dd><?= e($term['definition']) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            </article>
            <aside class="side-card" aria-label="Weiterführende Inhalte">
                <p class="eyebrow">Mehr erfahren</p>
                <h2>Wissen anwenden</h2>
                <p>Die Leistungsseiten und Ratgeber erklären, wie diese Begriffe bei einem konkreten Vorhaben zusammenhängen.</p>
                <a class="button full" href="<?= e(site_url('ratgeber/')) ?>">Zum Ratgeber</a>
                <a class="text-link" href="<?= e(site_url('energieberatung-bremen/')) ?>">Energieberatung verstehen</a>
            </aside>
        </div>
    </section>
</main>
<?php site_footer(); ?>
