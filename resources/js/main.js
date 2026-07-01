/* ============================================================
   DMITRII LEVCHENKO — Portfolio Main JavaScript
   Handles: preloader, nav, theme, i18n, animations, sections
   ============================================================ */

import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css';

(function () {
    'use strict';

    // ─── State ───
    // Language: saved preference → browser language → fallback to 'en'
    function detectLang() {
        const saved = localStorage.getItem('lang');
        if (saved) return saved;
        const browser = (navigator.language || navigator.userLanguage || 'en').toLowerCase();
        return browser.startsWith('ru') ? 'ru' : 'en';
    }

    // Theme: saved preference → OS color-scheme → fallback to 'light'
    function detectTheme() {
        const saved = localStorage.getItem('theme');
        if (saved) return saved;
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    let currentLang = detectLang();
    let currentTheme = detectTheme();
    let testimonialIndex = 0;
    let testimonialInterval;

    // ─── DOM Ready ───
    document.addEventListener('DOMContentLoaded', init);

    function init() {
        applyTheme(currentTheme);
        applyLanguage(currentLang);
        setupPreloader();
        setupNavigation();
        setupThemeToggle();
        setupLanguageSwitcher();
        setupParticles();
        setupTypingEffect();
        setupCounters();
        setupSkillTabs();
        setupSkillAnimations();
        setupPortfolioFilters();
        setupGalleryLightbox();
        setupContactForm();
        setupTestimonialsSlider();
        setupCurrentYear();
        initAOS();
        renderDynamicSections();
    }

    // ─── Preloader ───
    function setupPreloader() {
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('preloader').classList.add('hidden');
            }, 800);
        });
    }

    // ─── AOS Init ───
    function initAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 60
            });
        }
    }

    // ─── Theme ───
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        currentTheme = theme;
        localStorage.setItem('theme', theme);
    }

    function setupThemeToggle() {
        const toggle = document.getElementById('themeToggle');
        if (!toggle) return;
        const updateIcon = () => {
            toggle.innerHTML = currentTheme === 'dark'
                ? '<i class="fas fa-sun"></i>'
                : '<i class="fas fa-moon"></i>';
        };
        updateIcon();
        toggle.addEventListener('click', () => {
            applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
            updateIcon();
        });
    }

    // ─── Language ───
    function applyLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('lang', lang);
        document.documentElement.setAttribute('data-lang', lang);
        document.documentElement.lang = lang;

        // Translate all static elements
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (I18N[lang] && I18N[lang][key] && typeof I18N[lang][key] === 'string') {
                el.innerHTML = I18N[lang][key];
            }
        });

        // Translate DB-driven text elements (skills, projects)
        document.querySelectorAll('[data-lang-ru]').forEach(el => {
            el.textContent = lang === 'ru' ? el.dataset.langRu : (el.dataset.langEn || el.dataset.langRu);
        });

        // Show/hide HTML content blocks (project descriptions with markup)
        document.querySelectorAll('.lang-content').forEach(el => {
            const isRu = el.classList.contains('lang-ru');
            const isEn = el.classList.contains('lang-en');
            if (isRu) el.style.display = lang === 'ru' ? '' : 'none';
            if (isEn) el.style.display = lang === 'en' ? '' : 'none';
        });

        // Update active lang button
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
        });

        // Re-render dynamic content
        renderDynamicSections();

        // Restart typing
        setupTypingEffect();
    }

    function setupLanguageSwitcher() {
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const lang = btn.getAttribute('data-lang');
                if (lang !== currentLang) {
                    applyLanguage(lang);
                }
            });
        });
    }

    // ─── Navigation ───
    function setupNavigation() {
        const navbar = document.getElementById('navbar');
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        // Scroll effect
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    navbar.classList.toggle('scrolled', window.scrollY > 50);
                    updateActiveNavLink();
                    ticking = false;
                });
                ticking = true;
            }
        });

        // Hamburger toggle
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
            toggleOverlay();
        });

        // Close mobile menu on link click
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                removeOverlay();
            });
        });
    }

    function toggleOverlay() {
        let overlay = document.querySelector('.nav-overlay');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'nav-overlay';
            document.body.appendChild(overlay);
            overlay.addEventListener('click', () => {
                document.getElementById('hamburger').classList.remove('active');
                document.getElementById('navMenu').classList.remove('active');
                removeOverlay();
            });
        }
        setTimeout(() => overlay.classList.toggle('active'), 10);
    }

    function removeOverlay() {
        const overlay = document.querySelector('.nav-overlay');
        if (overlay) overlay.classList.remove('active');
    }

    function updateActiveNavLink() {
        const sections = document.querySelectorAll('.section, .hero');
        const scrollPos = window.scrollY + 200;

        sections.forEach(section => {
            const top = section.offsetTop;
            const height = section.offsetHeight;
            const id = section.getAttribute('id');

            if (scrollPos >= top && scrollPos < top + height) {
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
                });
            }
        });
    }

    // ─── Particles ───
    function setupParticles() {
        const container = document.getElementById('heroParticles');
        if (!container) return;
        const colors = ['#6366f1', '#06b6d4', '#8b5cf6', '#f43f5e', '#10b981', '#f59e0b'];

        for (let i = 0; i < 40; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.width = particle.style.height = (Math.random() * 4 + 2) + 'px';
            particle.style.background = colors[Math.floor(Math.random() * colors.length)];
            particle.style.animationDuration = (Math.random() * 8 + 6) + 's';
            particle.style.animationDelay = (Math.random() * 10) + 's';
            container.appendChild(particle);
        }
    }

    // ─── Typing Effect ───
    let typingTimeout;
    function setupTypingEffect() {
        if (typingTimeout) clearTimeout(typingTimeout);
        const el = document.getElementById('typingText');
        if (!el) return;

        const strings = I18N[currentLang]['hero.typing'] || [];
        let stringIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function type() {
            const current = strings[stringIndex];
            if (!current) return;

            if (isDeleting) {
                el.textContent = current.substring(0, charIndex - 1);
                charIndex--;
            } else {
                el.textContent = current.substring(0, charIndex + 1);
                charIndex++;
            }

            let delay = isDeleting ? 40 : 80;

            if (!isDeleting && charIndex === current.length) {
                delay = 2200;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                stringIndex = (stringIndex + 1) % strings.length;
                delay = 500;
            }

            typingTimeout = setTimeout(type, delay);
        }

        el.textContent = '';
        type();
    }

    // ─── Counters ───
    function setupCounters() {
        const counters = document.querySelectorAll('.stat-number');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(c => observer.observe(c));
    }

    function animateCounter(el) {
        const target = parseInt(el.getAttribute('data-count'));
        const duration = 2000;
        const start = performance.now();

        function update(now) {
            const elapsed = now - start;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
            el.textContent = Math.round(target * eased);

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    }

    // ─── Skill Tabs ───
    function setupSkillTabs() {
        document.querySelectorAll('.skill-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                const category = tab.getAttribute('data-category');

                document.querySelectorAll('.skill-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                document.querySelectorAll('.skill-card').forEach(card => {
                    const cardCat = card.getAttribute('data-category');
                    card.classList.toggle('hidden', cardCat !== category);
                    if (cardCat === category) {
                        card.classList.add('visible');
                        animateSkillBar(card);
                    }
                });
            });
        });

        // Show default category from first active tab (set by PHP)
        const activeTab = document.querySelector('.skill-tab.active');
        const defaultCategory = activeTab ? activeTab.getAttribute('data-category') : null;
        document.querySelectorAll('.skill-card').forEach(card => {
            const isDefault = defaultCategory && card.getAttribute('data-category') === defaultCategory;
            card.classList.toggle('hidden', !isDefault);
            if (isDefault) {
                card.classList.add('visible');
                animateSkillBar(card);
            }
        });
    }

    // ─── Skill Bar Animations ───
    function setupSkillAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const card = entry.target;
                    card.classList.add('visible');
                    animateSkillBar(card);
                }
            });
        }, { threshold: 0.3 });

        document.querySelectorAll('.skill-card').forEach(card => observer.observe(card));
    }

    function animateSkillBar(card) {
        const bar = card.querySelector('.skill-progress');
        if (!bar) return;
        const width = bar.getAttribute('data-width');
        bar.style.setProperty('--target-width', width + '%');
        requestAnimationFrame(() => {
            bar.classList.add('animated');
        });
    }

    // ─── Portfolio Filters ───
    function setupPortfolioFilters() {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                document.querySelectorAll('.project-card').forEach(card => {
                    const cats = (card.getAttribute('data-category') || '').split(' ');
                    if (filter === 'all' || cats.includes(filter)) {
                        card.classList.remove('hidden');
                        card.style.animation = 'fade-in-up 0.5s ease forwards';
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    }

    // ─── Portfolio Gallery Lightbox ───
    function setupGalleryLightbox() {
        document.querySelectorAll('.gallery-btn').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                let elements;
                try {
                    elements = JSON.parse(btn.dataset.gallery || '[]');
                } catch {
                    return;
                }
                if (!elements.length) return;
                const lb = GLightbox({ elements, loop: true, touchNavigation: true });
                lb.open();
            });
        });
    }

    // ─── Contact Form → Laravel backend → Telegram ───
    function setupContactForm() {
        const form = document.getElementById('contactForm');
        const success = document.getElementById('formSuccess');
        if (!form) return;

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const btn = form.querySelector('button[type="submit"]');
            const originalHTML = btn.innerHTML;
            const sendingText = I18N[currentLang]['contact.form_sending'] || 'Sending...';
            btn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> <span>${sendingText}</span>`;
            btn.disabled = true;

            const payload = {
                name: form.querySelector('#name').value.trim(),
                email: form.querySelector('#email').value.trim(),
                subject: form.querySelector('#subject').value.trim(),
                message: form.querySelector('#message').value.trim(),
            };

            try {
                const res = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken || '',
                    },
                    body: JSON.stringify(payload),
                });

                if (!res.ok) throw new Error('Contact API error');

                form.style.display = 'none';
                success.style.display = 'block';
                success.style.animation = 'fade-in 0.5s ease forwards';

                setTimeout(() => {
                    form.style.display = '';
                    success.style.display = 'none';
                    form.reset();
                    btn.innerHTML = originalHTML;
                    btn.disabled = false;
                }, 5000);
            } catch (err) {
                const errorText = I18N[currentLang]['contact.error_desc'] || 'Something went wrong. Please try again or contact me via Telegram.';
                alert(errorText);
                btn.innerHTML = originalHTML;
                btn.disabled = false;
            }
        });
    }

    // ─── Testimonials Slider ───
    function setupTestimonialsSlider() {
        // Auto-rotate
        testimonialInterval = setInterval(() => {
            const cards = document.querySelectorAll('.testimonial-card');
            if (cards.length === 0) return;
            testimonialIndex = (testimonialIndex + 1) % cards.length;
            showTestimonial(testimonialIndex);
        }, 5000);
    }

    function showTestimonial(index) {
        testimonialIndex = index;
        document.querySelectorAll('.testimonial-card').forEach((card, i) => {
            card.classList.toggle('active', i === index);
        });
        document.querySelectorAll('.slider-dot').forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    // ─── Current Year ───
    function setupCurrentYear() {
        const el = document.getElementById('currentYear');
        if (el) el.textContent = new Date().getFullYear();
    }

    // ─── Render Dynamic Sections ───
    function renderDynamicSections() {
        renderTimeline();
        renderProjects();
        renderBlog();
        renderTestimonials();
    }

    function renderTimeline() {
        const container = document.getElementById('timeline');
        if (!container) return;
        const data = TIMELINE_DATA[currentLang] || [];

        container.innerHTML = data.map((item, i) => `
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="${i * 150}">
                <div class="timeline-content">
                    <span class="timeline-date">${item.date}</span>
                    <h3>${item.title}</h3>
                    <h4>${item.company}</h4>
                    <p>${item.desc}</p>
                    <div class="timeline-techs">
                        ${item.techs.map(t => `<span class="timeline-tech">${t}</span>`).join('')}
                    </div>
                </div>
            </div>
        `).join('');

        if (typeof AOS !== 'undefined') AOS.refresh();
    }

    function renderProjects() {
        const container = document.getElementById('portfolioGrid');
        if (!container) return;
        // Skip if projects are already server-rendered by Blade
        if (container.children.length > 0) return;
        const data = PROJECTS_DATA[currentLang] || [];
        const viewText = I18N[currentLang]['portfolio.view'] || 'Visit Site';

        container.innerHTML = data.map((project, i) => {
            const overlayContent = project.link
                ? `<a href="${project.link}" target="_blank" rel="noopener" class="project-overlay-btn"><i class="fas fa-external-link-alt"></i> ${viewText}</a>`
                : `<span class="project-overlay-btn"><i class="fas fa-eye"></i> ${viewText}</span>`;
            return `
            <div class="project-card" data-category="${project.category}" data-aos="fade-up" data-aos-delay="${i * 100}">
                <div class="project-image">
                    <div class="project-image-bg" style="background: ${project.color}">
                        <i class="${project.icon}"></i>
                    </div>
                    <div class="project-overlay">
                        ${overlayContent}
                    </div>
                </div>
                <div class="project-info">
                    <h3>${project.title}</h3>
                    <p>${project.desc}</p>
                    <div class="project-tags">
                        ${project.tags.map(t => `<span class="project-tag">${t}</span>`).join('')}
                    </div>
                </div>
            </div>`;
        }).join('');

        if (typeof AOS !== 'undefined') AOS.refresh();
    }

    function renderBlog() {
        const container = document.getElementById('blogGrid');
        if (!container) return;
        const data = BLOG_DATA[currentLang] || [];
        const readMore = I18N[currentLang]['blog.read_more'] || 'Read More';

        container.innerHTML = data.map((post, i) => `
            <div class="blog-card" data-aos="fade-up" data-aos-delay="${i * 100}">
                <div class="blog-card-image">
                    <div class="blog-card-placeholder" style="background: ${post.color}">
                        <i class="${post.icon}"></i>
                    </div>
                </div>
                <div class="blog-card-body">
                    <div class="blog-card-meta">
                        <span><i class="fas fa-calendar-alt"></i> ${post.date}</span>
                        <span><i class="fas fa-tag"></i> ${post.category}</span>
                    </div>
                    <h3><a href="${post.url}" target="_blank" rel="noopener">${post.title}</a></h3>
                    <p>${post.desc}</p>
                </div>
            </div>
        `).join('');

        if (typeof AOS !== 'undefined') AOS.refresh();
    }

    function renderTestimonials() {
        const slider = document.getElementById('testimonialsSlider');
        const dots = document.getElementById('sliderDots');
        if (!slider || !dots) return;
        const data = TESTIMONIALS_DATA[currentLang] || [];

        slider.innerHTML = data.map((item, i) => `
            <div class="testimonial-card ${i === 0 ? 'active' : ''}">
                <div class="testimonial-avatar" style="background: ${item.color}">${item.initials}</div>
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">${item.text}</p>
                <div class="testimonial-author">
                    <h4>${item.name}</h4>
                    <p>${item.role}</p>
                </div>
            </div>
        `).join('');

        dots.innerHTML = data.map((_, i) => `
            <button class="slider-dot ${i === 0 ? 'active' : ''}" data-index="${i}" aria-label="Slide ${i + 1}"></button>
        `).join('');

        dots.querySelectorAll('.slider-dot').forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.getAttribute('data-index'));
                showTestimonial(index);
                clearInterval(testimonialInterval);
                testimonialInterval = setInterval(() => {
                    const cards = document.querySelectorAll('.testimonial-card');
                    testimonialIndex = (testimonialIndex + 1) % cards.length;
                    showTestimonial(testimonialIndex);
                }, 5000);
            });
        });

        testimonialIndex = 0;
    }

    // ─── Download CV (creates a simple text file) ───
    document.addEventListener('click', (e) => {
        if (e.target.closest('#downloadCV')) {
            e.preventDefault();
            const cvContent = currentLang === 'ru'
                ? `ДМИТРИЙ ЛЕВЧЕНКО\nMiddle+ PHP Laravel Разработчик\n\nОпыт: 5+ лет\n\nНавыки:\n- PHP, Laravel, WordPress, MODX, OpenCart, OctoberCMS, 1C-Битрикс, Битрикс24\n- React, Vue.js, JavaScript, jQuery, HTML5, CSS3, SCSS\n- MySQL, Redis, SQLite\n- Bash, Apache, Nginx, SSL, CI/CD, Git, GitHub, GitLab, Docker\n\nКонтакты:\nEmail: contact@dmitrii.dev\nTelegram: @dmitrii_dev\nLinkedIn: linkedin.com/in/savanihd`
                : `DMITRII LEVCHENKO\nMiddle+ PHP Laravel Developer\n\nExperience: 5+ years\n\nSkills:\n- PHP, Laravel, WordPress, MODX, OpenCart, OctoberCMS, 1C-Bitrix, Bitrix24\n- React, Vue.js, JavaScript, jQuery, HTML5, CSS3, SCSS\n- MySQL, Redis, SQLite\n- Bash, Apache, Nginx, SSL, CI/CD, Git, GitHub, GitLab, Docker\n\nContact:\nEmail: contact@dmitrii.dev\nTelegram: @dmitrii_dev\nLinkedIn: linkedin.com/in/savanihd`;

            const blob = new Blob([cvContent], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = currentLang === 'ru' ? 'Dmitrii_Levchenko_CV_RU.txt' : 'Dmitrii_Levchenko_CV_EN.txt';
            a.click();
            URL.revokeObjectURL(url);
        }
    });

})();
