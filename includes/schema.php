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
            'description' => $config['site']['tagline'],
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
            'primaryImageOfPage' => [
                '@type' => 'ImageObject',
                'url' => site_url('assets/images/og_image.webp'),
                'width' => 1200,
                'height' => 630,
            ],
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
        $graph[2]['breadcrumb'] = ['@id' => $canonical . '#breadcrumb'];
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
        $articleText = implode(' ', array_filter([
            $article['intro'] ?? '',
            $article['summary'] ?? '',
            implode(' ', array_map(static fn (array $section): string => implode(' ', $section['paragraphs'] ?? []), $article['sections'] ?? [])),
        ]));
        $wordCount = preg_match_all('/[\p{L}\p{N}]+(?:[-’][\p{L}\p{N}]+)*/u', $articleText, $matches);
        $graph[] = [
            '@type' => 'Article',
            '@id' => $canonical . '#article',
            'headline' => $article['title'],
            'description' => $article['excerpt'],
            'datePublished' => $article['published'],
            'dateModified' => $article['updated'],
            'author' => ['@id' => site_url('#organization')],
            'publisher' => ['@id' => site_url('#organization')],
            'image' => [
                '@type' => 'ImageObject',
                '@id' => site_url('assets/images/og_image.webp') . '#image',
                'url' => site_url('assets/images/og_image.webp'),
                'width' => 1200,
                'height' => 630,
            ],
            'about' => array_values(array_filter([$article['category'] ?? null, 'Energieberatung in Bremen'])),
            'wordCount' => is_int($wordCount) ? $wordCount : 0,
            'isAccessibleForFree' => true,
            'mainEntityOfPage' => ['@id' => $canonical . '#webpage'],
            'inLanguage' => 'de-DE',
        ];
    }

    if (!empty($options['defined_terms'])) {
        $terms = [];
        foreach ($options['defined_terms'] as $term) {
            $terms[] = [
                '@type' => 'DefinedTerm',
                'name' => $term['term'],
                'description' => $term['definition'],
                'inDefinedTermSet' => ['@id' => $canonical . '#glossary'],
            ];
        }
        $graph[] = [
            '@type' => 'DefinedTermSet',
            '@id' => $canonical . '#glossary',
            'name' => 'Glossar Energieberatung und Sanierung',
            'url' => $canonical,
            'hasDefinedTerm' => $terms,
            'inLanguage' => 'de-DE',
        ];
    }

    return ['@context' => 'https://schema.org', '@graph' => $graph];
}
