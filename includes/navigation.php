<?php

declare(strict_types=1);

function primary_navigation(): array
{
    return [
        ['label' => 'Experten finden', 'path' => '/energieexperten/'],
        [
            'label' => 'Leistungen',
            'path' => '/energieberatung-bremen/',
            'children' => [
                ['label' => 'Energieberatung', 'path' => '/energieberatung-bremen/'],
                ['label' => 'Sanierungsfahrplan', 'path' => '/sanierungsfahrplan-bremen/'],
                ['label' => 'Energieausweis', 'path' => '/energieausweis-bremen/'],
                ['label' => 'Fördermittelberatung', 'path' => '/foerdermittelberatung-bremen/'],
                ['label' => 'Baubegleitung', 'path' => '/baubegleitung-bremen/'],
                ['label' => 'Nichtwohngebäude', 'path' => '/nichtwohngebaeude-bremen/'],
            ],
        ],
        ['label' => 'Ratgeber', 'path' => '/ratgeber/'],
        ['label' => 'Für Anbieter', 'path' => '/anbieter-eintragen/'],
    ];
}

function render_navigation(): void
{
    echo '<nav class="main-nav" id="main-navigation" aria-label="Hauptnavigation">';
    echo '<ul class="nav-list">';
    foreach (primary_navigation() as $item) {
        $active = is_active_path($item['path']);
        $hasChildren = !empty($item['children']);
        echo '<li' . ($hasChildren ? ' class="has-submenu"' : '') . '>';
        echo '<a href="' . e(site_url(ltrim($item['path'], '/'))) . '"' . ($active ? ' aria-current="page"' : '') . '>' . e($item['label']) . '</a>';
        if ($hasChildren) {
            echo '<button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Untermenü ' . e($item['label']) . ' öffnen"><span aria-hidden="true">⌄</span></button>';
            echo '<ul class="submenu">';
            foreach ($item['children'] as $child) {
                echo '<li><a href="' . e(site_url(ltrim($child['path'], '/'))) . '">' . e($child['label']) . '</a></li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    echo '</ul></nav>';
}

