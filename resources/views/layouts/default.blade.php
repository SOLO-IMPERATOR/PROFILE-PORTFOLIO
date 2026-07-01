<!DOCTYPE html>
<html lang="en" data-lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary SEO Meta Tags -->
    <title>Dmitrii Levchenko — PHP Developer | Laravel, WordPress, 1C-Bitrix | Hire Freelance Web Developer</title>
    <meta name="description" content="Dmitrii Levchenko — experienced PHP developer specializing in Laravel, WordPress, WooCommerce, and 1C-Bitrix. 5+ years building e-commerce stores, CRM integrations, and corporate websites. Available for freelance projects.">
    <meta name="keywords" content="PHP developer, Laravel developer, WordPress developer, WooCommerce developer, 1C-Bitrix developer, freelance web developer, hire PHP developer, full-stack developer, web development, e-commerce development, CRM integration, Bitrix24, SEO optimization, website migration, PHP разработчик, Laravel разработчик, WordPress разработчик, фриланс веб-разработчик, создание сайтов, интернет-магазин, разработка сайтов">
    <meta name="author" content="Dmitrii Levchenko">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://soloimperator.tech/">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://soloimperator.tech/">
    <meta property="og:title" content="Dmitrii Levchenko — PHP Developer | Laravel, WordPress, 1C-Bitrix">
    <meta property="og:description" content="Experienced PHP developer specializing in Laravel, WordPress, WooCommerce, and 1C-Bitrix. 5+ years building e-commerce, CRM integrations, and corporate websites. Available for hire.">
    <meta property="og:image" content="{{ asset('images/profile.png') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:locale:alternate" content="ru_RU">
    <meta property="og:site_name" content="Dmitrii Levchenko — Web Developer Portfolio">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Dmitrii Levchenko — PHP Developer | Laravel, WordPress, 1C-Bitrix">
    <meta name="twitter:description" content="Experienced PHP developer specializing in Laravel, WordPress, WooCommerce, and 1C-Bitrix. Available for freelance projects.">
    <meta name="twitter:image" content="{{ asset('images/profile.png') }}">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    @verbatim
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Dmitrii Levchenko",
        "alternateName": "Дмитрий Левченко",
        "url": "https://soloimperator.tech/",
        "image": "/images/profile.png",
        "jobTitle": "PHP Developer",
        "description": "Middle+ PHP developer specializing in Laravel, WordPress, WooCommerce, and 1C-Bitrix with 5+ years of experience.",
        "knowsAbout": ["PHP", "Laravel", "WordPress", "WooCommerce", "1C-Bitrix", "Bitrix24", "Vue.js", "React", "JavaScript", "MySQL", "Docker", "SEO"],
        "sameAs": [
            "https://t.me/solo_imperator",
            "https://www.linkedin.com/in/soloimperator"
        ],
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "freelance inquiries",
            "availableLanguage": ["English", "Russian"]
        },
        "makesOffer": {
            "@type": "Offer",
            "itemOffered": {
                "@type": "Service",
                "name": "Web Development Services",
                "description": "Custom web development: Laravel applications, WordPress/WooCommerce stores, 1C-Bitrix websites, CRM integrations, website migrations, and SEO optimization."
            }
        }
    }
    @endverbatim
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Devicon for technology icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.16.0/devicon.min.css">

    <!-- Font Awesome for UI icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- AOS Animate On Scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

    <!-- Main CSS -->
    @vite(['resources/css/style.css'])
