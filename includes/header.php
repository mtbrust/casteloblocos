<?php
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? SITE_TAGLINE;
$pageDescription = $pageDescription ?? SITE_DESCRIPTION;
$bodyClass = $bodyClass ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= esc($pageDescription) ?>">
    <meta name="keywords" content="blocos de concreto, lajes treliçadas, bloquetes, Machado MG, Castelo Blocos">
    <meta name="author" content="<?= esc(SITE_NAME) ?>">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= esc(SITE_NAME) ?> — <?= esc($pageTitle) ?>">
    <meta property="og:description" content="<?= esc($pageDescription) ?>">
    <meta property="og:url" content="<?= esc(site_url()) ?>">
    <meta property="og:image" content="<?= esc(site_url('assets/' . LOGO_HEADER)) ?>">
    <link rel="canonical" href="<?= esc(site_url()) ?>">
    <meta name="theme-color" content="#2c4a5e">
    <link rel="icon" href="<?= esc(asset(SITE_FAVICON)) ?>" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= esc(asset('css/main.css')) ?>">
    <title><?= esc(SITE_NAME) ?> — <?= esc($pageTitle) ?></title>
</head>
<body<?= $bodyClass !== '' ? ' class="' . esc($bodyClass) . '"' : '' ?>>
    <a href="#main" class="skip-link">Ir para o conteúdo principal</a>

    <header class="site-header" id="top">
        <div class="header-inner container">
            <a href="<?= esc(home_url('inicio')) ?>" class="logo-link" aria-label="<?= esc(SITE_NAME) ?> — Página inicial">
                <img src="<?= esc(asset(LOGO_HEADER)) ?>" alt="<?= esc(SITE_NAME) ?>" class="logo-img" width="180" height="56">
            </a>

            <nav class="main-nav" id="main-nav" aria-label="Navegação principal">
                <ul class="nav-list">
                    <?php foreach ($navLinks as $link): ?>
                    <li><a href="<?= esc(home_url($link['href'])) ?>" class="nav-link"><?= esc($link['label']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <a href="<?= esc(whatsapp_url()) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-header">
                <?php whatsapp_icon(); ?>
                <span>Orçamento</span>
            </a>

            <button type="button" class="nav-toggle" id="nav-toggle" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menu">
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>
        </div>
    </header>

    <main id="main">
