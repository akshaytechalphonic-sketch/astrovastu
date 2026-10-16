@extends('layouts.app')

@section('seo_tags')
    @if(isset($service->seo_tags) && !empty($service->seo_tags))
        {!! $service->seo_tags !!}
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif
@endsection

@push('styles')
    <style>
        /* ─── Service Detail page styles ─── */
        .svc-detail-hero { padding:clamp(40px,6vw,72px) 0; position:relative }
        .breadcrumb { font-size:13px; color:var(--w700); margin-bottom:14px; display:flex; align-items:center; gap:6px; flex-wrap:wrap }
        .breadcrumb a { color:var(--w700); transition:color .2s; text-decoration:none }
        .breadcrumb a:hover { color:var(--saffron-deep) }
        .breadcrumb .bc-sep { color:var(--w400) }
        .breadcrumb .bc-current { color:var(--temple); font-weight:500 }
        .svc-detail-hero-content { text-align:center; max-width:780px; margin:0 auto }
        .sdh-icon { font-size:64px; margin-bottom:14px; line-height:1 }
        .svc-detail-hero h1 { font-family:var(--fd); font-size:clamp(28px,4vw,44px); color:var(--temple); margin:8px 0 4px; font-weight:600 }
        .sdh-hindi { font-family:var(--fd); font-size:20px; color:var(--w700); margin-bottom:14px; font-style:italic }
        .sdh-short { font-size:16px; color:var(--w700); margin:0 auto 22px; max-width:640px; line-height:1.6 }
        .sdh-actions { display:flex; gap:10px; justify-content:center; flex-wrap:wrap }

        .svc-detail-sec { padding:clamp(40px,6vw,72px) 0; background:var(--cream) }
        .svc-detail-grid { display:grid; grid-template-columns:1fr 320px; gap:40px }
        .svc-detail-main { background:var(--white); border:1px solid var(--w200); border-radius:var(--rad); padding:clamp(24px,4vw,40px) }
        .svc-detail-main .sdc-full { font-size:15px; line-height:1.75; color:var(--w800); border-top:none; margin-top:0; padding-top:0 }
        .svc-detail-main .sdc-full h4 { font-family:var(--fd); font-size:22px; font-weight:600; color:var(--temple); margin:24px 0 10px }
        .svc-detail-main .sdc-full h4:first-child { margin-top:0 }
        .svc-detail-main .sdc-full p { margin-bottom:12px }
        .svc-detail-main .sdc-full ol, .svc-detail-main .sdc-full ul { margin:10px 0 16px 26px }
        .svc-detail-main .sdc-full ol li, .svc-detail-main .sdc-full ul li { margin-bottom:8px; line-height:1.7 }
        .svc-detail-main .sdc-full ol li::marker { color:var(--saffron); font-weight:600 }
        .svc-detail-main .sdc-full ul li::marker { color:var(--saffron) }
        .svc-detail-main .sdc-full strong { color:var(--w900); font-weight:600 }
        .svc-detail-main .sdc-full em { color:var(--w600) }

        .svc-detail-cta { margin-top:36px; padding:24px; background:linear-gradient(135deg,var(--saffron-mist),var(--gold-pale)); border-radius:var(--rad); display:flex; gap:20px; align-items:center; flex-wrap:wrap }
        .sdc-cta-text { flex:1; min-width:240px }
        .sdc-cta-text h3 { font-family:var(--fd); font-size:22px; font-weight:600; color:var(--temple); margin-bottom:6px }
        .sdc-cta-text p { font-size:14px; color:var(--w700); line-height:1.5 }
        .sdc-cta-btns { display:flex; gap:8px; flex-wrap:wrap }

        .svc-detail-side { display:flex; flex-direction:column; gap:18px }
        .sds-card { background:var(--white); border:1px solid var(--w200); border-radius:var(--rad); padding:22px }
        .sds-card h4 { font-family:var(--fd); font-size:18px; font-weight:600; color:var(--temple); margin-bottom:14px }
        .sds-contact { display:flex; flex-direction:column; gap:8px }
        .sds-row { display:flex; align-items:center; gap:10px; padding:9px 12px; border-radius:8px; transition:background .2s; font-size:13px; color:var(--w800); text-decoration:none }
        .sds-row:hover { background:var(--saffron-mist) }
        .sds-ico { font-size:18px }
        .sds-related { display:flex; flex-direction:column; gap:4px }
        .sds-related-item { display:flex; align-items:center; gap:10px; padding:8px 10px; border-radius:8px; transition:all .2s; text-decoration:none }
        .sds-related-item:hover { background:var(--w50); transform:translateX(2px) }
        .sds-related-icon { width:36px; height:36px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px; flex-shrink:0 }
        .sds-related-title { font-size:13px; color:var(--w800); line-height:1.3 }
        .sds-cta-card { background:linear-gradient(135deg,var(--saffron-mist),var(--gold-pale)); border-color:transparent }
        .sds-cta-card p { font-size:13px; color:var(--w700); line-height:1.5 }

        @media(max-width:900px) {
            .svc-detail-grid { grid-template-columns:1fr }
            .svc-detail-side { order:2 }
        }
    </style>
