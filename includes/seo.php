<?php

declare(strict_types=1);

$seoPages = [
    'home' => ['title' => 'Energieberater und Energieexperten in Bremen finden', 'description' => 'Orientierung zu Energieberatung, Sanierungsfahrplan, Energieausweis, Fördermitteln und qualifizierten Energieexperten in Bremen.', 'path' => '/', 'type' => 'website'],
    'energieberater' => ['title' => 'Energieberater Bremen: Qualifizierte Experten finden', 'description' => 'So finden und prüfen Sie passende Energieberater und Energieeffizienz Experten für Wohngebäude und Sanierungen in Bremen.', 'path' => '/energieberater-bremen/'],
    'energieberatung' => ['title' => 'Energieberatung Bremen: Ablauf, Leistungen und Auswahl', 'description' => 'Erfahren Sie, wann eine Energieberatung in Bremen sinnvoll ist, wie sie abläuft und welche Unterlagen Sie vorbereiten sollten.', 'path' => '/energieberatung-bremen/'],
    'sanierungsfahrplan' => ['title' => 'Individueller Sanierungsfahrplan Bremen verständlich erklärt', 'description' => 'Der individuelle Sanierungsfahrplan zeigt abgestimmte Sanierungsschritte für Ihr Gebäude. Inhalte, Ablauf und Auswahl des Experten.', 'path' => '/sanierungsfahrplan-bremen/'],
    'energieausweis' => ['title' => 'Energieausweis Bremen: Bedarf und Verbrauch einordnen', 'description' => 'Wann ein Energieausweis benötigt wird, wie Bedarfs und Verbrauchsausweis unterschieden werden und wer ihn ausstellen darf.', 'path' => '/energieausweis-bremen/'],
    'foerdermittel' => ['title' => 'Fördermittelberatung Bremen für energetische Sanierung', 'description' => 'Förderangebote für Energieberatung und Sanierung richtig einordnen, Antragsschritte planen und aktuelle Originalquellen prüfen.', 'path' => '/foerdermittelberatung-bremen/'],
    'baubegleitung' => ['title' => 'Energetische Fachplanung und Baubegleitung Bremen', 'description' => 'Fachplanung und Baubegleitung helfen, energetische Maßnahmen technisch abzustimmen, zu dokumentieren und fachgerecht umzusetzen.', 'path' => '/baubegleitung-bremen/'],
    'nichtwohngebaeude' => ['title' => 'Energieberatung für Nichtwohngebäude in Bremen', 'description' => 'Orientierung für Unternehmen, Verwaltungen und Eigentümer zu Energieberatung, DIN V 18599, Sanierung und Förderwegen.', 'path' => '/nichtwohngebaeude-bremen/'],
    'experten' => ['title' => 'Energieexperten in Bremen finden', 'description' => 'Geprüfte Anbieterprofile für Energieberatung und energetische Sanierung in Bremen. Das Verzeichnis befindet sich im Aufbau.', 'path' => '/energieexperten/'],
    'anbieter' => ['title' => 'Als Energieberater in Bremen eintragen', 'description' => 'Informationen zur Aufnahme, Prüfung und transparenten Darstellung von Energieberatern und Energieeffizienz Experten im Portal.', 'path' => '/anbieter-eintragen/'],
    'anfrage' => ['title' => 'Unverbindliche Anfrage zur Energieberatung in Bremen', 'description' => 'Beschreiben Sie Ihr Gebäude und Ihr Vorhaben. Die Anfrage wird sicher verarbeitet und nicht ohne konkrete Information weitergegeben.', 'path' => '/anfrage/', 'robots' => 'noindex,follow'],
    'ratgeber' => ['title' => 'Ratgeber zu Energieberatung und Sanierung in Bremen', 'description' => 'Verständliche, quellenbasierte Beiträge zu Energieberatung, Sanierungsfahrplan, Energieausweis, Fördermitteln und Heizungsplanung.', 'path' => '/ratgeber/'],
    'ueber_uns' => ['title' => 'Über das Portal Energieexperten Bremen', 'description' => 'Zweck, Arbeitsweise und Grenzen des regionalen Informationsportals für Energieberatung und energetische Sanierung in Bremen.', 'path' => '/ueber-uns/'],
    'redaktion' => ['title' => 'Redaktionsrichtlinien und Transparenz', 'description' => 'So recherchiert, prüft, aktualisiert und kennzeichnet Energieexperten Bremen redaktionelle Inhalte und Anbieterprofile.', 'path' => '/redaktionsrichtlinien/'],
    'kontakt' => ['title' => 'Kontakt zu Energieexperten Bremen', 'description' => 'Kontaktieren Sie das Portal bei redaktionellen Hinweisen, Fragen zu Anbieterprofilen oder allgemeinen Anliegen.', 'path' => '/kontakt/', 'robots' => 'noindex,follow'],
    'impressum' => ['title' => 'Impressum', 'description' => 'Impressum des Informationsportals Energieexperten Bremen.', 'path' => '/impressum/', 'robots' => 'noindex,follow'],
    'datenschutz' => ['title' => 'Datenschutz', 'description' => 'Informationen zur Verarbeitung personenbezogener Daten bei Energieexperten Bremen.', 'path' => '/datenschutz/', 'robots' => 'noindex,follow'],
    '404' => ['title' => 'Seite nicht gefunden', 'description' => 'Die gewünschte Seite ist nicht verfügbar.', 'path' => '/404/', 'robots' => 'noindex,follow'],
];

function seo_for(string $pageKey, array $overrides = []): array
{
    global $seoPages;
    $fallback = $seoPages['home'];
    return array_merge($seoPages[$pageKey] ?? $fallback, $overrides);
}

