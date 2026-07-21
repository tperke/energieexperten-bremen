<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Impressum', 'url' => site_url('impressum/')]];
site_header('impressum', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
$operatorReady = operator_value('name') && operator_value('street') && operator_value('postal_code') && operator_value('city') && operator_value('email');
?>
<main id="main-content">
    <section class="page-hero compact"><div class="wrap narrow"><p class="eyebrow">Rechtliche Angaben</p><h1>Impressum</h1><p class="lead">Anbieterkennzeichnung für das Portal Energieexperten Bremen.</p></div></section>
    <section class="section legal-page"><div class="wrap narrow">
        <?php if (!$operatorReady): ?><div class="notice warning"><strong>Noch nicht zur Veröffentlichung freigegeben:</strong> Die gesetzlich erforderlichen Betreiberangaben sind in der Projektkonfiguration noch unvollständig.</div><?php endif; ?>
        <h2>Angaben zum Diensteanbieter</h2>
        <address>
            <?= e(operator_value('company') ?: 'Unternehmensbezeichnung vor Veröffentlichung ergänzen') ?><br>
            <?= e(operator_value('name') ?: 'Name des Betreibers vor Veröffentlichung ergänzen') ?><br>
            <?= e(operator_value('street') ?: 'Geschäftsanschrift vor Veröffentlichung ergänzen') ?><br>
            <?= e(trim((operator_value('postal_code') ?: '') . ' ' . (operator_value('city') ?: '')) ?: 'Postleitzahl und Ort vor Veröffentlichung ergänzen') ?><br>
            <?= e($config['operator']['country']) ?>
        </address>
        <h2>Kontakt</h2>
        <p>Telefon: <?= e(operator_value('phone') ?: 'vor Veröffentlichung ergänzen') ?><br>E Mail: <?= e(operator_value('email') ?: 'vor Veröffentlichung ergänzen') ?></p>
        <h2>Umsatzsteuer</h2><p>Umsatzsteuer Identifikationsnummer: <?= e(operator_value('vat_id') ?: 'sofern vorhanden vor Veröffentlichung ergänzen') ?></p>
        <h2>Redaktionell verantwortlich</h2><p><?= e(operator_value('editorial_responsible') ?: 'verantwortliche Person und Anschrift vor Veröffentlichung ergänzen') ?></p>
        <h2>Verbraucherstreitbeilegung</h2><p>Die erforderlichen Angaben zur Bereitschaft oder Verpflichtung zur Teilnahme an einem Streitbeilegungsverfahren werden nach Festlegung der Betreiberstruktur rechtlich geprüft und vor Veröffentlichung ergänzt.</p>
        <h2>Haftung für Fachinformationen</h2><p>Die redaktionellen Inhalte dienen der allgemeinen Information. Sie ersetzen keine Energieberatung, technische Planung, Förderentscheidung oder Rechtsberatung für einen konkreten Einzelfall. Für zeitabhängige Informationen ist die jeweils verlinkte Originalquelle zu prüfen.</p>
    </div></section>
</main>
<?php site_footer(); ?>

