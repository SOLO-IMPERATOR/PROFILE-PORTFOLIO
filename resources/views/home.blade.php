@extends('layouts.default')

@section('content')
    <!-- ======================== HERO SECTION ======================== -->
    <section id="hero" class="hero">
        <div class="hero-particles" id="heroParticles"></div>
        <div class="hero-container">
            <div class="hero-content" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-badge" data-i18n="hero.badge">Available for new projects</div>
                <h1 class="hero-title">
                    <span data-i18n="hero.greeting">Hi, I'm</span>
                    <span data-i18n="hero.name" class="hero-name gradient-text">DMITRII LEVCHENKO</span>
                </h1>
                <div class="hero-typing">
                    <span class="typing-prefix">$&gt; </span>
                    <span class="typing-text" id="typingText"></span>
                    <span class="typing-cursor">|</span>
                </div>
                <p class="hero-description" data-i18n="hero.description">
                    Middle+ PHP Laravel Developer with 5+ years of experience crafting robust web applications, APIs, and full-stack solutions. Passionate about clean code and scalable architecture.
                </p>
                <div class="hero-cta">
                    <a href="#contact" class="btn btn-primary btn-glow">
                        <i class="fas fa-paper-plane"></i>
                        <span data-i18n="hero.cta_hire">Hire Me</span>
                    </a>
                    <a href="#portfolio" class="btn btn-outline">
                        <i class="fas fa-briefcase"></i>
                        <span data-i18n="hero.cta_work">View My Work</span>
                    </a>
                    <a href="#" class="btn btn-ghost" id="downloadCV">
                        <i class="fas fa-download"></i>
                        <span data-i18n="hero.cta_cv">Download CV</span>
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                        <span class="stat-number" data-count="5">0</span><span class="stat-plus">+</span>
                        <span class="stat-label" data-i18n="hero.stat_years">Years Experience</span>
                    </div>
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                        <span class="stat-number" data-count="50">0</span><span class="stat-plus">+</span>
                        <span class="stat-label" data-i18n="hero.stat_projects">Projects Completed</span>
                    </div>
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="600">
                        <span class="stat-number" data-count="30">0</span><span class="stat-plus">+</span>
                        <span class="stat-label" data-i18n="hero.stat_clients">Happy Clients</span>
                    </div>
                </div>
            </div>
            <div class="hero-visual" data-aos="fade-left" data-aos-duration="1000">
                <div class="profile-card">
                    <div class="profile-card-glow"></div>
                    <div class="profile-image-wrap">
                        <img src="{{ asset('images/profile.png') }}" alt="Dmitrii Levchenko — PHP Laravel WordPress Developer, freelance web developer for hire" width="640" height="640" class="profile-image" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><defs><linearGradient id=%22g%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%236366f1%22/><stop offset=%22100%25%22 style=%22stop-color:%2306b6d4%22/></linearGradient></defs><rect fill=%22url(%23g)%22 width=%22400%22 height=%22400%22 rx=%2220%22/><text x=%2250%25%22 y=%2250%25%22 font-family=%22Inter,sans-serif%22 font-size=%2280%22 font-weight=%22700%22 fill=%22white%22 text-anchor=%22middle%22 dominant-baseline=%22central%22>DL</text></svg>'">
                    </div>
                    <div class="profile-card-info">
                        <h3  data-i18n="hero.name">Dmitrii Levchenko</h3>
                        <p data-i18n="hero.card_title">Middle+ PHP Laravel Developer</p>
                    </div>
                    <div class="profile-card-techs">
                        <span class="tech-badge"><i class="devicon-php-plain colored"></i> PHP</span>
                        <span class="tech-badge"><i class="devicon-laravel-original colored"></i> Laravel</span>
                        <span class="tech-badge"><i class="devicon-vuejs-plain colored"></i> Vue</span>
                        <span class="tech-badge"><i class="devicon-react-original colored"></i> React</span>
                    </div>
                </div>
                <!-- Floating tech icons -->
                <div class="floating-icons">
                    <div class="float-icon fi-1"><i class="devicon-php-plain colored"></i></div>
                    <div class="float-icon fi-2"><i class="devicon-laravel-original colored"></i></div>
                    <div class="float-icon fi-3"><i class="devicon-mysql-original colored"></i></div>
                    <div class="float-icon fi-4"><i class="devicon-vuejs-plain colored"></i></div>
                    <div class="float-icon fi-5"><i class="devicon-react-original colored"></i></div>
                    <div class="float-icon fi-6"><i class="devicon-git-plain colored"></i></div>
                    <div class="float-icon fi-7"><i class="devicon-javascript-plain colored"></i></div>
                    <div class="float-icon fi-8"><i class="devicon-docker-plain colored"></i></div>
                </div>
            </div>
        </div>
        <div class="hero-scroll">
            <a href="#about" class="scroll-indicator">
                <span data-i18n="hero.scroll">Scroll Down</span>
                <div class="scroll-arrow"><i class="fas fa-chevron-down"></i></div>
            </a>
        </div>
    </section>

    <!-- ======================== ABOUT SECTION ======================== -->
    <section id="about" class="section about">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag" data-i18n="about.tag">Get to know me</span>
                <h2 class="section-title" data-i18n="about.title">About Me</h2>
                <div class="section-line"></div>
            </div>
            <div class="about-grid">
                <div class="about-image" data-aos="fade-right">
                    <div class="about-image-wrapper">
                        <div class="code-window">
                            <div class="code-header">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                                <span class="code-title">about.php</span>
                            </div>
                            <pre class="code-body"><code><span class="code-keyword">class</span> <span class="code-class">Developer</span> <span class="code-keyword">extends</span> <span class="code-class">Human</span>
{
    <span class="code-keyword">public string</span> <span class="code-var">$name</span> = <span class="code-string">'Dmitrii Levchenko'</span>;
    <span class="code-keyword">public string</span> <span class="code-var">$role</span> = <span class="code-string">'Middle+ Laravel Dev'</span>;
    <span class="code-keyword">public int</span> <span class="code-var">$experience</span> = <span class="code-number">5</span>;

    <span class="code-keyword">public function</span> <span class="code-func">skills</span>(): <span class="code-class">array</span>
    {
        <span class="code-keyword">return</span> [
            <span class="code-string">'PHP'</span>, <span class="code-string">'Laravel'</span>,
            <span class="code-string">'Vue.js'</span>, <span class="code-string">'React'</span>,
            <span class="code-string">'MySQL'</span>, <span class="code-string">'Git'</span>,
        ];
    }
}</code></pre>
                        </div>
                    </div>
                </div>
                <div class="about-content" data-aos="fade-left">
                    <h3 class="about-subtitle" data-i18n="about.subtitle">
                        A passionate developer building the web, one line at a time
                    </h3>
                    <p class="about-text" data-i18n="about.text1">
                        With over 5 years of hands-on experience in web development, I specialize in building robust, scalable applications using PHP and the Laravel framework. My journey began with a curiosity for how things work on the internet and has evolved into a professional career crafting solutions that make a real impact.
                    </p>
                    <p class="about-text" data-i18n="about.text2">
                        I believe in writing clean, maintainable code and following best practices. From e-commerce platforms to complex API integrations, I've worked across diverse projects that have sharpened my skills in both backend and frontend development.
                    </p>
                    <p class="about-text" data-i18n="about.text3">
                        When I'm not coding, I stay up-to-date with the latest technologies and contribute to the developer community. I'm always eager to take on new challenges and collaborate on exciting projects.
                    </p>
                    <div class="about-details">
                        <div class="detail-item">
                            <i class="fas fa-user"></i>
                            <div>
                                <strong data-i18n="about.detail_name_label">Name:</strong>
                                <span>Dmitrii Levchenko</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-briefcase"></i>
                            <div>
                                <strong data-i18n="about.detail_role_label">Role:</strong>
                                <span data-i18n="about.detail_role">Middle+ PHP Laravel Developer</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <strong data-i18n="about.detail_exp_label">Experience:</strong>
                                <span data-i18n="about.detail_exp">5+ Years</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <strong>Email:</strong>
                                <span>d.levchencko@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="about-cta">
                        <a href="#contact" class="btn btn-primary">
                            <i class="fas fa-handshake"></i>
                            <span data-i18n="about.cta">Let's Work Together</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <x-ables.section :categories="$categoriesAbillity" >

   </x-ables.section>

    <!-- ======================== EXPERIENCE SECTION ======================== -->
    <section id="experience" class="section experience">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag" data-i18n="experience.tag">My journey</span>
                <h2 class="section-title" data-i18n="experience.title">Experience Timeline</h2>
                <div class="section-line"></div>
            </div>
            <div class="timeline" id="timeline">
                <!-- Timeline items will be populated by JS based on language -->
            </div>
        </div>
    </section>

    <!-- ======================== SERVICES SECTION ======================== -->
    <section id="services" class="section services">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag" data-i18n="services.tag">What I offer</span>
                <h2 class="section-title" data-i18n="services.title">Services</h2>
                <div class="section-line"></div>
            </div>
            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 data-i18n="services.s1_title">Web Application Development</h3>
                    <p data-i18n="services.s1_desc">Custom web applications built with Laravel, featuring robust architecture, clean code, and scalability for growing businesses.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s1_f1">Custom Laravel Applications</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s1_f2">RESTful API Development</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s1_f3">Admin Panels & Dashboards</span></li>
                    </ul>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 data-i18n="services.s2_title">E-Commerce Solutions</h3>
                    <p data-i18n="services.s2_desc">Complete online store solutions using WordPress/WooCommerce, OpenCart, or custom Laravel-based e-commerce platforms.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s2_f1">Online Stores</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s2_f2">Payment Integration</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s2_f3">Inventory Management</span></li>
                    </ul>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 data-i18n="services.s3_title">Full-Stack Development</h3>
                    <p data-i18n="services.s3_desc">End-to-end development with modern frontend frameworks (Vue.js, React) and Laravel backend, creating seamless user experiences.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s3_f1">SPA Applications</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s3_f2">Responsive Design</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s3_f3">Real-time Features</span></li>
                    </ul>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-icon">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <h3 data-i18n="services.s4_title">CMS Development & Integration</h3>
                    <p data-i18n="services.s4_desc">Expert setup and customization of popular CMS platforms: WordPress, MODX, OctoberCMS, and 1C-Bitrix for content-rich websites.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s4_f1">Theme Development</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s4_f2">Plugin / Module Creation</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s4_f3">Migration & Optimization</span></li>
                    </ul>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <h3 data-i18n="services.s5_title">Server & DevOps Setup</h3>
                    <p data-i18n="services.s5_desc">Server configuration, SSL certificates, CI/CD pipelines, and deployment automation for reliable hosting environments.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s5_f1">Nginx / Apache Configuration</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s5_f2">CI/CD Pipelines</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s5_f3">SSL & Security</span></li>
                    </ul>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 data-i18n="services.s6_title">Technical Consulting</h3>
                    <p data-i18n="services.s6_desc">Expert advice on architecture decisions, technology stack selection, code review, performance optimization, and project planning.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s6_f1">Architecture Review</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s6_f2">Performance Audit</span></li>
                        <li><i class="fas fa-check"></i> <span data-i18n="services.s6_f3">Code Review</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <x-projects.section :categories="$categoriesProject" :projects="$projects" />


    <!-- ======================== TESTIMONIALS SECTION ======================== -->
    <section id="testimonials" class="section testimonials">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag" data-i18n="testimonials.tag">Client feedback</span>
                <h2 class="section-title" data-i18n="testimonials.title">Testimonials</h2>
                <div class="section-line"></div>
            </div>
            <div class="testimonials-slider" id="testimonialsSlider">
                <!-- Testimonials populated by JS -->
            </div>
            <div class="slider-dots" id="sliderDots"></div>
        </div>
    </section>

    <!-- ======================== CONTACT SECTION ======================== -->
    <section id="contact" class="section contact">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag" data-i18n="contact.tag">Get in touch</span>
                <h2 class="section-title" data-i18n="contact.title">Contact Me</h2>
                <div class="section-line"></div>
            </div>
            <div class="contact-grid">
                <div class="contact-info" data-aos="fade-right">
                    <h3 data-i18n="contact.info_title">Let's discuss your project</h3>
                    <p data-i18n="contact.info_desc">Have a project in mind? Looking for a reliable developer? Feel free to reach out. I'm always open to new opportunities and interesting projects.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h4>Email</h4>
                                <a href="mailto:d.levchencko@gmail.com">d.levchencko@gmail.com</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fab fa-telegram-plane"></i></div>
                            <div>
                                <h4>Telegram</h4>
                                <a href="https://t.me/solo_imperator" target="_blank" rel="noopener">@solo_imperator</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fab fa-linkedin-in"></i></div>
                            <div>
                                <h4>LinkedIn</h4>
                                <a href="https://www.linkedin.com/in/soloimperator" target="_blank" rel="noopener">linkedin.com/in/soloimperator</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
                            <div>
                                <h4>WhatsApp</h4>
                                <a href="https://wa.me/qr/AELMX7GR4WWCO1" target="_blank" rel="noopener">whatsapp</a>
                            </div>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="https://t.me/solo_imperator" target="_blank" rel="noopener" class="social-link" aria-label="Telegram">
                            <i class="fab fa-telegram-plane"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/soloimperator" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/qr/AELMX7GR4WWCO1" target="_blank" rel="noopener" class="social-link" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div class="contact-form-wrap" data-aos="fade-left">
                    <form class="contact-form" id="contactForm">
                        <div class="form-group">
                            <label for="name" data-i18n="contact.form_name">Your Name</label>
                            <input type="text" id="name" name="name" required placeholder="">
                            <span class="form-icon"><i class="fas fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <label for="email" data-i18n="contact.form_email">Your Email</label>
                            <input type="email" id="email" name="email" required placeholder="">
                            <span class="form-icon"><i class="fas fa-envelope"></i></span>
                        </div>
                        <div class="form-group">
                            <label for="subject" data-i18n="contact.form_subject">Subject</label>
                            <input type="text" id="subject" name="subject" required placeholder="">
                            <span class="form-icon"><i class="fas fa-tag"></i></span>
                        </div>
                        <div class="form-group">
                            <label for="message" data-i18n="contact.form_message">Message</label>
                            <textarea id="message" name="message" rows="5" required placeholder=""></textarea>
                            <span class="form-icon textarea-icon"><i class="fas fa-comment-dots"></i></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-glow btn-full">
                            <i class="fas fa-paper-plane"></i>
                            <span data-i18n="contact.form_submit">Send Message</span>
                        </button>
                    </form>
                    <div class="form-success" id="formSuccess" style="display:none;">
                        <i class="fas fa-check-circle"></i>
                        <h3 data-i18n="contact.success_title">Message Sent!</h3>
                        <p data-i18n="contact.success_desc">Thank you for reaching out. I'll get back to you as soon as possible.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection