@extends('layouts.app')

@section('content')
    @php
        $pb = $pageBanners->get('terms-and-conditions');
    @endphp
    @if($pb)
        <section class="pg-hero-banner" style="background-image: url('{{ asset($pb->image_url) }}')">
            <div class="ctn">
                <span class="over">{{ $pb->title }}</span>
                <h1>{{ $pb->heading ?: 'Terms & Conditions' }}</h1>
                <p>{{ $pb->description ?: 'Effective Date: July 27, 2026' }}</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over">Legal</span>
                <h1>Terms & Conditions</h1>
                <p>Effective Date: July 27, 2026</p>
            </div>
        </section>
    @endif

    <section style="padding: clamp(40px, 6vw, 80px) 0; background: var(--cream); line-height: 1.8;">
        <div class="ctn" style="max-width: 800px; margin: 0 auto; color: var(--w700); font-size: 15px;">
            <p>Welcome to <strong>{{ $settings->site_name }}</strong>. By accessing our website and utilizing our services, you agree to comply with and be bound by the following Terms and Conditions. Please review them carefully.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">1. Astrological Consultations Disclaimer</h3>
            <p>Astrology, Vastu, and Pooja services provided on this website are based on traditional Vedic systems. By booking a consultation, you understand that:</p>
            <ul style="padding-left: 20px; margin-bottom: 16px;">
                <li>Astrology is a guide and is subjective. Outcomes depend on multiple planetary and personal factors.</li>
                <li>Our predictions and guidance are not a substitute for professional legal, medical, financial, or psychological advice.</li>
                <li>We do not guarantee 100% accuracy of predictions, as interpretation can vary, and personal choices play a critical role in one's life.</li>
            </ul>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">2. User Conduct</h3>
            <p>You agree to provide true, accurate, and complete information (such as birth dates, time, and location) when requesting consultations. Providing false information may lead to inaccurate astrological readings for which we are not responsible.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">3. Booking and Payment</h3>
            <p>All consultation bookings and Pooja requests are subject to confirmation. Payments for premium services must be made in advance. Cancellation and refund policies for services will be detailed during your booking process.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">4. Intellectual Property</h3>
            <p>The text, images, logo, layout, and content of this website are the intellectual property of <strong>{{ $settings->site_name }}</strong>. You may not copy, reproduce, or redistribute any materials without explicit written permission.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">5. Limitation of Liability</h3>
            <p>Under no circumstances shall {{ $settings->site_name }} or Pt. Dhiraj Baluni be liable for any direct, indirect, incidental, or consequential damages resulting from the use or inability to use our website resources or consultation services.</p>

            <h3 style="color: var(--temple); margin-top: 30px; margin-bottom: 12px; font-family: var(--fd); font-size: 20px;">6. Governing Law</h3>
            <p>These terms shall be governed by and construed in accordance with the laws of India. Any legal disputes arising from the use of our services shall be subject to the exclusive jurisdiction of the courts of Noida/Delhi NCR.</p>
        </div>
    </section>
@endsection
