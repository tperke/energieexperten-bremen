<?php

declare(strict_types=1);

function e(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function site_url(string $path = ''): string
{
    global $config;
    $base = $config['site']['base_url'];
    return $path === '' ? $base . '/' : $base . '/' . ltrim($path, '/');
}

function asset_url(string $path): string
{
    $file = dirname(__DIR__) . '/assets/' . ltrim($path, '/');
    $version = is_file($file) ? (string) filemtime($file) : '1';
    return site_url('assets/' . ltrim($path, '/')) . '?v=' . rawurlencode($version);
}

function load_json(string $filename): array
{
    $path = dirname(__DIR__) . '/data/' . basename($filename);
    if (!is_readable($path)) {
        return [];
    }

    $decoded = json_decode((string) file_get_contents($path), true);
    return is_array($decoded) ? $decoded : [];
}

function current_path(): string
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    return is_string($path) ? $path : '/';
}

function is_active_path(string $path): bool
{
    $current = rtrim(current_path(), '/') . '/';
    $expected = rtrim($path, '/') . '/';
    return $current === $expected;
}

function page_modified_iso(): string
{
    global $config;
    return $config['site']['content_reviewed_at'] . 'T09:00:00+02:00';
}

function format_date_de(string $date): string
{
    $value = DateTimeImmutable::createFromFormat('Y-m-d', $date);
    return $value ? $value->format('d.m.Y') : $date;
}

function render_breadcrumbs(array $items): void
{
    if (count($items) < 2) {
        return;
    }
    echo '<nav class="breadcrumbs wrap" aria-label="Brotkrumennavigation"><ol>';
    foreach ($items as $index => $item) {
        $isLast = $index === array_key_last($items);
        echo '<li>';
        if (!$isLast && !empty($item['url'])) {
            echo '<a href="' . e($item['url']) . '">' . e($item['name']) . '</a>';
        } else {
            echo '<span aria-current="page">' . e($item['name']) . '</span>';
        }
        echo '</li>';
    }
    echo '</ol></nav>';
}

function render_faqs(array $faqs): void
{
    if ($faqs === []) {
        return;
    }
    echo '<div class="faq-list">';
    foreach ($faqs as $index => $faq) {
        echo '<details' . ($index === 0 ? ' open' : '') . '>';
        echo '<summary>' . e($faq['question']) . '</summary>';
        echo '<div class="faq-answer"><p>' . e($faq['answer']) . '</p></div>';
        echo '</details>';
    }
    echo '</div>';
}

function render_sources(array $sourceKeys): void
{
    global $config;
    if ($sourceKeys === []) {
        return;
    }
    echo '<aside class="sources" aria-labelledby="sources-heading">';
    echo '<h2 id="sources-heading">Quellen und Prüfstand</h2><ul>';
    foreach ($sourceKeys as $key) {
        $source = $config['sources'][$key] ?? null;
        if (!$source) {
            continue;
        }
        echo '<li><a href="' . e($source['url']) . '" rel="noopener noreferrer">' . e($source['label']) . '</a>';
        echo '<span>Geprüft am ' . e($source['checked']) . '</span></li>';
    }
    echo '</ul><p>Förderbedingungen und gesetzliche Vorgaben können sich kurzfristig ändern. Prüfen Sie vor einem Auftrag oder Antrag stets die verlinkte Originalquelle.</p></aside>';
}

function not_found(): never
{
    http_response_code(404);
    $pageKey = '404';
    site_header($pageKey, ['robots' => 'noindex,follow']);
    echo '<main id="main-content"><section class="page-hero compact"><div class="wrap narrow">';
    echo '<p class="eyebrow">Fehler 404</p><h1>Diese Seite wurde nicht gefunden</h1>';
    echo '<p>Die gewünschte Adresse ist nicht verfügbar. Über die Startseite erreichen Sie alle veröffentlichten Inhalte.</p>';
    echo '<a class="button" href="' . e(site_url()) . '">Zur Startseite</a>';
    echo '</div></section></main>';
    site_footer();
    exit;
}

function operator_value(string $key): ?string
{
    global $config;
    $value = $config['operator'][$key] ?? null;
    return $value === 'REPLACE_BEFORE_LAUNCH' ? null : $value;
}

function selected(string $actual, string $expected): string
{
    return $actual === $expected ? ' selected' : '';
}

function checked(bool $condition): string
{
    return $condition ? ' checked' : '';
}

function safe_old(array $data, string $key): string
{
    return isset($data[$key]) && is_scalar($data[$key]) ? (string) $data[$key] : '';
}

function id_slug(string $value): string
{
    $map = ['ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue', 'ß' => 'ss', 'Ä' => 'ae', 'Ö' => 'oe', 'Ü' => 'ue'];
    $value = strtr($value, $map);
    $value = strtolower($value);
    $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?? '';
    return trim($value, '-');
}