@endpush

@section('content')
    @php
        $pb = $pageBanners->get('services');
    @endphp
    @if($pb)
        <section class="pg-hero-banner svc-detail-hero" id="svcHero" style="background-image: url('{{ asset($pb->image_url) }}')">
    @else
        <section class="pg-hero svc-detail-hero" id="svcHero" style="background: linear-gradient(135deg, var(--{{ $service->color_class ?? 'saffron-mist' }}), var(--gold-pale))">
    @endif
        <div class="ctn">
            <nav class="breadcrumb" aria-label="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span class="bc-sep">›</span>
                @if($service->category)
                    <a href="{{ route('services.index', ['category' => $service->category->slug]) }}" id="breadcrumbCatLink">{{ $service->category->name }}</a>
                @else
                    <a href="{{ route('services.index') }}" id="breadcrumbCatLink">Services</a>
                @endif
                <span class="bc-sep">›</span>
                <span class="bc-current" id="breadcrumbCurrent">{{ $service->title }}</span>
            </nav>
            <div class="svc-detail-hero-content">
                <div class="sdh-icon" id="svcIcon">{{ $service->icon }}</div>
                <span class="over" id="svcCatName">{{ $service->category->name ?? 'Vedic Service' }}</span>
                <h1 id="svcTitle">{{ $service->title }}</h1>
                <p class="sdh-hindi" id="svcTitleHindi">{{ $service->title_hindi }}</p>
                <p class="sdh-short" id="svcShortDesc">{{ $service->short_description }}</p>
                <div class="sdh-actions">
                    <a class="btn btn-p" href="{{ route('consult') }}">📅 Book Consultation</a>
                    <a class="btn btn-wa" id="heroWaBtn" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" rel="noopener">💬 WhatsApp Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- DETAIL BODY -->
    <section class="svc-detail-sec">
        <div class="ctn svc-detail-grid">

            <!-- Main content -->
            <article class="svc-detail-main">
                <div class="sdc-full" id="svcFullContent">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->alt_image ?: $service->title }}" style="width:100%; height:auto; margin-bottom:20px; border-radius:12px; border:1px solid var(--w200)" loading="lazy">
                    @endif
                    {!! $service->full_description !!}
                </div>

                <!-- Inline CTA -->
                <div class="svc-detail-cta">
                    <div class="sdc-cta-text">
                        <h3>Need Personal Guidance?</h3>
                        <p>Book a one-on-one consultation with <span id="ctaGuruName">{{ $settings->guru_name }}</span> to discuss your concerns and receive personalized Vedic remedies.</p>
                    </div>
                    <div class="sdc-cta-btns">
                        <a class="btn btn-p" href="{{ route('consult') }}">Book Consultation →</a>
                        <a class="btn btn-wa" id="innerWaBtn" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" rel="noopener">💬 WhatsApp</a>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="svc-detail-side">
                <div class="sds-card">
                    <h4>Quick Contact</h4>
                    <div class="sds-contact">
                        <a class="sds-row" id="sidePhoneRow" href="tel:{{ $settings->phone_raw }}">
                            <span class="sds-ico">📞</span>
                            <span id="sidePhoneVal">{{ $settings->phone }}</span>
                        </a>
                        <a class="sds-row" id="sideWaRow" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" rel="noopener">
                            <span class="sds-ico">💬</span>
                            <span>Chat on WhatsApp</span>
                        </a>
                        <a class="sds-row" id="sideEmailRow" href="mailto:{{ $settings->email }}">
                            <span class="sds-ico">✉️</span>
                            <span id="sideEmailVal">{{ $settings->email }}</span>
                        </a>
                    </div>
                </div>

                @if($relatedServices->count() > 0)
                    <div class="sds-card" id="relatedCard">
                        <h4>Related Services</h4>
                        <div class="sds-related" id="relatedContainer">
                            @foreach($relatedServices as $rel)
                                <a class="sds-related-item" href="{{ route('services.show', ['slug' => $rel->slug]) }}">
                                    <div class="sds-related-icon" style="background:linear-gradient(135deg, var(--{{ $rel->color_class ?? 'saffron-mist' }}), var(--gold-pale))">
                                        {{ $rel->icon }}
                                    </div>
                                    <span class="sds-related-title">{{ $rel->title }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="sds-card sds-cta-card">
                    <h4>Reach <span id="sideGuruName">{{ $settings->guru_name }}</span></h4>
                    <p><span id="sideGuruExp">{{ $settings->experience_years }}+</span> years of Vedic mastery. Expert guidance for every aspect of life.</p>
                    <a class="btn btn-p" href="{{ route('consult') }}" style="width:100%;margin-top:8px;text-align:center">Book Now</a>
                </div>
            </aside>
        </div>
    </section>
@endsection
