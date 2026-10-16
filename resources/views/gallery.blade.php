@extends('layouts.app')

@php
    $dynPage = \App\Models\Page::with('sections')->where('slug', 'gallery')->first();
    $dynHero = $dynPage ? $dynPage->sections->where('type', 'hero')->first() : null;
@endphp

@section('seo_tags')
    @if($dynPage && !empty($dynPage->seo_tags))
        {!! $dynPage->seo_tags !!}
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif
@endsection

@section('content')
    @php
        $pb = $pageBanners->get('gallery');
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
                <h1>{{ $pb->heading ?: 'Sacred Moments' }}</h1>
                <p>{{ $pb->description ?: 'Glimpses from our pooja ceremonies and consultations' }}</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over">Gallery</span>
                <h1>Sacred Moments</h1>
                <p>Glimpses from our pooja ceremonies and consultations</p>
            </div>
        </section>
    @endif

    <section class="gallery-sec">
        <div class="ctn">
            <div class="gallery-grid" id="galleryGrid">
                @foreach($galleryItems as $g)
                    @php
                        $colors = explode(',', $g->gradient_colors ?? 'saffron-mist,teal-mist');
                        $c1 = trim($colors[0] ?? 'saffron-mist');
                        $c2 = trim($colors[1] ?? 'teal-mist');
                        $isSpan2 = $g->is_span2;
                    @endphp
                    <div class="gallery-item {{ $isSpan2 ? 'span2' : '' }}" data-label="{{ $g->title }}"
                         @if($isSpan2) style="grid-column: span 2; aspect-ratio: 2/1;" @endif>
                        
                        @if($g->image)
                            <div class="gi-inner" style="padding:0; overflow:hidden">
                                <img src="{{ asset('storage/' . $g->image) }}" alt="{{ $g->alt_image ?: $g->title }}" style="width:100%; height:100%; object-fit:cover;" loading="lazy">
                            </div>
                        @else
                            <div class="gi-inner" style="background:linear-gradient(135deg, var(--{{ $c1 }}), var(--{{ $c2 }}))">{{ $g->icon }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
