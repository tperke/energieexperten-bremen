<?php

declare(strict_types=1);

/**
 * Zentrale Konfiguration.
 * Alle mit REPLACE_BEFORE_LAUNCH markierten Werte müssen vor Veröffentlichung ergänzt werden.
 */

function env_value(string $key, ?string $default = null): ?string
{
    $value = getenv($key);
    return $value === false || $value === '' ? $default : $value;
}

function request_host(): string
{
    $host = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
    return preg_replace('/:[0-9]+$/', '', $host) ?? '';
}

function request_is_https(): bool
{
    return ($_SERVER['HTTPS'] ?? '') === 'on'
        || strtolower((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https';
}

function default_site_base_url(): string
{
    $host = $_SERVER['HTTP_HOST'] ?? '';
    if (is_string($host) && preg_match('/^(?:localhost|127\.0\.0\.1|[a-z0-9-]+\.(?:test|local))(?::[0-9]+)?$/i', $host) === 1) {
        return (request_is_https() ? 'https' : 'http') . '://' . $host;
    }

    return 'https://energieexperten-bremen.de';
}

$config = [
    'site' => [
        'name' => 'Energieexperten Bremen',
        'tagline' => 'Orientierung für Energieberatung und Sanierung in Bremen',
        'base_url' => rtrim(env_value('SITE_BASE_URL', default_site_base_url()), '/'),
        'locale' => 'de_DE',
        'timezone' => 'Europe/Berlin',
        'content_reviewed_at' => '2026-07-22',
        'public_launch_ready' => filter_var(env_value('PUBLIC_LAUNCH_READY', 'false'), FILTER_VALIDATE_BOOLEAN),
    ],
    'operator' => [
        'name' => env_value('OPERATOR_NAME', 'Thomas Perke'),
        'company' => env_value('OPERATOR_COMPANY', 'neu-protec Mediendesign'),
        'street' => env_value('OPERATOR_STREET', 'Hamburger Str. 43'),
        'postal_code' => env_value('OPERATOR_POSTAL_CODE', '40221'),
        'city' => env_value('OPERATOR_CITY', 'Düsseldorf'),
        'country' => env_value('OPERATOR_COUNTRY', 'Deutschland'),
        'phone' => env_value('OPERATOR_PHONE', '0156 – 78 281 339'),
        'email' => env_value('OPERATOR_EMAIL', 'info@neu-protec.de'),
        'vat_id' => env_value('OPERATOR_VAT_ID', ''),
        'editorial_responsible' => env_value('EDITORIAL_RESPONSIBLE', 'Thomas Perke'),
    ],
    'services' => [
        'hosting_provider' => env_value('HOSTING_PROVIDER', 'IONOS SE, Elgendorfer Str. 57, 56410 Montabaur'),
        'hosting_location' => env_value('HOSTING_LOCATION', 'Deutschland und Europäische Union'),
        'mail_provider' => env_value('MAIL_PROVIDER', 'IONOS SE, Elgendorfer Str. 57, 56410 Montabaur'),
        'mail_location' => env_value('MAIL_LOCATION', 'Deutschland und Europäische Union'),
    ],
    'mail' => [
        'enabled' => true,
        'transport' => 'smtp',
        'recipient' => env_value('MAIL_RECIPIENT', 'info@energieexperten-bremen.de'),
        'from' => env_value('MAIL_FROM', 'info@energieexperten-bremen.de'),
        'host' => env_value('SMTP_HOST', 'smtp.ionos.de'),
        'port' => (int) env_value('SMTP_PORT', '465'),
        'encryption' => strtolower((string) env_value('SMTP_ENCRYPTION', 'ssl')),
        'auto_tls' => filter_var(env_value('SMTP_AUTO_TLS', 'true'), FILTER_VALIDATE_BOOLEAN),
        'authentication' => filter_var(env_value('SMTP_AUTHENTICATION', 'true'), FILTER_VALIDATE_BOOLEAN),
        'username' => env_value('SMTP_USERNAME', 'info@energieexperten-bremen.de'),
        'password' => env_value('SMTP_PASSWORD', 'HIER_DAS_E-MAIL-PASSWORT_HINTERLEGEN'),
        'timeout_seconds' => 15,
    ],
    'forms' => [
        'minimum_seconds' => 4,
        'maximum_requests' => 400,
        'window_seconds' => 3600,
        'rate_limit_salt' => env_value('RATE_LIMIT_SALT', 'energieexperten-bremen-local-salt'),
        'forwarding_enabled' => false,
        'retention_notice' => 'Formularanfragen werden nach Abschluss grundsätzlich innerhalb von sechs Monaten gelöscht, sofern keine gesetzlichen Aufbewahrungspflichten oder Rechtsansprüche eine längere Speicherung erfordern.',
    ],
    'features' => [
        'premium_profiles' => false,
        'sponsored_articles' => false,
        'affiliate_links' => false,
        'public_district_pages' => false,
    ],
    'sources' => [
        'bafa_ebw' => [
            'label' => 'BAFA, Bundesförderung Energieberatung für Wohngebäude',
            'url' => 'https://www.bafa.de/DE/Energie/Energieberatung/Energieberatung_Wohngebaeude/energieberatung_wohngebaeude_node.html',
            'checked' => '22.07.2026',
        ],
        'bafa_isfp' => [
            'label' => 'BAFA, Merkblatt zum individuellen Sanierungsfahrplan',
            'url' => 'https://www.bafa.de/SharedDocs/Downloads/DE/Energie/ebw_merkblatt_isfp_2023.html',
            'checked' => '22.07.2026',
        ],
        'bafa_ebn' => [
            'label' => 'BAFA, Energieberatung für Nichtwohngebäude, Anlagen und Systeme',
            'url' => 'https://www.bafa.de/DE/Energie/Energieberatung/Nichtwohngebaeude_Anlagen_Systeme/nichtwohngebaeude_anlagen_systeme_node.html',
            'checked' => '22.07.2026',
        ],
        'kfw_beg' => [
            'label' => 'KfW, Bundesförderung für effiziente Gebäude',
            'url' => 'https://www.kfw.de/inlandsfoerderung/Bundesf%C3%B6rderung-f%C3%BCr-effiziente-Geb%C3%A4ude/',
            'checked' => '22.07.2026',
        ],
        'eee' => [
            'label' => 'Energieeffizienz-Expertenliste für Förderprogramme des Bundes',
            'url' => 'https://www.energie-effizienz-experten.de/',
            'checked' => '21.07.2026',
        ],
        'bremen_geg' => [
            'label' => 'Land Bremen, Anforderungen an bestehende Gebäude',
            'url' => 'https://umwelt.bremen.de/klima/energie/gebaeudeenergiegesetz-geg/anforderungen-an-bestehende-gebaeude-2387269',
            'checked' => '21.07.2026',
        ],
        'bremen_funding' => [
            'label' => 'Land Bremen, Übersicht der Förderprogramme',
            'url' => 'https://umwelt.bremen.de/klima/uebersicht-foerderprogramme-2147359',
            'checked' => '22.07.2026',
        ],
        'klimabauzentrum' => [
            'label' => 'Klima Bau Zentrum Bremen',
            'url' => 'https://klimabauzentrum.de/standorte/bremen',
            'checked' => '21.07.2026',
        ],
    ],
];
