<?php

declare(strict_types=1);

function site_footer(): void
{
    global $config;
    ?>
<footer class="site-footer">
    <div class="wrap footer-grid">
        <div class="footer-intro">
            <img src="<?= e(site_url('assets/images/logo-inverse.svg')) ?>" width="238" height="50" loading="lazy" decoding="async" alt="Energieexperten Bremen">
            <p>Regionales Informationsportal für Energieberatung, energetische Sanierung und die Suche nach qualifizierten Fachleuten in Bremen.</p>
            <p class="transparency-note">Das Portal ist selbst kein Energieberatungsunternehmen. Anbieterprofile und bezahlte Platzierungen werden sichtbar gekennzeichnet.</p>
        </div>
        <div>
            <h2>Orientierung</h2>
            <ul>
                <li><a href="<?= e(site_url('energieberater-bremen/')) ?>">Energieberater finden</a></li>
                <li><a href="<?= e(site_url('energieberatung-bremen/')) ?>">Energieberatung</a></li>
                <li><a href="<?= e(site_url('sanierungsfahrplan-bremen/')) ?>">Sanierungsfahrplan</a></li>
                <li><a href="<?= e(site_url('ratgeber/')) ?>">Ratgeber</a></li>
                <li><a href="<?= e(site_url('glossar/')) ?>">Glossar Energieberatung</a></li>
            </ul>
        </div>
        <div>
            <h2>Portal</h2>
            <ul>
                <li><a href="<?= e(site_url('ueber-uns/')) ?>">Über das Portal</a></li>
                <li><a href="<?= e(site_url('redaktionsrichtlinien/')) ?>">Redaktion und Transparenz</a></li>
                <li><a href="<?= e(site_url('anbieter-eintragen/')) ?>">Anbieter eintragen</a></li>
                <li><a href="<?= e(site_url('kontakt/')) ?>">Kontakt</a></li>
            </ul>
        </div>
        <div>
            <h2>Rechtliches</h2>
            <ul>
                <li><a href="<?= e(site_url('impressum/')) ?>">Impressum</a></li>
                <li><a href="<?= e(site_url('datenschutz/')) ?>">Datenschutz</a></li>
                <li><a href="<?= e(site_url('sitemap.xml')) ?>">Sitemap</a></li>
            </ul>
        </div>
    </div>
    <div class="wrap footer-bottom">
        <p>© <?= e(date('Y')) ?> <?= e($config['site']['name']) ?></p>
        <p>Fachinformationen geprüft am <?= e(format_date_de($config['site']['content_reviewed_at'])) ?></p>
    </div>
</footer>
</body>
</html>
<?php
}
