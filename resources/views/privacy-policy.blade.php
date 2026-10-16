@extends('layouts.app')

@section('content')
    @php
        $pb = $pageBanners->get('privacy-policy');
    @endphp
    @if($pb)
        <section class="pg-hero-banner" style="background-image: url('{{ asset($pb->image_url) }}')">
            <div class="ctn">
                <span class="over">{{ $pb->title }}</span>
                <h1>{{ $pb->heading ?: 'Privacy Policy' }}</h1>
                <p>{{ $pb->description ?: 'Effective Date: July 27, 2026' }}</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over">Legal</span>
                <h1>Privacy Policy</h1>
                <p>Effective Date: July 27, 2026</p>
            </div>
        </section>
    @endif

    <section style="padding: clamp(40px, 6vw, 80px) 0; background: var(--cream); line-height: 1.8;">
        <div class="ctn" style="max-width: 800px; margin: 0 auto; color: var(--w700); font-size: 15px;">
            <p>Welcome to <strong>{{ $settings->site_name }}</strong>. We respect your privacy and are committed to protecting any personal data we collect from you. This Privacy Policy explains how we collect, use, and protect your information when you visit our website or use our services.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">1. Information We Collect</h3>
            <p>We may collect personal information that you voluntarily provide to us when you fill out consultation forms, contact forms, or send inquiries. This information may include:</p>
            <ul style="padding-left: 20px; margin-bottom: 16px;">
                <li>Name, Email Address, and Phone Number</li>
                <li>Birth Details (Date of Birth, Time of Birth, Place of Birth, Gender) for astrological calculation purposes</li>
                <li>Any personal concerns or queries you choose to share with us</li>
            </ul>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">2. How We Use Your Information</h3>
            <p>We use the collected information for the following purposes:</p>
            <ul style="padding-left: 20px; margin-bottom: 16px;">
                <li>To analyze horoscopes and provide accurate consultation answers</li>
                <li>To respond to your messages, questions, and scheduling requests</li>
                <li>To maintain business records and improve our customer support</li>
                <li>To send periodic service updates (only if you have opted in)</li>
            </ul>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">3. Confidentiality and Security</h3>
            <p>Your birth details and personal inquiries are handled with <strong>100% confidentiality</strong>. We implement appropriate technical security measures to protect your data. We do not sell, rent, or trade your personal details with third-party marketing companies.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">4. Cookies</h3>
            <p>We may use cookies on our website to enhance user experience, remember user preferences, and analyze website traffic. You can adjust your browser settings to refuse cookies, though some website features may not function optimally as a result.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">5. Contact Us</h3>
            <p>If you have any questions or concerns regarding this Privacy Policy, please contact us at:</p>
            <p style="background: rgba(0,0,0,0.03); padding: 16px; border-radius: 8px; border-left: 4px solid var(--saffron);">
                <strong>Email:</strong> {{ $settings->email }}<br>
                <strong>Phone:</strong> {{ $settings->phone }}<br>
                <strong>Address:</strong> {{ $settings->address }}
            </p>
        </div>
    </section>
@endsection
