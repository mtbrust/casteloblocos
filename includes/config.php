<?php
declare(strict_types=1);

define('SITE_NAME', 'Castelo Blocos');
define('SITE_TAGLINE', 'Construindo a sua estrutura com qualidade e estilo');
define('SITE_DESCRIPTION', 'Blocos de concreto, lajes treliçadas, pisos, bloquetes e soluções completas para construções residenciais, comerciais e industriais em Machado - MG.');
define('SITE_URL', 'https://casteloblocos.com.br');
define('SITE_PHONE', '(35) 9 9986-9992');
define('SITE_WHATSAPP_NUMBER', '5535999869992');
define('SITE_ADDRESS', 'Av. Dr. Renato Azeredo, 560');
define('SITE_CITY', 'Machado - MG');
define('SITE_CEP', '37750-000');
define('SITE_INSTAGRAM', 'https://www.instagram.com/casteloblocos/');
define('LOGO_HEADER', 'images/produtos/cb_logo.png');
define('LOGO_FOOTER', 'images/produtos/cb_logo_negativo.png');
define('SITE_FAVICON', 'images/produtos/cb_logo.png');
define('PRODUCTS_IMAGES_DIR', 'images/produtos');
define('SITE_YEAR', (string) date('Y'));
define('DEV_CREDIT_URL', 'https://www.desv.com.br');

function whatsapp_url(string $message = ''): string
{
    if ($message === '') {
        $message = 'Olá! Gostaria de fazer um orçamento com a Castelo Blocos.';
    }

    return 'https://wa.me/' . SITE_WHATSAPP_NUMBER . '?text=' . rawurlencode($message);
}

require_once __DIR__ . '/icons.php';

$navLinks = [
    ['href' => 'inicio', 'label' => 'Início'],
    ['href' => 'produtos', 'label' => 'Produtos'],
    ['href' => 'sobre', 'label' => 'Sobre'],
    ['href' => 'servicos', 'label' => 'Serviços'],
    ['href' => 'contato', 'label' => 'Contato'],
];

$products = [
    ['name' => 'Blocos de Concreto', 'desc' => 'Alta resistência e acabamento uniforme para alvenaria estrutural e de vedação.', 'icon' => 'block', 'folder' => 'bloco'],
    ['name' => 'Lajes Treliçadas', 'desc' => 'Solução eficiente para lajes com menor consumo de concreto e prazo reduzido.', 'icon' => 'slab', 'folder' => 'laje'],
    ['name' => 'Pisos & Bloquetes', 'desc' => 'Pavimentação durável para áreas externas, garagens e passeios.', 'icon' => 'pavement', 'folder' => 'piso'],
    ['name' => 'Mourão de Alambrado', 'desc' => 'Estrutura robusta para cercas e delimitação de propriedades rurais e urbanas.', 'icon' => 'fence', 'folder' => 'mourao'],
    ['name' => 'Revestimentos Cimentícios', 'desc' => 'Acabamento versátil para fachadas e ambientes internos com estética moderna.', 'icon' => 'coating', 'folder' => 'revestimento'],
    ['name' => 'Elementos Vazados', 'desc' => 'Ventilação, iluminação e design arquitetônico em um só elemento.', 'icon' => 'vent', 'folder' => 'vazado'],
    ['name' => 'Ladrilhos', 'desc' => 'Variedade de modelos para pisos, calçadas e projetos personalizados.', 'icon' => 'tile', 'folder' => 'ladrilho'],
    ['name' => 'Pingadeiras', 'desc' => 'Proteção contra infiltrações com linha completa de medidas e acabamentos.', 'icon' => 'drip', 'folder' => 'pingadeira'],
];

$products = array_map(static function (array $product): array {
    $product['gallery'] = product_gallery($product['folder']);
    $product['gallery'][] = product_custom_item($product['name']);
    $product['preview'] = $product['gallery'][0]['src'] ?? null;

    return $product;
}, $products);

