<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Impressum', 'url' => site_url('impressum/')]];
site_header('impressum', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero compact"><div class="wrap narrow"><p class="eyebrow">Rechtliche Angaben</p><h1>Impressum</h1><p class="lead">Angaben zum Diensteanbieter des Portals Energieexperten Bremen.</p></div></section>
    <section class="section legal-page"><div class="wrap narrow">
        <h2>Angaben zum Diensteanbieter</h2>
        <address>
            neu-protec Mediendesign<br>
            Hamburger Str. 43<br>
            40221 Düsseldorf
        </address>
        <h2>Vertreten durch</h2>
        <p>Thomas Perke</p>
        <h2>Kontakt</h2>
        <p>Telefon: <a href="tel:+4915678281339">0156 – 78 281 339</a><br>
            E-Mail: <a href="mailto:info@neu-protec.de">info@neu-protec.de</a></p>
        <h2>Verbraucherstreitbeilegung/Universalschlichtungsstelle</h2>
        <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
    </div></section>
</main>
<?php site_footer(); ?>
