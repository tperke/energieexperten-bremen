<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
start_secure_session();
$message = $_SESSION['form_success'] ?? null;
unset($_SESSION['form_success']);
if (!$message) {
    header('Location: ' . site_url(), true, 302);
    exit;
}
site_header('anfrage', ['seo' => ['title' => 'Nachricht übermittelt', 'description' => 'Bestätigung der Formularübermittlung.', 'path' => '/danke/'], 'robots' => 'noindex,nofollow']);
?>
<main id="main-content"><section class="page-hero"><div class="wrap narrow center"><div class="success-icon" aria-hidden="true">✓</div><p class="eyebrow">Erfolgreich übermittelt</p><h1>Vielen Dank für Ihre Nachricht</h1><p class="lead"><?= e($message) ?></p><a class="button" href="<?= e(site_url()) ?>">Zur Startseite</a></div></section></main>
<?php site_footer(); ?>
