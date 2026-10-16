@extends('layouts.app')

@php
    $dynPage = \App\Models\Page::with('sections')->where('slug', 'contact')->first();
    $dynHero = $dynPage ? $dynPage->sections->where('type', 'hero')->first() : null;
@endphp

@section('seo_tags')
    @if($dynPage && !empty($dynPage->seo_tags))
        {!! $dynPage->seo_tags !!}
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif
@endsection

@push('styles')
    <style>
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin: 40px auto 0;
            align-items: stretch;
        }
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--w200);
            box-shadow: 0 4px 12px rgba(0,0,0,.03);
            height: 100%;
            min-height: 450px;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            min-height: 450px;
            border: 0;
            display: block;
        }
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            .map-container {
                min-height: 300px;
            }
            .map-container iframe {
                min-height: 300px;
            }
        }
    </style>
@endpush

@section('content')
    @php
        $pb = $pageBanners->get('contact');
    @endphp
    @if($dynHero)
        <!-- DYNAMIC HERO SECTION -->
        <section class="pg-hero-banner reveal vis" style="background-image: url('{{ asset($dynHero->image_url) }}'); min-height: 380px; display: flex; align-items: center; justify-content: center; position: relative;">
            <div class="ctn" style="width: 100%; display: flex; align-items: center; justify-content: center; text-align: center; z-index: 2;">
                <div style="max-width: 800px; margin: 0 auto; padding: 40px 0;">
                    @if($dynHero->subtitle)
                        <span class="over" style="color:var(--saffron-glow) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.5); display: block; margin-bottom: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">{{ $dynHero->subtitle }}</span>
                    @endif
                    <h1 style="color: #fff !important; text-shadow: 0 2px 8px rgba(0,0,0,0.8); font-size: clamp(30px, 4.5vw, 48px); margin-bottom: 12px; font-family: var(--fd); font-weight: 600;">{{ $dynHero->title }}</h1>
                    @if($dynHero->content)
                        <p style="color: rgba(255,255,255,0.95) !important; text-shadow: 0 1px 4px rgba(0,0,0,0.6); font-size: 15.5px; line-height: 1.7; max-width: 650px; margin: 0 auto;">{{ $dynHero->content }}</p>
                    @endif
                    @if($dynHero->button_text && $dynHero->button_link)
                        <a href="{{ $dynHero->button_link }}" class="btn btn-p" style="padding: 12px 36px; font-size: 15px; border-radius: 50px; margin-top: 18px; display: inline-block;">{{ $dynHero->button_text }}</a>
                    @endif
                </div>
            </div>
        </section>
    @elseif($pb)
        <section class="pg-hero-banner" style="background-image: url('{{ asset($pb->image_url) }}')">
            <div class="ctn">
                <span class="over">{{ $pb->title }}</span>
                <h1>{{ $pb->heading ?: 'Get In Touch' }}</h1>
                <p>{{ $pb->description ?: 'We\'d love to hear from you' }}</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over">Contact Us</span>
                <h1>Get In Touch</h1>
                <p>We'd love to hear from you</p>
            </div>
        </section>
    @endif

    <section class="contact-sec">
        <div class="ctn">
            <div class="contact-cards">
                <div class="cc">
                    <div class="cc-icon">📞</div>
                    <div class="cc-label">Phone</div>
                    <div class="cc-val" id="phoneVal">{{ $settings->phone }}</div>
                </div>
                <div class="cc">
                    <div class="cc-icon">📧</div>
                    <div class="cc-label">Email</div>
                    <div class="cc-val" id="emailVal">{{ $settings->email }}</div>
                </div>
                <div class="cc">
                    <div class="cc-icon">💬</div>
                    <div class="cc-label">WhatsApp</div>
                    <div class="cc-val" id="waVal">{{ $settings->phone }}</div>
                </div>
                <div class="cc">
                    <div class="cc-icon">📍</div>
                    <div class="cc-label">Address</div>
                    <div class="cc-val" style="font-size:12px" id="addressVal">{{ $settings->address }}</div>
                </div>
            </div>
            
            <div class="contact-grid">
                <!-- Left Side: Google Map -->
             <div class="map-container">
    <iframe
        src="https://www.google.com/maps?q=Astro%20Vastu%20Pooja%2C%20Shop%20No.%2021%2C%20Spectrum%20Mall%2C%20Sector%2075%2C%20Noida&output=embed"
        width="100%"
        height="450"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

                <!-- Right Side: Contact Form -->
                <div class="form-card" style="margin: 0;">
                    <div class="fc-title">Send Us a Message</div>
                    
                    <!-- Alert Message Container -->
                    <div id="alertBox" style="display:none; margin-bottom:16px; padding:12px 20px; text-align:center; font-size:14px; border-radius:8px"></div>

                    @if(session('success'))
                        <div style="margin-bottom:16px; padding:12px 20px; text-align:center; font-size:14px; border-radius:8px; background: #EDF8F5; border: 1px solid #1B6B5A; color: #1B6B5A;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-grp">
                                <label>Full Name <span style="color:red">*</span></label>
                                <input id="fullName" name="FullName" required placeholder="Your name" value="{{ old('FullName') }}">
                            </div>
                            <div class="form-grp">
                                <label>Phone <span style="color:red">*</span></label>
                                <input id="phone" name="Phone" required placeholder="+91 XXXXX XXXXX" value="{{ old('Phone') }}">
                            </div>
                        </div>
                        <div class="form-grp">
                            <label>Email</label>
                            <input id="email" name="Email" type="email" placeholder="your@email.com" value="{{ old('Email') }}">
                        </div>
                        <div class="form-grp">
                            <label>Subject</label>
                            <input id="subject" name="Subject" placeholder="How can we help?" value="{{ old('Subject') }}">
                        </div>
                        <div class="form-grp">
                            <label>Message</label>
                            <textarea id="concern" name="Concern" placeholder="Write your message...">{{ old('Concern') }}</textarea>
                        </div>
                        <button class="btn btn-p btn-full" type="submit">Send Message →</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("contactForm");
            const alertBox = document.getElementById("alertBox");

            form.addEventListener("submit", (e) => {
                e.preventDefault();
                
                const name = document.getElementById("fullName").value.trim();
                const phone = document.getElementById("phone").value.trim();

                if (!name || !phone) {
                    alertBox.style.background = "#FDF2F2";
                    alertBox.style.border = "1px solid #7A1F1F";
                    alertBox.style.color = "#7A1F1F";
                    alertBox.textContent = "Name and Phone are required.";
                    alertBox.style.display = "block";
                    return;
                }

                // Ajax Submit
                const formData = new FormData(form);
                
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alertBox.style.background = "#EDF8F5";
                        alertBox.style.border = "1px solid #1B6B5A";
                        alertBox.style.color = "#1B6B5A";
                        alertBox.textContent = data.message;
                        alertBox.style.display = "block";
                        form.reset();
                    } else {
                        alertBox.style.background = "#FDF2F2";
                        alertBox.style.border = "1px solid #7A1F1F";
                        alertBox.style.color = "#7A1F1F";
                        alertBox.textContent = "Something went wrong. Please try again.";
                        alertBox.style.display = "block";
                    }
                    window.scrollTo({
                        top: alertBox.getBoundingClientRect().top + window.scrollY - 100,
                        behavior: 'smooth'
                    });
                })
                .catch(err => {
                    console.error("Submit error: ", err);
                    alertBox.style.background = "#FDF2F2";
                    alertBox.style.border = "1px solid #7A1F1F";
                    alertBox.style.color = "#7A1F1F";
                    alertBox.textContent = "Server connection error. Please try again.";
                    alertBox.style.display = "block";
                });
            });
        });
    </script>
@endpush