</head>
<body>

    <!-- ======================== PRELOADER ======================== -->
    <div id="preloader">
        <div class="loader">
            <div class="loader-code">&lt;/&gt;</div>
            <div class="loader-bar"><span></span></div>
        </div>
    </div>

    <!-- ======================== NAVIGATION ======================== -->
    <nav id="navbar" class="navbar">
        <div class="nav-container">
            <a href="#hero" class="nav-logo">
                <span class="logo-bracket">&lt;</span>DL<span class="logo-bracket">/&gt;</span>
            </a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#hero" class="nav-link active" data-i18n="nav.home">Home</a></li>
                <li><a href="#about" class="nav-link" data-i18n="nav.about">About</a></li>
                <li><a href="#skills" class="nav-link" data-i18n="nav.skills">Skills</a></li>
                <li><a href="#experience" class="nav-link" data-i18n="nav.experience">Experience</a></li>
                <li><a href="#services" class="nav-link" data-i18n="nav.services">Services</a></li>
                <li><a href="#portfolio" class="nav-link" data-i18n="nav.portfolio">Portfolio</a></li>
                <li><a href="#testimonials" class="nav-link" data-i18n="nav.testimonials">Testimonials</a></li>
                <li><a href="#contact" class="nav-link" data-i18n="nav.contact">Contact</a></li>
            </ul>
            <div class="nav-actions">
                <!-- Language Switcher -->
                <div class="lang-switcher" id="langSwitcher">
                    <button class="lang-btn active" data-lang="en">EN</button>
                    <button class="lang-btn" data-lang="ru">RU</button>
                </div>
                <!-- Theme Toggle -->
                <button class="theme-toggle" id="themeToggle" aria-label="Switch theme">
                    <i class="fas fa-moon"></i>
                </button>
                <!-- Mobile Hamburger -->
                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!-- ======================== FOOTER ======================== -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#hero" class="nav-logo">
                        <span class="logo-bracket">&lt;</span>DL<span class="logo-bracket">/&gt;</span>
                    </a>
                    <p data-i18n="footer.desc">Middle+ PHP Laravel Developer crafting modern web solutions with 5+ years of expertise.</p>
                </div>
                <div class="footer-links">
                    <h4 data-i18n="footer.quick_links">Quick Links</h4>
                    <ul>
                        <li><a href="#about" data-i18n="nav.about">About</a></li>
                        <li><a href="#skills" data-i18n="nav.skills">Skills</a></li>
                        <li><a href="#portfolio" data-i18n="nav.portfolio">Portfolio</a></li>
                        <li><a href="#contact" data-i18n="nav.contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <h4 data-i18n="footer.follow">Follow Me</h4>
                    <div class="social-links">
                        <a href="https://t.me/solo_imperator" target="_blank" rel="noopener" aria-label="Telegram"><i class="fab fa-telegram-plane"></i></a>
                        <a href="https://www.linkedin.com/in/soloimperator" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://wa.me/qr/AELMX7GR4WWCO1" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <span id="currentYear"></span> Dmitrii Levchenko. <span data-i18n="footer.rights">All rights reserved.</span></p>
                <a href="#hero" class="back-to-top" aria-label="Back to top"><i class="fas fa-arrow-up"></i></a>
            </div>
        </div>
    </footer>

    <!-- AOS Library -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <!-- Main JS -->
    @vite(['resources/js/i18n.js', 'resources/js/main.js'])

    <!-- Fallback content for search engines that don't execute JS -->
    <noscript>
        <div style="padding:40px;max-width:800px;margin:auto;font-family:sans-serif;">
            <h1>Dmitrii Levchenko — PHP Developer</h1>
            <h2>Laravel, WordPress, WooCommerce, 1C-Bitrix Developer</h2>
            <p>Experienced PHP developer with 5+ years of expertise. Specializing in Laravel framework, WordPress/WooCommerce e-commerce solutions, 1C-Bitrix corporate websites, and Bitrix24 CRM integrations.</p>
            <h3>Services</h3>
            <ul>
                <li>Laravel Web Applications</li>
                <li>WordPress & WooCommerce Development</li>
                <li>1C-Bitrix & Bitrix24 Integration</li>
                <li>E-Commerce Store Development</li>
                <li>Website Migration & SEO Optimization</li>
                <li>CRM Integration (AMO CRM, Bitrix24)</li>
            </ul>
            <h3>Portfolio</h3>
            <ul>
                <li><a href="https://rabbit-tattoo.ru/">Rabbit Tattoo Studio</a> — WordPress, SCSS, Swiper, ACF, AMO CRM</li>
                <li><a href="https://hochustul.ru/">HochuStul Online Store</a> — WordPress, WooCommerce, Bitrix24</li>
                <li><a href="https://steelcraft.ru/">SteelCraft Manufacturing</a> — WordPress, ACF, PHP</li>
                <li><a href="https://aerdyn.ru/">Aerdyn Website Migration</a> — WordPress, PHP</li>
            </ul>
            <h3>Contact</h3>
            <p>Telegram: <a href="https://t.me/solo_imperator">@solo_imperator</a> | LinkedIn: <a href="https://www.linkedin.com/in/soloimperator">soloimperator</a></p>
        </div>
    </noscript>
</body>
</html>
