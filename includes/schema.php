<?php

declare(strict_types=1);

function build_schema(string $pageKey, array $seo, array $options = []): array
{
    global $config;
    $canonical = site_url(ltrim($seo['path'], '/'));
    $graph = [
        [
            '@type' => 'Organization',
            '@id' => site_url('#organization'),
            'name' => $config['site']['name'],
            'url' => site_url(),
            'logo' => site_url('assets/images/logo.svg'),
        ],
        [
            '@type' => 'WebSite',
            '@id' => site_url('#website'),
            'url' => site_url(),
            'name' => $config['site']['name'],
            'publisher' => ['@id' => site_url('#organization')],
            'inLanguage' => 'de-DE',
        ],
        [
            '@type' => 'WebPage',
            '@id' => $canonical . '#webpage',
            'url' => $canonical,
            'name' => $seo['title'],
            'description' => $seo['description'],
            'isPartOf' => ['@id' => site_url('#website')],
            'dateModified' => page_modified_iso(),
            'inLanguage' => 'de-DE',
        ],
    ];

    if (!empty($options['breadcrumbs'])) {
        $items = [];
        foreach ($options['breadcrumbs'] as $index => $item) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? $canonical,
            ];
        }
        $graph[] = ['@type' => 'BreadcrumbList', '@id' => $canonical . '#breadcrumb', 'itemListElement' => $items];
    }

    if (!empty($options['faqs'])) {
        $graph[] = [
            '@type' => 'FAQPage',
            '@id' => $canonical . '#faq',
            'mainEntity' => array_map(static fn (array $faq): array => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']],
            ], $options['faqs']),
        ];
    }

    if (!empty($options['service'])) {
        $graph[] = [
            '@type' => 'Service',
            '@id' => $canonical . '#service',
            'name' => $options['service'],
            'areaServed' => ['@type' => 'City', 'name' => 'Bremen'],
            'description' => $seo['description'],
        ];
    }

    if (!empty($options['article'])) {
        $article = $options['article'];
        $graph[] = [
            '@type' => 'Article',
            '@id' => $canonical . '#article',
            'headline' => $article['title'],
            'description' => $article['excerpt'],
            'datePublished' => $article['published'],
            'dateModified' => $article['updated'],
            'author' => ['@type' => 'Organization', 'name' => $config['site']['name']],
            'publisher' => ['@id' => site_url('#organization')],
            'mainEntityOfPage' => ['@id' => $canonical . '#webpage'],
            'inLanguage' => 'de-DE',
        ];
    }

    return ['@context' => 'https://schema.org', '@graph' => $graph];
}

