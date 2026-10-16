@php
    $waLink = "https://wa.me/" . ($settings->whatsapp ?? '919868340066');
@endphp
<!-- TOPBAR -->
<div class="topbar">
    <div class="ctn">
        <div class="topbar-left">
            <span><a href="tel:{{ $settings->phone_raw ?? '919868340066' }}">📞 {{ $settings->phone ?? '+91 98683 40066' }}</a></span>
            <span><a href="mailto:{{ $settings->email ?? 'shiv.astro@yahoo.com' }}">✉ {{ $settings->email ?? 'shiv.astro@yahoo.com' }}</a></span>
        </div>
        <div class="topbar-marquee">
            <div class="topbar-marquee-inner">
                <span>जन्म कुंडली विश्लेषण</span><span>विवाह हेतु कुंडली मिलान</span><span>शिक्षा से संबंधित ज्योतिषीय सलाह</span><span>बिजनेस और कैरियर से संबंधित सलाह</span><span>रत्न सलाहकार</span><span>वास्तु सलाहकार</span><span>शुभ मुहूर्त चयन</span>
                <span>जन्म कुंडली विश्लेषण</span><span>विवाह हेतु कुंडली मिलान</span><span>शिक्षा से संबंधित ज्योतिषीय सलाह</span><span>बिजनेस और कैरियर से संबंधित सलाह</span><span>रत्न सलाहकार</span><span>वास्तु सलाहकार</span><span>शुभ मुहूर्त चयन</span>
            </div>
        </div>
        <div class="topbar-social">
            @if(isset($settings->facebook_url) && !empty($settings->facebook_url) && $settings->facebook_url !== '#')
                <a href="{{ $settings->facebook_url }}" title="Facebook" target="_blank"><i class="bi bi-facebook"></i></a>
            @endif
            @if(isset($settings->instagram_url) && !empty($settings->instagram_url) && $settings->instagram_url !== '#')
                <a href="{{ $settings->instagram_url }}" title="Instagram" target="_blank"><i class="bi bi-instagram"></i></a>
            @endif
            @if(isset($settings->twitter_url) && !empty($settings->twitter_url) && $settings->twitter_url !== '#')
                <a href="{{ $settings->twitter_url }}" title="Twitter / X" target="_blank"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if(isset($settings->linkedin_url) && !empty($settings->linkedin_url) && $settings->linkedin_url !== '#')
                <a href="{{ $settings->linkedin_url }}" title="LinkedIn" target="_blank"><i class="bi bi-linkedin"></i></a>
            @endif
            <a href="{{ $waLink }}" title="WhatsApp" target="_blank"><i class="bi bi-whatsapp"></i></a>
            <!-- Justdial -->
<a href="https://jsdl.in/DT-23PHD476NZL"
   title="Justdial"
   target="_blank"
   rel="noopener noreferrer"
   style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:11px;color:var(--w400);transition:all .2s">
    <span style="font-weight:600;">JD</span>
</a>
        </div>
    </div>
</div>

<!-- HEADER -->
<header class="header" id="header">
    <div class="ctn">
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="AstroVastuPooja Logo" style="height: 52px; width: 52px; border-radius: 50%; object-fit: cover; border: 1px solid var(--w200);">
            <div>
                <div class="logo-brand">{{ $settings->site_name ?? 'AstroVastuPooja' }}</div>
                <div class="logo-sub">{{ $settings->guru_name ?? 'Pt. Dhiraj Baluni' }}</div>
            </div>
        </a>
        <nav class="nav" id="mainNav">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
            <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a>
            <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
            <a class="nav-cta" href="{{ route('consult') }}">Book Consultation</a>
            <a class="nav-cta nav-cta-vastu" href="{{ url('/lp/vastu-consultant-delhi-ncr') }}">Vastu Delhi NCR</a>
        </nav>
        <button class="mob-tog" onclick="document.getElementById('mainNav').classList.toggle('open')"><span></span><span></span><span></span></button>
    </div>
</header>

<!-- TRUST BAR -->
<div class="trust-bar">
    <div class="ctn">
        <div class="trust-row">
            <div class="trust-badge"><div class="tb-icon">🏅</div><div><strong>ICAS Certified</strong><br>Vedic Astrologer</div></div>
            <div class="trust-badge"><div class="tb-icon">🌍</div><div><strong>{{ $settings->stat_countries ?? '100' }}+ Countries</strong><br>Worldwide</div></div>
            <div class="trust-badge"><div class="tb-icon">⭐</div><div><strong>{{ $settings->experience_years ?? '29' }}+ Years</strong><br>Experience</div></div>
            <div class="trust-badge"><div class="tb-icon">🔒</div><div><strong>100% Confidential</strong><br>Consultations</div></div>
        </div>
    </div>
</div>
