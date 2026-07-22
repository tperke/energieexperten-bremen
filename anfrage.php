<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$errors = [];
$old = [];
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $old = $_POST;
    $errors = validate_form_context('inquiry', $_POST);
    $building = normalize_text($_POST['building'] ?? '', 80);
    $postalCode = normalize_text($_POST['postal_code'] ?? '', 10);
    $year = normalize_text($_POST['year'] ?? '', 20);
    $units = filter_var($_POST['units'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 999]]);
    $service = normalize_text($_POST['service'] ?? '', 100);
    $measure = normalize_text($_POST['measure'] ?? '', 200);
    $message = normalize_multiline($_POST['message'] ?? '', 3000);
    $contactWay = normalize_text($_POST['contact_way'] ?? '', 30);
    $name = normalize_text($_POST['name'] ?? '', 120);
    $email = valid_email($_POST['email'] ?? '');
    $phone = valid_phone($_POST['phone'] ?? '');
    $privacyAcknowledged = isset($_POST['privacy_acknowledged']) && $_POST['privacy_acknowledged'] === '1';

    if (!in_array($building, ['Einfamilienhaus', 'Zweifamilienhaus', 'Mehrfamilienhaus', 'Wohnung', 'Nichtwohngebäude', 'Sonstiges'], true)) $errors[] = 'Bitte wählen Sie eine Gebäudeart.';
    if (!preg_match('/^28[0-9]{3}$/', $postalCode)) $errors[] = 'Bitte geben Sie eine gültige Postleitzahl aus Bremen an.';
    if ($units === false) $errors[] = 'Bitte geben Sie eine gültige Anzahl der Einheiten an.';
    if ($service === '') $errors[] = 'Bitte wählen Sie eine gewünschte Leistung.';
    if (mb_strlen($message) < 30) $errors[] = 'Bitte beschreiben Sie Ihr Anliegen mit mindestens 30 Zeichen.';
    if (!in_array($contactWay, ['E Mail', 'Telefon'], true)) $errors[] = 'Bitte wählen Sie einen Kontaktweg.';
    if ($name === '') $errors[] = 'Bitte geben Sie Ihren Namen an.';
    if ($email === null) $errors[] = 'Bitte geben Sie eine gültige E Mail Adresse an.';
    if ($phone === null || ($contactWay === 'Telefon' && $phone === '')) $errors[] = 'Bitte geben Sie für einen telefonischen Kontakt eine gültige Telefonnummer an.';
    if (!$privacyAcknowledged) $errors[] = 'Bitte bestätigen Sie, dass Sie den Datenschutzhinweis gelesen haben.';

    if ($errors === []) {
        $sent = send_portal_mail('Neue Anfrage über Energieexperten Bremen', [
            'Anfrageart: Allgemeine Vermittlungsanfrage ohne automatische Weitergabe',
            'Gebäude: ' . $building,
            'Postleitzahl: ' . $postalCode,
            'Baujahr: ' . ($year ?: 'nicht angegeben'),
            'Einheiten: ' . $units,
            'Leistung: ' . $service,
            'Maßnahme: ' . ($measure ?: 'nicht angegeben'),
            'Kontaktweg: ' . $contactWay,
            'Name: ' . $name,
            'E Mail: ' . $email,
            'Telefon: ' . ($phone ?: 'nicht angegeben'),
            '',
            'Anliegen:',
            $message,
            '',
            'Datenschutzhinweis gelesen: ja',
            'Automatische Weitergabe: nein',
        ], $email);
        if ($sent) {
            $_SESSION['form_success'] = 'Vielen Dank. Ihre Anfrage wurde an den Portalbetreiber übermittelt. Sie wurde nicht an einen Energieberater weitergegeben.';
            header('Location: ' . site_url('danke/'), true, 303);
            exit;
        }
        $errors[] = 'Der Versand ist derzeit nicht eingerichtet. Ihre Angaben wurden nicht gespeichert. Bitte versuchen Sie es nach der technischen Freigabe erneut.';
    }
}
$context = form_context('inquiry');
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Anfrage', 'url' => site_url('anfrage/')]];
site_header('anfrage', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero compact"><div class="wrap narrow"><p class="eyebrow">Unverbindliche Einordnung</p><h1>Anfrage zur Energieberatung in Bremen</h1><p class="lead">Beschreiben Sie Gebäude und Vorhaben. Die Anfrage geht ausschließlich an den Portalbetreiber. Eine Weitergabe an einen konkreten Anbieter erfolgt erst nach gesonderter Information und Bestätigung.</p></div></section>
    <section class="section form-section">
        <div class="wrap form-layout">
            <div class="form-card">
                <?php if (!mail_is_configured()): ?><div class="notice warning" role="status"><strong>SMTP noch gesperrt:</strong> Tragen Sie vor der produktiven Nutzung das E-Mail-Passwort in der Serverkonfiguration ein. Das Formular speichert in diesem Zustand keine Anfrage.</div><?php endif; ?>
                <?php if ($errors !== []): ?><div class="form-errors" role="alert" tabindex="-1"><h2>Bitte prüfen Sie Ihre Angaben</h2><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
                <form method="post" action="<?= e(site_url('anfrage/')) ?>" class="secure-form">
                    <input type="hidden" name="_token" value="<?= e($context['token']) ?>">
                    <input type="hidden" name="_started_at" value="<?= e($context['started_at']) ?>">
                    <div class="honeypot" aria-hidden="true"><label for="website">Webseite</label><input id="website" name="website" type="text" tabindex="-1" autocomplete="off"></div>
                    <fieldset><legend>Gebäude und Vorhaben</legend><div class="field-grid">
                        <div class="field"><label for="building">Gebäudeart <span aria-hidden="true">*</span></label><select id="building" name="building" required><option value="">Bitte wählen</option><?php foreach (['Einfamilienhaus','Zweifamilienhaus','Mehrfamilienhaus','Wohnung','Nichtwohngebäude','Sonstiges'] as $value): ?><option<?= selected(safe_old($old, 'building'), $value) ?>><?= e($value) ?></option><?php endforeach; ?></select></div>
                        <div class="field"><label for="postal_code">Postleitzahl <span aria-hidden="true">*</span></label><input id="postal_code" name="postal_code" type="text" inputmode="numeric" pattern="28[0-9]{3}" maxlength="5" required value="<?= e(safe_old($old, 'postal_code')) ?>" autocomplete="postal-code"></div>
                        <div class="field"><label for="year">Baujahr, sofern bekannt</label><input id="year" name="year" type="text" maxlength="20" value="<?= e(safe_old($old, 'year')) ?>"></div>
                        <div class="field"><label for="units">Anzahl der Einheiten <span aria-hidden="true">*</span></label><input id="units" name="units" type="number" min="1" max="999" required value="<?= e(safe_old($old, 'units') ?: '1') ?>"></div>
                        <div class="field full"><label for="service">Gewünschte Leistung <span aria-hidden="true">*</span></label><select id="service" name="service" required><option value="">Bitte wählen</option><?php foreach (load_json('leistungen.json') as $item): ?><option value="<?= e($item['name']) ?>"<?= selected(safe_old($old, 'service'), $item['name']) ?>><?= e($item['name']) ?></option><?php endforeach; ?><option value="Noch unklar"<?= selected(safe_old($old, 'service'), 'Noch unklar') ?>>Noch unklar</option></select></div>
                        <div class="field full"><label for="measure">Geplante Maßnahme</label><input id="measure" name="measure" type="text" maxlength="200" value="<?= e(safe_old($old, 'measure')) ?>" placeholder="Zum Beispiel Heizung, Dach, Fenster oder Gesamtsanierung"></div>
                        <div class="field full"><label for="message">Beschreibung <span aria-hidden="true">*</span></label><textarea id="message" name="message" rows="7" minlength="30" maxlength="3000" required><?= e(safe_old($old, 'message')) ?></textarea><small>Bitte keine Gesundheitsdaten, Ausweiskopien oder vertraulichen Dokumente eintragen.</small></div>
                    </div></fieldset>
                    <fieldset><legend>Kontaktdaten</legend><div class="field-grid">
                        <div class="field full"><label for="name">Vorname und Nachname <span aria-hidden="true">*</span></label><input id="name" name="name" type="text" maxlength="120" required value="<?= e(safe_old($old, 'name')) ?>" autocomplete="name"></div>
                        <div class="field"><label for="email">E Mail Adresse <span aria-hidden="true">*</span></label><input id="email" name="email" type="email" maxlength="190" required value="<?= e(safe_old($old, 'email')) ?>" autocomplete="email"></div>
                        <div class="field"><label for="phone">Telefonnummer, freiwillig</label><input id="phone" name="phone" type="tel" maxlength="50" value="<?= e(safe_old($old, 'phone')) ?>" autocomplete="tel"></div>
                        <div class="field full"><span class="field-label">Gewünschter Kontaktweg <span aria-hidden="true">*</span></span><div class="radio-row"><label><input type="radio" name="contact_way" value="E Mail" required<?= checked(safe_old($old, 'contact_way') !== 'Telefon') ?>> E Mail</label><label><input type="radio" name="contact_way" value="Telefon"<?= checked(safe_old($old, 'contact_way') === 'Telefon') ?>> Telefon</label></div></div>
                    </div></fieldset>
                    <div class="privacy-box"><h2>Datenschutzhinweis direkt zum Formular</h2><p>neu-protec Mediendesign verarbeitet Ihre Angaben zur Bearbeitung der gewünschten Kontaktaufnahme. Die Übermittlung in das IONOS-Postfach erfolgt verschlüsselt. Eine automatische Weitergabe an Energieberater findet nicht statt. Anfragen werden grundsätzlich spätestens sechs Monate nach Abschluss gelöscht, sofern keine gesetzlichen Pflichten oder Rechtsansprüche entgegenstehen. Einzelheiten finden Sie in der <a href="<?= e(site_url('datenschutz/')) ?>">Datenschutzerklärung</a>.</p><label class="checkbox"><input type="checkbox" name="privacy_acknowledged" value="1" required<?= checked(isset($old['privacy_acknowledged'])) ?>><span>Ich habe diesen Datenschutzhinweis und die Datenschutzerklärung gelesen. <span aria-hidden="true">*</span></span></label></div>
                    <button class="button large" type="submit">Anfrage sicher senden</button><p class="required-note"><span aria-hidden="true">*</span> Pflichtangaben</p>
                </form>
            </div>
            <aside class="form-aside"><h2>Was danach geschieht</h2><ol><li>Wir prüfen, ob Ihre Anfrage verständlich ist.</li><li>Ohne Ihre gesonderte Bestätigung werden keine Daten weitergegeben.</li><li>Vor der Beteiligung eines externen Fachpartners wird der konkrete Empfänger genannt.</li></ol><p>Wir teilen vorab transparent mit, wer die Beratung übernimmt. Eine Förderzusage ist damit nicht verbunden.</p></aside>
        </div>
    </section>
</main>
<?php site_footer(); ?>