$services = [
    ['title' => 'Consultoria', 'desc' => 'Orientação técnica para escolher os melhores produtos e quantitativos do seu projeto.', 'icon' => 'consulting'],
    ['title' => 'Entrega', 'desc' => 'Logística ágil para levar os materiais até a sua obra com segurança.', 'icon' => 'delivery'],
    ['title' => 'Acompanhamento', 'desc' => 'Suporte próximo em todas as etapas, do orçamento à entrega.', 'icon' => 'support'],
];

function site_base_path(): string
{
    static $base = null;

    if ($base !== null) {
        return $base;
    }

    $dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));

    if ($dir === '/' || $dir === '.') {
        $base = '';
    } else {
        $base = rtrim($dir, '/');
    }

    return $base;
}

function asset(string $path): string
{
    return url('assets/' . ltrim($path, '/'));
}

function url(string $path = ''): string
{
    $base = site_base_path();
    $path = ltrim($path, '/');

    if ($path === '') {
        return $base === '' ? '/' : $base . '/';
    }

    return ($base === '' ? '' : $base) . '/' . $path;
}

function site_url(string $path = ''): string
{
    $relative = url($path);

    return rtrim(SITE_URL, '/') . ($relative === '/' ? '/' : $relative);
}

function home_url(string $hash = ''): string
{
    if ($hash !== '' && $hash[0] !== '#') {
        $hash = '#' . $hash;
    }

    $base = site_base_path();
    $home = ($base === '' ? '' : $base) . '/';

    return $hash === '' ? $home : $home . $hash;
}

function esc(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function products_images_path(): string
{
    return dirname(__DIR__) . '/assets/' . PRODUCTS_IMAGES_DIR;
}

function resolve_product_folder(string $slug): ?string
{
    $base = products_images_path();

    if (!is_dir($base)) {
        return null;
    }

    $candidates = [$slug, str_replace('mourao', 'mourão', $slug)];

    foreach ($candidates as $candidate) {
        if (is_dir($base . DIRECTORY_SEPARATOR . $candidate)) {
            return $candidate;
        }
    }

    foreach (scandir($base) ?: [] as $entry) {
        if ($entry === '.' || $entry === '..' || !is_dir($base . DIRECTORY_SEPARATOR . $entry)) {
            continue;
        }

        if (strcasecmp($entry, $slug) === 0) {
            return $entry;
        }
    }

    return null;
}

function product_image_label(string $filename): string
{
    $name = pathinfo($filename, PATHINFO_FILENAME);
    $name = preg_replace('/^cb_|^l_|^laje_|^mourao_/i', '', $name) ?? $name;
    $name = str_replace(['_', '-'], ' ', $name);

    return ucwords(trim($name));
}

/** @return list<array{src: string, alt: string}> */
function product_gallery(string $folderSlug): array
{
    $folder = resolve_product_folder($folderSlug);

    if ($folder === null) {
        return [];
    }

    $dir = products_images_path() . DIRECTORY_SEPARATOR . $folder;
    $allowed = ['png', 'jpg', 'jpeg', 'webp', 'gif'];
    $files = [];

    foreach (scandir($dir) ?: [] as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed, true)) {
            continue;
        }

        $files[] = $file;
    }

    sort($files, SORT_NATURAL | SORT_FLAG_CASE);

    $gallery = [];

    foreach ($files as $file) {
        $gallery[] = [
            'src' => asset(PRODUCTS_IMAGES_DIR . '/' . $folder . '/' . $file),
            'alt' => product_image_label($file),
        ];
    }

    return $gallery;
}

/** @return array{alt: string, custom: true, whatsapp: string} */
function product_custom_item(string $categoryName): array
{
    return [
        'alt' => 'Personalizado',
        'custom' => true,
        'whatsapp' => whatsapp_url('Olá! Gostaria de um orçamento para produto personalizado em ' . $categoryName . '.'),
    ];
}
