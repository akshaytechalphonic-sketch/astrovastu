@extends('layouts.app')

@php
    $dynPage = \App\Models\Page::with('sections')->where('slug', 'blog')->first();
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
        .blog-thumb-img {
            padding: 0;
            overflow: hidden
        }

        .blog-thumb-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s
        }

        .blog-card:hover .blog-thumb-img img {
            transform: scale(1.05)
        }
    </style>
@endpush

@section('content')
    @php
        $pb = $pageBanners->get('blog');
    @endphp
    @if($dynHero)
        <!-- DYNAMIC HERO SECTION -->
        <section class="pg-hero-banner reveal vis"
            style="background-image: url('{{ asset($dynHero->image_url) }}'); min-height: 380px; display: flex; align-items: center; justify-content: center; position: relative;">
            <div class="ctn"
                style="width: 100%; display: flex; align-items: center; justify-content: center; text-align: center; z-index: 2;">
                <div style="max-width: 800px; margin: 0 auto; padding: 40px 0;">
                    @if($dynHero->subtitle)
                        <span class="over"
                            style="color:var(--saffron-glow) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.5); display: block; margin-bottom: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">{{ $dynHero->subtitle }}</span>
                    @endif
                    <h1
                        style="color: #fff !important; text-shadow: 0 2px 8px rgba(0,0,0,0.8); font-size: clamp(30px, 4.5vw, 48px); margin-bottom: 12px; font-family: var(--fd); font-weight: 600;">
                        {{ $dynHero->title }}</h1>
                    @if($dynHero->content)
                        <p
                            style="color: rgba(255,255,255,0.95) !important; text-shadow: 0 1px 4px rgba(0,0,0,0.6); font-size: 15.5px; line-height: 1.7; max-width: 650px; margin: 0 auto;">
                            {{ $dynHero->content }}</p>
                    @endif
                    @if($dynHero->button_text && $dynHero->button_link)
                        <a href="{{ $dynHero->button_link }}" class="btn btn-p"
                            style="padding: 12px 36px; font-size: 15px; border-radius: 50px; margin-top: 18px; display: inline-block;">{{ $dynHero->button_text }}</a>
                    @endif
                </div>
            </div>
        </section>
    @elseif($pb)
        <section class="pg-hero-banner" style="background-image: url('{{ asset($pb->image_url) }}')">
            <div class="ctn">
                <span class="over">{{ $pb->title }}</span>
                <h1>{{ $pb->heading ?: 'Vedic Knowledge Hub' }}</h1>
                <p>{{ $pb->description ?: 'Articles, tips and spiritual insights' }}</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over">Blog & Insights</span>
                <h1>Vedic Knowledge Hub</h1>
                <p>Articles, tips and spiritual insights</p>
            </div>
        </section>
    @endif

    <section class="blog-sec">
        <div class="ctn">
            <div class="blog-grid" id="blogGrid">
                @forelse($posts as $p)
                    <a class="blog-card" href="{{ route('blog.show', ['slug' => $p->slug]) }}">
                        @if($p->image)
                            <div class="blog-thumb blog-thumb-img">
                                <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->alt_image ?: $p->title }}"
                                    loading="lazy">
                            </div>
                        @else
                            @php
                                $grads = explode(',', $p->thumb_gradient ?? 'saffron-mist,gold-pale');
                                $g1 = trim($grads[0] ?? 'saffron-mist');
                                $g2 = trim($grads[1] ?? 'gold-pale');
                            @endphp
                            <div class="blog-thumb" style="background:linear-gradient(135deg, var(--{{ $g1 }}), var(--{{ $g2 }}))">
                                {{ $p->thumb_icon ?? '🔮' }}
                            </div>
                        @endif
                        <div class="blog-body">
                            <div class="blog-meta">
                                <span>{{ $p->published_at ? $p->published_at->format('M Y') : 'Jan 2025' }}</span>
                                <span>{{ $p->category }}</span>
                                <span>{{ $p->view_count }} views</span>
                            </div>
                            <h3>{{ $p->title }}</h3>
                            <p>{{ $p->excerpt }}</p>
                            <div class="blog-rm">Read More →</div>
                        </div>
                    </a>
                @empty
                    <div id="noBlogsMessage" style="text-align:center; padding:40px 0; color:var(--w400); width:100%">
                        <div style="font-size:48px; margin-bottom:12px">📝</div>
                        <p>No blog posts published yet. Check back soon!</p>
                    </div>
                @endforelse
            </div>

            @if($posts->hasPages())
                <div style="margin-top:40px; display:flex; justify-content:center;">
                    {{ $posts->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
@endsection