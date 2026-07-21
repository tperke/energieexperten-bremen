<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$errors = [];
$old = [];
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $old = $_POST;
    $errors = validate_form_context('contact', $_POST);
    $name = normalize_text($_POST['name'] ?? '', 120);
    $email = valid_email($_POST['email'] ?? '');
    $subject = normalize_text($_POST['subject'] ?? '', 120);
    $message = normalize_multiline($_POST['message'] ?? '', 3000);
    if ($name === '') $errors[] = 'Bitte geben Sie Ihren Namen an.';
    if ($email === null) $errors[] = 'Bitte geben Sie eine gültige E Mail Adresse an.';
    if ($subject === '') $errors[] = 'Bitte wählen Sie ein Thema.';
    if (mb_strlen($message) < 20) $errors[] = 'Bitte beschreiben Sie Ihr Anliegen mit mindestens 20 Zeichen.';
    if (!isset($_POST['privacy_acknowledged'])) $errors[] = 'Bitte bestätigen Sie, dass Sie den Datenschutzhinweis gelesen haben.';
    if ($errors === []) {
        $sent = send_portal_mail('Kontaktanfrage über Energieexperten Bremen', ['Thema: ' . $subject, 'Name: ' . $name, 'E Mail: ' . $email, '', 'Nachricht:', $message]);
        if ($sent) {
            $_SESSION['form_success'] = 'Ihre Nachricht wurde an den Portalbetreiber übermittelt.';
            header('Location: ' . site_url('danke/'), true, 303);
            exit;
        }
        $errors[] = 'Der Versand ist derzeit nicht eingerichtet. Ihre Angaben wurden nicht gespeichert.';
    }
}
$context = form_context('contact');
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Kontakt', 'url' => site_url('kontakt/')]];
site_header('kontakt', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero compact"><div class="wrap narrow"><p class="eyebrow">Portal kontaktieren</p><h1>Kontakt zu Energieexperten Bremen</h1><p class="lead">Senden Sie redaktionelle Hinweise, Fragen zu einem Anbieterprofil oder ein allgemeines Anliegen. Für eine konkrete Energieberatungsanfrage nutzen Sie bitte das ausführliche Anfrageformular.</p></div></section>
    <section class="section form-section"><div class="wrap form-layout"><div class="form-card">
        <?php if (!$config['mail']['enabled']): ?><div class="notice warning"><strong>Projektstatus:</strong> Der E Mail Versand ist noch nicht konfiguriert.</div><?php endif; ?>
        <?php if ($errors): ?><div class="form-errors" role="alert"><h2>Bitte prüfen Sie Ihre Angaben</h2><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <form method="post" action="<?= e(site_url('kontakt/')) ?>" class="secure-form">
            <input type="hidden" name="_token" value="<?= e($context['token']) ?>"><input type="hidden" name="_started_at" value="<?= e($context['started_at']) ?>"><div class="honeypot" aria-hidden="true"><label for="website">Webseite</label><input id="website" name="website" type="text" tabindex="-1" autocomplete="off"></div>
            <div class="field-grid">
                <div class="field"><label for="name">Name <span aria-hidden="true">*</span></label><input id="name" name="name" type="text" required maxlength="120" autocomplete="name" value="<?= e(safe_old($old, 'name')) ?>"></div>
                <div class="field"><label for="email">E Mail Adresse <span aria-hidden="true">*</span></label><input id="email" name="email" type="email" required maxlength="190" autocomplete="email" value="<?= e(safe_old($old, 'email')) ?>"></div>
                <div class="field full"><label for="subject">Thema <span aria-hidden="true">*</span></label><select id="subject" name="subject" required><option value="">Bitte wählen</option><?php foreach (['Redaktioneller Hinweis','Anbieterprofil','Technisches Problem','Datenschutzanliegen','Sonstiges'] as $value): ?><option<?= selected(safe_old($old, 'subject'), $value) ?>><?= e($value) ?></option><?php endforeach; ?></select></div>
                <div class="field full"><label for="message">Nachricht <span aria-hidden="true">*</span></label><textarea id="message" name="message" minlength="20" maxlength="3000" rows="8" required><?= e(safe_old($old, 'message')) ?></textarea></div>
            </div>
            <div class="privacy-box"><h2>Datenschutzhinweis</h2><p>Ihre Angaben werden ausschließlich zur Bearbeitung dieser Nachricht verwendet. Der konkrete Betreiber, Hostingdienst und E Mail Dienst werden vor Veröffentlichung in der Datenschutzerklärung ergänzt.</p><label class="checkbox"><input type="checkbox" name="privacy_acknowledged" value="1" required<?= checked(isset($old['privacy_acknowledged'])) ?>><span>Ich habe den Datenschutzhinweis und die <a href="<?= e(site_url('datenschutz/')) ?>">Datenschutzerklärung</a> gelesen. <span aria-hidden="true">*</span></span></label></div>
            <button class="button large" type="submit">Nachricht senden</button>
        </form>
    </div><aside class="form-aside"><h2>Direkter Weg</h2><p>Für Anfragen zur Energieberatung steht ein Formular mit Angaben zu Gebäude und Vorhaben bereit.</p><a class="button secondary full" href="<?= e(site_url('anfrage/')) ?>">Zur Beratungsanfrage</a></aside></div></section>
</main>
<?php site_footer(); ?>
