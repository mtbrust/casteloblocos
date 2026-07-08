(function () {
    'use strict';

    const header = document.querySelector('.site-header');
    const navToggle = document.getElementById('nav-toggle');
    const mainNav = document.getElementById('main-nav');
    const navLinks = document.querySelectorAll('.nav-link, .btn-header');

    function onScroll() {
        if (!header) return;
        header.classList.toggle('scrolled', window.scrollY > 24);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function () {
            const isOpen = mainNav.classList.toggle('open');
            navToggle.classList.toggle('active', isOpen);
            navToggle.setAttribute('aria-expanded', String(isOpen));
            navToggle.setAttribute('aria-label', isOpen ? 'Fechar menu' : 'Abrir menu');
        });

        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                mainNav.classList.remove('open');
                navToggle.classList.remove('active');
                navToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    const revealEls = document.querySelectorAll('.reveal');

    if ('IntersectionObserver' in window && revealEls.length) {
        const revealObserver = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1, rootMargin: '0px 0px -32px 0px' }
        );

        revealEls.forEach(function (el) {
            revealObserver.observe(el);
        });
    } else {
        revealEls.forEach(function (el) {
            el.classList.add('visible');
        });
    }

    /* Product gallery modal */
    const modal = document.getElementById('product-modal');
    const modalTitle = document.getElementById('product-modal-title');
    const modalGallery = document.getElementById('product-modal-gallery');
    const productCards = document.querySelectorAll('[data-product-modal]:not(:disabled)');
    const personalizadoIcon = '<svg class="icon icon-product" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="8" x2="20" y2="8"/><circle cx="9" cy="8" r="2"/><line x1="4" y1="16" x2="20" y2="16"/><circle cx="15" cy="16" r="2"/></svg>';
    let lastFocused = null;

    function closeModal() {
        if (!modal) return;
        modal.hidden = true;
        document.body.classList.remove('modal-open');
        modalGallery.innerHTML = '';
        if (lastFocused) {
            lastFocused.focus();
        }
    }

    function openModal(title, images) {
        if (!modal || !modalTitle || !modalGallery) return;

        modalTitle.textContent = title;
        modalGallery.innerHTML = '';

        images.forEach(function (image) {
            const figure = document.createElement('figure');
            figure.className = 'product-modal-item' + (image.custom ? ' product-modal-item--custom' : '');

            if (image.custom) {
                const link = document.createElement('a');
                link.className = 'product-modal-custom';
                link.href = image.whatsapp || '#';
                link.target = '_blank';
                link.rel = 'noopener noreferrer';

                const iconWrap = document.createElement('span');
                iconWrap.className = 'product-modal-custom-icon';
                iconWrap.innerHTML = personalizadoIcon;
                link.appendChild(iconWrap);

                const label = document.createElement('span');
                label.className = 'product-modal-custom-label';
                label.textContent = image.alt || 'Personalizado';

                const hint = document.createElement('span');
                hint.className = 'product-modal-custom-hint';
                hint.textContent = 'Solicitar orçamento';

                link.appendChild(label);
                link.appendChild(hint);
                figure.appendChild(link);
            } else {
                const img = document.createElement('img');
                img.src = image.src;
                img.alt = image.alt || title;
                img.loading = 'lazy';
                img.decoding = 'async';

                const caption = document.createElement('figcaption');
                caption.textContent = image.alt || title;

                figure.appendChild(img);
                figure.appendChild(caption);
            }

            modalGallery.appendChild(figure);
        });

        modal.hidden = false;
        document.body.classList.add('modal-open');
        modal.querySelector('.product-modal-close').focus();
    }

    productCards.forEach(function (card) {
        card.addEventListener('click', function () {
            let images = [];

            try {
                images = JSON.parse(card.getAttribute('data-images') || '[]');
            } catch (e) {
                return;
            }

            if (!images.length) return;

            lastFocused = card;
            openModal(card.getAttribute('data-title') || '', images);
        });
    });

    if (modal) {
        modal.querySelectorAll('[data-modal-close]').forEach(function (el) {
            el.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', function (e) {
            if (!modal.hidden && e.key === 'Escape') {
                closeModal();
            }
        });
    }
})();
