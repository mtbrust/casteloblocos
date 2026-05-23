<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero" id="inicio" aria-labelledby="hero-title">
    <div class="hero-pattern" aria-hidden="true"></div>
    <div class="container hero-grid">
        <div class="hero-content reveal">
            <span class="hero-eyebrow">Machado — MG</span>
            <h1 id="hero-title" class="hero-title">
                Estruturas sólidas para a <em>sua obra</em>
            </h1>
            <p class="hero-lead">
                A <strong>Castelo Blocos</strong> é referência em blocos de concreto e soluções
                completas para construções residenciais, comerciais e industriais — com equipe
                experiente, equipamentos eficientes e atendimento personalizado.
            </p>
            <div class="hero-actions">
                <a href="<?= esc(home_url('produtos')) ?>" class="btn btn-primary">Ver produtos</a>
                <a href="<?= esc(whatsapp_url()) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                    <?php whatsapp_icon(); ?>
                    Solicitar orçamento
                </a>
            </div>
        </div>
        <div class="hero-visual reveal reveal-delay" aria-hidden="true">
            <div class="hero-card">
                <div class="hero-stat">
                    <span class="hero-stat-value">8+</span>
                    <span class="hero-stat-label">Linhas de produtos</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">100%</span>
                    <span class="hero-stat-label">Foco em qualidade</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">MG</span>
                    <span class="hero-stat-label">Entrega regional</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-products" id="produtos" aria-labelledby="products-title">
    <div class="container">
        <header class="section-header reveal">
            <span class="section-label">Produtos</span>
            <h2 id="products-title" class="section-title">Soluções para cada etapa da construção</h2>
            <p class="section-desc">
                Nossa linha reúne materiais de alto padrão para estrutura, acabamento e paisagismo.
            </p>
        </header>

        <p class="products-hint reveal">Clique em uma categoria para ver as fotos dos produtos.</p>

        <div class="products-grid">
            <?php foreach ($products as $i => $product): ?>
            <button
                type="button"
                class="product-card reveal<?= !empty($product['gallery']) ? ' product-card--has-gallery' : '' ?>"
                style="--reveal-delay: <?= $i * 50 ?>ms"
                data-product-modal
                data-title="<?= esc($product['name']) ?>"
                data-images="<?= esc(json_encode($product['gallery'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>"
                <?= empty($product['gallery']) ? 'disabled' : '' ?>
                aria-haspopup="dialog"
            >
                <?php if (!empty($product['preview'])): ?>
                <div class="product-card-preview">
                    <img src="<?= esc($product['preview']) ?>" alt="" loading="lazy" decoding="async">
                </div>
                <?php else: ?>
                <div class="product-card-icon">
                    <?php product_icon($product['icon']); ?>
                </div>
                <?php endif; ?>
                <h3 class="product-card-title"><?= esc($product['name']) ?></h3>
                <p class="product-card-desc"><?= esc($product['desc']) ?></p>
                <?php if (!empty($product['gallery'])): ?>
                <span class="product-card-action">
                    Ver <?= count($product['gallery']) ?> <?= count($product['gallery']) === 1 ? 'foto' : 'fotos' ?>
                </span>
                <?php endif; ?>
            </button>
            <?php endforeach; ?>
        </div>

        <div class="product-modal" id="product-modal" role="dialog" aria-modal="true" aria-labelledby="product-modal-title" hidden>
            <div class="product-modal-backdrop" data-modal-close></div>
            <div class="product-modal-dialog">
                <header class="product-modal-header">
                    <h2 id="product-modal-title" class="product-modal-title"></h2>
                    <button type="button" class="product-modal-close" data-modal-close aria-label="Fechar galeria">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </header>
                <div class="product-modal-gallery" id="product-modal-gallery"></div>
            </div>
        </div>

        <div class="section-cta reveal">
            <p>Quer conhecer mais detalhes ou montar seu pedido?</p>
            <a href="<?= esc(whatsapp_url('Olá! Gostaria de um orçamento sobre os produtos da Castelo Blocos.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
                <?php whatsapp_icon(); ?>
                Fazer orçamento no WhatsApp
            </a>
        </div>
    </div>
</section>

<section class="section section-about" id="sobre" aria-labelledby="about-title">
    <div class="container about-grid">
        <div class="about-content reveal">
            <span class="section-label">Sobre</span>
            <h2 id="about-title" class="section-title">Qualidade e confiança em cada entrega</h2>
            <p class="about-lead">
                Com processos eficientes e equipe dedicada, a Castelo Blocos entrega produtos que
                atendem às necessidades específicas de cada cliente — do pequeno reformador à grande obra.
            </p>
            <p>
                Investimos em equipamentos modernos e controle rigoroso de produção para garantir
                resistência, dimensionalidade e acabamento consistentes em todos os lotes.
            </p>
            <ul class="about-highlights">
                <li>Produtos para obras residenciais, comerciais e industriais</li>
                <li>Equipe técnica experiente e pronta para orientar</li>
                <li>Compromisso com prazo, qualidade e relacionamento de longo prazo</li>
            </ul>
        </div>
        <div class="about-panel reveal reveal-delay">
            <blockquote class="about-quote">
                <p>Construir com segurança começa com escolher os materiais certos — e um parceiro que entrega o que promete.</p>
            </blockquote>
            <a href="<?= esc(home_url('contato')) ?>" class="btn btn-secondary">Fale conosco</a>
        </div>
    </div>
</section>

<section class="section section-services" id="servicos" aria-labelledby="services-title">
    <div class="container">
        <header class="section-header reveal">
            <span class="section-label">Serviços</span>
            <h2 id="services-title" class="section-title">Apoio completo para a sua obra</h2>
            <p class="section-desc">Além dos produtos, oferecemos serviços que facilitam o dia a dia do canteiro.</p>
        </header>

        <div class="services-grid">
            <?php foreach ($services as $i => $service): ?>
            <article class="service-card reveal" style="--reveal-delay: <?= $i * 80 ?>ms">
                <div class="service-card-icon">
                    <?php product_icon($service['icon']); ?>
                </div>
                <h3><?= esc($service['title']) ?></h3>
                <p><?= esc($service['desc']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="services-banner reveal">
            <div class="services-banner-text">
                <h3>Tire suas dúvidas agora</h3>
                <p>Nossa equipe comercial está pronta para ajudar no orçamento e na escolha dos materiais.</p>
            </div>
            <a href="<?= esc(whatsapp_url()) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
                <?php whatsapp_icon(); ?>
                Chamar no WhatsApp
            </a>
        </div>
    </div>
</section>

<section class="section section-map" aria-labelledby="map-title">
    <div class="container">
        <header class="section-header reveal">
            <span class="section-label">Localização</span>
            <h2 id="map-title" class="section-title">Visite nossa unidade</h2>
        </header>
        <div class="map-wrap reveal">
            <iframe
                title="Mapa — Castelo Blocos, Machado MG"
                src="https://www.google.com/maps?q=Av.+Dr.+Renato+Azeredo,+560,+Machado,+MG&output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
