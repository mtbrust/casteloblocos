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
            figure.className = 'product-modal-item';

            const img = document.createElement('img');
            img.src = image.src;
            img.alt = image.alt || title;
            img.loading = 'lazy';
            img.decoding = 'async';

            const caption = document.createElement('figcaption');
            caption.textContent = image.alt || title;

            figure.appendChild(img);
            figure.appendChild(caption);
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
