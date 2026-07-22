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

function default_site_base_url(): string
{
    $host = $_SERVER['HTTP_HOST'] ?? '';
    if (is_string($host) && preg_match('/^(?:localhost|127\.0\.0\.1|[a-z0-9-]+\.(?:test|local))(?::[0-9]+)?$/i', $host) === 1) {
        $https = ($_SERVER['HTTPS'] ?? '') === 'on' || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https';
        return ($https ? 'https' : 'http') . '://' . $host;
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
        'public_launch_ready' => false,
    ],
    'operator' => [
        'name' => env_value('OPERATOR_NAME', 'REPLACE_BEFORE_LAUNCH'),
        'company' => env_value('OPERATOR_COMPANY', 'REPLACE_BEFORE_LAUNCH'),
        'street' => env_value('OPERATOR_STREET', 'REPLACE_BEFORE_LAUNCH'),
        'postal_code' => env_value('OPERATOR_POSTAL_CODE', 'REPLACE_BEFORE_LAUNCH'),
        'city' => env_value('OPERATOR_CITY', 'REPLACE_BEFORE_LAUNCH'),
        'country' => env_value('OPERATOR_COUNTRY', 'Deutschland'),
        'phone' => env_value('OPERATOR_PHONE', 'REPLACE_BEFORE_LAUNCH'),
        'email' => env_value('OPERATOR_EMAIL', 'REPLACE_BEFORE_LAUNCH'),
        'vat_id' => env_value('OPERATOR_VAT_ID', 'REPLACE_BEFORE_LAUNCH'),
        'editorial_responsible' => env_value('EDITORIAL_RESPONSIBLE', 'REPLACE_BEFORE_LAUNCH'),
    ],
    'services' => [
        'hosting_provider' => env_value('HOSTING_PROVIDER', 'REPLACE_BEFORE_LAUNCH'),
        'hosting_location' => env_value('HOSTING_LOCATION', 'REPLACE_BEFORE_LAUNCH'),
        'mail_provider' => env_value('MAIL_PROVIDER', 'REPLACE_BEFORE_LAUNCH'),
        'mail_location' => env_value('MAIL_LOCATION', 'REPLACE_BEFORE_LAUNCH'),
    ],
    'mail' => [
        'enabled' => filter_var(env_value('MAIL_ENABLED', 'false'), FILTER_VALIDATE_BOOLEAN),
        'recipient' => env_value('MAIL_RECIPIENT', ''),
        'from' => env_value('MAIL_FROM', 'portal@energieexperten-bremen.de'),
    ],
    'forms' => [
        'minimum_seconds' => 4,
        'maximum_requests' => 4,
        'window_seconds' => 3600,
        'rate_limit_salt' => env_value('RATE_LIMIT_SALT', 'energieexperten-bremen-local-salt'),
        'forwarding_enabled' => false,
        'retention_notice' => 'Eine konkrete Speicherfrist wird vor Veröffentlichung anhand des eingesetzten E Mail Dienstes und des Bearbeitungsablaufs festgelegt.',
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
            'label' => 'Energieeffizienz Expertenliste für Förderprogramme des Bundes',
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
