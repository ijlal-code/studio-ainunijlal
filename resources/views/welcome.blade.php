<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ainun Ijlal Studio">
    <title>Ainun Ijlal Studio — Web & Digital Showcase</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script>
        document.documentElement.classList.add('has-loader');
        setTimeout(function() {
            document.documentElement.classList.remove('has-loader');
        }, 15000);
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/studio.css') }}?v=3">
    <script src="{{ asset('js/studio.js') }}?v=3" defer></script>
</head>

<body>
    <div class="loading-screen" id="loading-screen" role="status" aria-live="polite"
        aria-label="Memuat preview portofolio">
        <div class="loading-content">
            <div class="loading-mark"><img src="{{ asset('logo.png') }}" alt=""></div>
            <p class="loading-brand">AINUN IJLAL <span>STUDIO</span></p>
            <p class="loading-kicker">CURATED WEB & DIGITAL SHOWCASE</p>
            <h2>Menyiapkan inspirasi Anda.</h2>
            <p class="loading-description">Memuat preview portofolio agar pengalaman menjelajah lebih nyaman.</p>
            <div class="loading-progress" role="progressbar" aria-label="Progress memuat video preview"
                aria-valuemin="0" aria-valuemax="22" aria-valuenow="0"><span></span></div>
            <div class="loading-meta"><span id="loading-status">Menyiapkan video preview</span><span
                    id="loading-count">0 / 22</span></div>
            <button type="button" id="loading-skip">Masuk sekarang <span aria-hidden="true">→</span></button>
        </div>
    </div>

    

    <header class="header">
        <div class="container nav-inner">
            <a href="#top" class="brand-logo" aria-label="Ainun Ijlal Studio"><span class="brand-mark"><img
                        src="{{ asset('logo.png') }}" alt=""></span><span class="brand-wordmark">Ainun
                    Ijlal<span>.</span> <small>STUDIO</small></span></a>
            <nav aria-label="Navigasi utama" class="nav-links">
                <a href="#katalog" data-i18n="navCatalog">Katalog Web</a>
                <a href="#custom" data-i18n="navContact">Konsultasi Kustom</a>
                <a href="https://ainunijlal.com" target="_blank" rel="noopener noreferrer" data-i18n="navMain">Portfolio
                    Utama</a>
            </nav>
            <div class="language" role="group" aria-label="Bahasa / Language">
                <button type="button" data-lang="id" aria-pressed="true">ID</button><button type="button"
                    data-lang="en" aria-pressed="false">EN</button>
            </div>
        </div>
    </header>
    <main id="top" class="container">
        <section class="hero">
            <span class="hero-badge">CURATED WEB & DIGITAL SHOWCASE</span>
            <h1><span data-i18n="hero1">Dari konsep abstrak menjadi</span> <em data-i18n="hero2">website nyata yang
                    menghasilkan.</em></h1>
            <p data-i18n="heroDesc">Jelajahi inspirasi website untuk berbagai bidang, atau ceritakan ide Anda untuk
                solusi yang dibuat sesuai kebutuhan.</p>
            <a class="hero-link" href="#katalog" data-i18n="explore">Jelajahi katalog</a>
        </section>
        <section id="katalog" aria-label="Katalog">
            <div class="tabs-wrapper" role="tablist" aria-label="Layanan / Services">
                <button type="button" id="tab-web" class="tab-btn active" role="tab" aria-selected="true"
                    aria-controls="section-web" data-i18n="webTab">Website Development</button>
                <button type="button" id="tab-design" class="tab-btn" role="tab" aria-selected="false"
                    aria-controls="section-design"><span data-i18n="designTab">Graphic Design</span> <span
                        class="badge-soon" data-i18n="soon">Segera hadir</span></button>
            </div>
            <div id="section-web" role="tabpanel" aria-labelledby="tab-web">
                <div class="catalog-intro">
                    <div><span class="eyebrow" data-i18n="collection">THE COLLECTION / 01</span>
                        <h2 data-i18n="catalogTitle">Temukan inspirasi Anda.</h2>
                        <p data-i18n="catalogDesc">22 contoh landing page, dirancang untuk berbagai ide dan industri.
                            Pilih kategori untuk menjelajah.</p>
                    </div>
                </div>
                <div class="subfilters" aria-label="Filter kategori / Category filters">
                    <button class="filter-btn active" type="button" data-filter="all" aria-pressed="true"
                        data-i18n="all">Semua</button>
                    <button class="filter-btn" type="button" data-filter="creative" aria-pressed="false"
                        data-i18n="creative">Agensi & Bisnis</button>
                    <button class="filter-btn" type="button" data-filter="spaces" aria-pressed="false"
                        data-i18n="spaces">Arsitektur & Properti</button>
                    <button class="filter-btn" type="button" data-filter="tech" aria-pressed="false"
                        data-i18n="tech">Teknologi & AI</button>
                    <button class="filter-btn" type="button" data-filter="finance" aria-pressed="false"
                        data-i18n="finance">Keuangan</button>
                    <button class="filter-btn" type="button" data-filter="legal" aria-pressed="false"
                        data-i18n="legal">Hukum & Regulasi</button>
                    <button class="filter-btn" type="button" data-filter="energy" aria-pressed="false"
                        data-i18n="energy">Energi & Industri</button>
                    <button class="filter-btn" type="button" data-filter="adventure" aria-pressed="false"
                        data-i18n="adventure">Olahraga & Petualangan</button>
                    <button class="filter-btn" type="button" data-filter="education" aria-pressed="false"
                        data-i18n="education">Pendidikan</button>
                </div>
                <div class="cards-grid">
                    @foreach (config('portfolio') as [$name, $category, $descriptionId, $descriptionEn, $url, $image, $video])
                        <article class="project-card" data-category="{{ $category }}">
                            <a class="card-thumb" href="{{ asset($url) }}" target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Preview {{ $name }} (tab baru / new tab)">
                                <video class="preview-video" poster="{{ asset($image) }}"
                                    data-mp4="{{ asset($video) }}?v=3" muted playsinline loop preload="none"
                                    aria-hidden="true" width="640" height="400"></video>
                            </a>
                            <div class="card-body"><span class="card-tag" data-i18n="{{ $category }}"></span>
                                <h3>{{ $name }}</h3>
                                <p data-id="{{ $descriptionId }}" data-en="{{ $descriptionEn }}">
                                    {{ $descriptionId }}</p>
                            </div>
                            <div class="card-actions"><a class="btn btn-outline" href="{{ asset($url) }}"
                                    target="_blank" rel="noopener noreferrer" data-i18n="fullPreview">Preview
                                    lengkap</a><a class="btn btn-wa project-wa" href="https://wa.me/6287716208495"
                                    target="_blank" rel="noopener noreferrer" data-project="{{ $name }}"
                                    data-i18n="askProject">Diskusikan model ini</a></div>
                        </article>
                    @endforeach
                </div>
            </div>
            <div id="section-design" role="tabpanel" aria-labelledby="tab-design" hidden>
                <div class="coming-soon-box">
                    <h2 data-i18n="designTitle">Layanan desain grafis segera hadir.</h2>
                    <p data-i18n="designDesc">Identitas visual, branding, dan materi promosi akan hadir di sini.</p><a
                        class="btn btn-wa general-wa" href="https://wa.me/6287716208495" target="_blank"
                        rel="noopener noreferrer" data-i18n="contactWa">Hubungi via WhatsApp</a>
                </div>
            </div>
        </section>
        <section class="services" aria-labelledby="services-title">
            <span class="eyebrow" data-i18n="servicesLabel">LAYANAN WEBSITE</span>
            <h2 id="services-title" data-i18n="servicesTitle">Dibuat sesuai kebutuhan Anda.</h2>
            <p class="services-intro" data-i18n="servicesDesc">Punya kebutuhan di luar contoh landing page? Pilih
                layanan untuk memulai percakapan.</p>
            <div class="services-grid">
                <article class="service-card"><span>01</span>
                    <h3 data-i18n="service1">Landing Page</h3>
                    <p data-i18n="service1Desc">Untuk promosi produk, bisnis, atau acara.</p><a
                        class="btn btn-wa project-wa service-contact" href="https://wa.me/6287716208495"
                        target="_blank" rel="noopener noreferrer" data-kind="service" data-project="Landing Page"
                        data-project-en="Landing Page" data-i18n="contactMe">Hubungi saya</a>
                </article>
                <article class="service-card"><span>02</span>
                    <h3 data-i18n="service2">Company Profile</h3>
                    <p data-i18n="service2Desc">Perkenalkan bisnis dan layanan Anda secara profesional.</p><a
                        class="btn btn-wa project-wa service-contact" href="https://wa.me/6287716208495"
                        target="_blank" rel="noopener noreferrer" data-kind="service" data-project="Company Profile"
                        data-project-en="Company Profile" data-i18n="contactMe">Hubungi saya</a>
                </article>
                <article class="service-card"><span>03</span>
                    <h3 data-i18n="service3">Undangan Digital</h3>
                    <p data-i18n="service3Desc">Hadirkan informasi acara dalam undangan interaktif.</p><a
                        class="btn btn-wa project-wa service-contact" href="https://wa.me/6287716208495"
                        target="_blank" rel="noopener noreferrer" data-kind="service"
                        data-project="Undangan Digital" data-project-en="Digital Invitation"
                        data-i18n="contactMe">Hubungi saya</a>
                </article>
                <article class="service-card"><span>04</span>
                    <h3 data-i18n="service4">Portofolio Profesional</h3>
                    <p data-i18n="service4Desc">Tampilkan karya dan perjalanan profesional Anda.</p><a
                        class="btn btn-wa project-wa service-contact" href="https://wa.me/6287716208495"
                        target="_blank" rel="noopener noreferrer" data-kind="service"
                        data-project="Portofolio Profesional" data-project-en="Professional Portfolio"
                        data-i18n="contactMe">Hubungi saya</a>
                </article>
                <article class="service-card"><span>05</span>
                    <h3 data-i18n="service5">Aplikasi Web Kustom</h3>
                    <p data-i18n="service5Desc">Diskusikan sistem atau dashboard sesuai alur kerja Anda.</p><a
                        class="btn btn-wa project-wa service-contact" href="https://wa.me/6287716208495"
                        target="_blank" rel="noopener noreferrer" data-kind="service"
                        data-project="Aplikasi Web Kustom" data-project-en="Custom Web Application"
                        data-i18n="contactMe">Hubungi saya</a>
                </article>
            </div>
        </section>
        <section class="cta-banner" id="custom">
            <div><span class="cta-label" data-i18n="customLabel">PUNYA IDE LAIN?</span>
                <h2 data-i18n="ctaTitle">Mari wujudkan proyek Anda.</h2>
                <p data-i18n="ctaDesc">Dari website bisnis hingga kebutuhan kustom, ceritakan visi Anda dan mari
                    diskusikan langkah selanjutnya.</p>
            </div><a class="btn btn-coral general-wa" href="https://wa.me/6287716208495" target="_blank"
                rel="noopener noreferrer" data-i18n="consult">Konsultasi via WhatsApp</a>
        </section>
    </main>
    <footer>
        <div class="container footer-inner">
            <div><a href="#top" class="brand-logo"><span class="brand-mark"><img src="{{ asset('logo.png') }}"
                            alt=""></span><span class="brand-wordmark">Ainun Ijlal<span>.</span>
                        <small>STUDIO</small></span></a>
                <p data-i18n="footerDesc">Web & digital solutions untuk ide yang ingin tumbuh.</p><a
                    href="https://ainunijlal.com" target="_blank" rel="noopener noreferrer">ainunijlal.com</a>
            </div>
            <div class="footer-contact"><span class="eyebrow" data-i18n="connect">TERHUBUNG</span>
                <div class="contact-links"><a
                        href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=ijlalainun%40gmail.com"
                        target="_blank" rel="noopener noreferrer">Email</a><a
                        href="https://www.linkedin.com/in/ainunijlal" target="_blank"
                        rel="noopener noreferrer">LinkedIn</a><a href="https://www.instagram.com/ainunijlal_ai/"
                        target="_blank" rel="noopener noreferrer">Instagram</a><a
                        href="https://www.tiktok.com/@ainunijlal" target="_blank"
                        rel="noopener noreferrer">TikTok</a><a href="https://www.youtube.com/@ainunijlal"
                        target="_blank" rel="noopener noreferrer">YouTube</a><a class="general-wa"
                        href="https://wa.me/6287716208495" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                </div>
                <p>ijlalainun@gmail.com · +62 877-1620-8495</p>
            </div>
        </div>
        <div class="container">
            <p class="copyright">&copy; {{ now()->year }} Ainun Ijlal</p>
        </div>
    </footer>
</body>

</html>
