    </main>

    <footer class="site-footer" id="contato">
        <div class="container footer-grid">
            <div class="footer-brand">
                <a href="<?= esc(home_url('inicio')) ?>" class="logo-link">
                    <img src="<?= esc(asset(LOGO_FOOTER)) ?>" alt="<?= esc(SITE_NAME) ?>" class="logo-img footer-logo" width="160" height="50">
                </a>
                <p class="footer-tagline"><?= esc(SITE_TAGLINE) ?></p>
            </div>

            <div class="footer-block">
                <h3 class="footer-title">Endereço</h3>
                <address class="footer-address">
                    <strong><?= esc(SITE_CITY) ?></strong><br>
                    <?= esc(SITE_ADDRESS) ?><br>
                    CEP: <?= esc(SITE_CEP) ?>
                </address>
            </div>

            <div class="footer-block">
                <h3 class="footer-title">Funcionamento</h3>
                <p class="footer-hours-label">Setor comercial</p>
                <ul class="footer-hours">
                    <li>Segunda a sexta — 8:00 às 18:00</li>
                    <li>Sábado — 8:00 às 12:00</li>
                </ul>
            </div>

            <div class="footer-block">
                <h3 class="footer-title">Contato</h3>
                <ul class="footer-contact-list">
                    <li>
                        <a href="tel:+<?= esc(SITE_WHATSAPP_NUMBER) ?>">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                            <?= esc(SITE_PHONE) ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= esc(whatsapp_url()) ?>" target="_blank" rel="noopener noreferrer">
                            <?php whatsapp_icon(); ?>
                            WhatsApp
                        </a>
                    </li>
                    <li>
                        <a href="<?= esc(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener noreferrer">
                            <svg class="icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            Instagram
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom container">
            <p class="footer-copy">
                &copy; <?= esc(SITE_YEAR) ?> <?= esc(SITE_NAME) ?>. Todos os direitos reservados.
            </p>
            <p class="footer-dev">
                Desenvolvido por <a href="<?= esc(DEV_CREDIT_URL) ?>" target="_blank" rel="noopener noreferrer">desv.com.br</a>
            </p>
        </div>
    </footer>

    <a href="<?= esc(whatsapp_url()) ?>" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Falar no WhatsApp">
        <?php whatsapp_icon(); ?>
    </a>

    <script src="<?= esc(asset('js/main.js')) ?>" defer></script>
</body>
</html>
