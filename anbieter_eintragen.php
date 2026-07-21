<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$errors = [];
$old = [];
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $old = $_POST;
    $errors = validate_form_context('provider', $_POST);
    $company = normalize_text($_POST['company'] ?? '', 180);
    $contact = normalize_text($_POST['contact'] ?? '', 120);
    $email = valid_email($_POST['email'] ?? '');
    $website = normalize_text($_POST['provider_website'] ?? '', 250);
    $listUrl = normalize_text($_POST['list_url'] ?? '', 300);
    $services = normalize_multiline($_POST['services'] ?? '', 1500);
    if ($company === '') $errors[] = 'Bitte geben Sie den Unternehmensnamen an.';
    if ($contact === '') $errors[] = 'Bitte nennen Sie eine verantwortliche Kontaktperson.';
    if ($email === null) $errors[] = 'Bitte geben Sie eine gültige E Mail Adresse an.';
    if ($website !== '' && filter_var($website, FILTER_VALIDATE_URL) === false) $errors[] = 'Bitte geben Sie eine vollständige Webseitenadresse an.';
    if ($listUrl !== '' && filter_var($listUrl, FILTER_VALIDATE_URL) === false) $errors[] = 'Bitte geben Sie einen vollständigen Link zum Listeneintrag an.';
    if (mb_strlen($services) < 20) $errors[] = 'Bitte beschreiben Sie Ihre Leistungen mit mindestens 20 Zeichen.';
    if (!isset($_POST['accuracy'])) $errors[] = 'Bitte bestätigen Sie die Richtigkeit Ihrer Angaben.';
    if (!isset($_POST['privacy_acknowledged'])) $errors[] = 'Bitte bestätigen Sie, dass Sie den Datenschutzhinweis gelesen haben.';
    if ($errors === []) {
        $sent = send_portal_mail('Anbieteranfrage über Energieexperten Bremen', ['Unternehmen: ' . $company, 'Kontaktperson: ' . $contact, 'E Mail: ' . $email, 'Webseite: ' . ($website ?: 'nicht angegeben'), 'Expertenliste: ' . ($listUrl ?: 'nicht angegeben'), '', 'Leistungen:', $services, '', 'Richtigkeit bestätigt: ja', 'Veröffentlichung erlaubt: noch nicht, gesonderte Freigabe erforderlich']);
        if ($sent) {
            $_SESSION['form_success'] = 'Ihre Anbieteranfrage wurde übermittelt. Eine Veröffentlichung erfolgt erst nach Prüfung und gesonderter Bestätigung.';
            header('Location: ' . site_url('danke/'), true, 303);
            exit;
        }
        $errors[] = 'Der Versand ist derzeit nicht eingerichtet. Ihre Angaben wurden nicht gespeichert.';
    }
}
$context = form_context('provider');
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Anbieter eintragen', 'url' => site_url('anbieter-eintragen/')]];
site_header('anbieter', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero"><div class="wrap narrow"><p class="eyebrow">Für Energieberater und Planungsbüros</p><h1>Als Anbieter bei Energieexperten Bremen eintragen</h1><p class="lead">Präsentieren Sie Ihre nachweisbaren Leistungen für Bremen. Profile werden erst nach Prüfung und dokumentierter Freigabe veröffentlicht. Eine Platzierung begründet keine Ranking oder Anfragegarantie.</p></div></section>
    <section class="section"><div class="wrap"><div class="benefit-grid"><article><span>01</span><h2>Regional auffindbar</h2><p>Ein klar strukturiertes Profil macht Tätigkeitsgebiete, Gebäudetypen und Leistungen verständlich.</p></article><article><span>02</span><h2>Nachvollziehbar geprüft</h2><p>Listeneintrag, Kontaktdaten und Veröffentlichungserlaubnis werden vor Freischaltung dokumentiert.</p></article><article><span>03</span><h2>Transparent dargestellt</h2><p>Basisprofile und bezahlte Hervorhebungen erhalten eine eindeutige Kennzeichnung und Sortierlogik.</p></article></div></div></section>
    <section class="section process-section"><div class="wrap split-layout"><div><p class="eyebrow">Aufnahmeverfahren</p><h2>Von der Anfrage bis zur Freigabe</h2><p>Nach Ihrer Kontaktaufnahme fordern wir die für das Profil erforderlichen Nachweise an. Sie erhalten die zusammengestellten Angaben zur Prüfung und bestätigen Richtigkeit, Veröffentlichungsrecht sowie Bildrechte.</p></div><ol class="process-grid"><li><span>01</span><div><h3>Anfrage senden</h3><p>Unternehmen, Kontakt und Leistungen nennen.</p></div></li><li><span>02</span><div><h3>Nachweise prüfen</h3><p>Kontaktdaten und Qualifikationen verifizieren.</p></div></li><li><span>03</span><div><h3>Profil abstimmen</h3><p>Texte, Bilder und Tätigkeitsgebiete freigeben.</p></div></li><li><span>04</span><div><h3>Veröffentlichen</h3><p>Erst nach dokumentierter Bestätigung freischalten.</p></div></li></ol></div></section>
    <section class="section form-section"><div class="wrap form-layout"><div class="form-card"><h2>Anbieteranfrage</h2>
        <?php if (!$config['mail']['enabled']): ?><div class="notice warning"><strong>Projektstatus:</strong> Der E Mail Versand ist noch nicht konfiguriert.</div><?php endif; ?>
        <?php if ($errors): ?><div class="form-errors" role="alert"><h2>Bitte prüfen Sie Ihre Angaben</h2><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <form method="post" action="<?= e(site_url('anbieter-eintragen/')) ?>" class="secure-form">
            <input type="hidden" name="_token" value="<?= e($context['token']) ?>"><input type="hidden" name="_started_at" value="<?= e($context['started_at']) ?>"><div class="honeypot" aria-hidden="true"><label for="website">Webseite</label><input id="website" name="website" type="text" tabindex="-1" autocomplete="off"></div>
            <div class="field-grid">
                <div class="field full"><label for="company">Unternehmensname <span aria-hidden="true">*</span></label><input id="company" name="company" type="text" maxlength="180" required value="<?= e(safe_old($old, 'company')) ?>" autocomplete="organization"></div>
                <div class="field"><label for="contact">Kontaktperson <span aria-hidden="true">*</span></label><input id="contact" name="contact" type="text" maxlength="120" required value="<?= e(safe_old($old, 'contact')) ?>" autocomplete="name"></div>
                <div class="field"><label for="email">E Mail Adresse <span aria-hidden="true">*</span></label><input id="email" name="email" type="email" maxlength="190" required value="<?= e(safe_old($old, 'email')) ?>" autocomplete="email"></div>
                <div class="field"><label for="provider_website">Unternehmenswebseite</label><input id="provider_website" name="provider_website" type="url" maxlength="250" placeholder="https://" value="<?= e(safe_old($old, 'provider_website')) ?>"></div>
                <div class="field"><label for="list_url">Link zur offiziellen Expertenliste</label><input id="list_url" name="list_url" type="url" maxlength="300" placeholder="https://" value="<?= e(safe_old($old, 'list_url')) ?>"></div>
                <div class="field full"><label for="services">Leistungen und Gebäudetypen <span aria-hidden="true">*</span></label><textarea id="services" name="services" minlength="20" maxlength="1500" rows="6" required><?= e(safe_old($old, 'services')) ?></textarea></div>
            </div>
            <div class="privacy-box"><h2>Bestätigung und Datenschutz</h2><p>Diese Anfrage führt noch nicht zur Veröffentlichung. Der Portalbetreiber nutzt die Angaben zur Prüfung und Rückmeldung. Vor einem öffentlichen Profil wird eine gesonderte Bestätigung für Angaben, Personen, Logos und Bilder eingeholt.</p><label class="checkbox"><input type="checkbox" name="accuracy" value="1" required<?= checked(isset($old['accuracy'])) ?>><span>Ich bestätige, dass die eingereichten Angaben richtig sind. <span aria-hidden="true">*</span></span></label><label class="checkbox"><input type="checkbox" name="privacy_acknowledged" value="1" required<?= checked(isset($old['privacy_acknowledged'])) ?>><span>Ich habe den Datenschutzhinweis und die <a href="<?= e(site_url('datenschutz/')) ?>">Datenschutzerklärung</a> gelesen. <span aria-hidden="true">*</span></span></label></div>
            <button class="button large" type="submit">Prüfung anfragen</button>
        </form>
    </div><aside class="form-aside"><h2>Qualitätsanforderungen</h2><ul class="check-list"><li>Nachweisbare Kontaktdaten</li><li>Passende fachliche Qualifikation</li><li>Bestätigte Tätigkeitsgebiete</li><li>Rechte an Texten, Logos und Bildern</li><li>Aktualisierung bei Änderungen</li></ul><p>Kostenpflichtige Profilarten sind technisch vorbereitet, aber noch nicht aktiviert.</p></aside></div></section>
</main>
<?php site_footer(); ?>
