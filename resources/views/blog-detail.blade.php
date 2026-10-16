@extends('layouts.app')

@section('seo_tags')
    @if(isset($post->seo_tags) && !empty($post->seo_tags))
        {!! $post->seo_tags !!}
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif
@endsection

@push('styles')
    <style>
        .blog-content { 
            font-size: 16px; 
            line-height: 1.95; 
            color: var(--w800); 
            letter-spacing: 0.1px;
        }
        .blog-content p { 
            margin-bottom: 24px; 
        }
        .blog-content h2 { 
            font-family: var(--fd); 
            font-size: 26px; 
            font-weight: 600; 
            margin: 44px 0 16px; 
            color: var(--temple); 
            line-height: 1.35;
        }
        .blog-content h3 { 
            font-family: var(--fd); 
            font-size: 21px; 
            font-weight: 600; 
            margin: 36px 0 12px; 
            color: var(--w900); 
            line-height: 1.35;
        }
        .blog-content img { 
            max-width: 100%; 
            height: auto; 
            border-radius: 12px; 
            margin: 32px 0; 
            display: block;
            box-shadow: 0 15px 35px rgba(30,22,16,0.06);
            border: 1px solid var(--w200);
        }
        .blog-content hr { 
            border: none; 
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--w300), transparent);
            margin: 40px 0; 
            position: relative;
            text-align: center;
        }
        .blog-content hr::after {
            content: "◈";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: var(--cream);
            padding: 0 12px;
            color: var(--saffron);
            font-size: 12px;
        }
        .blog-content ul, .blog-content ol { 
            margin: 18px 0 24px 24px; 
        }
        .blog-content li { 
            margin-bottom: 10px; 
            color: var(--w700);
        }
        .blog-content blockquote { 
            position: relative;
            border-left: 4px solid var(--saffron); 
            padding: 24px 28px 24px 36px; 
            background: var(--saffron-mist); 
            border-radius: 0 12px 12px 0; 
            margin: 36px 0; 
            font-style: italic;
            font-size: 17px;
            color: var(--w900);
            line-height: 1.75;
        }
        .blog-content blockquote::before {
            content: "“";
            position: absolute;
            top: 10px;
            left: 14px;
            font-size: 54px;
            color: rgba(212, 135, 46, 0.12);
            font-family: Georgia, serif;
            line-height: 1;
        }
        .blog-content a { 
            color: var(--saffron-deep); 
            font-weight: 500;
            text-decoration: none; 
            border-bottom: 1.5px solid var(--saffron);
            transition: all 0.2s ease;
        }
        .blog-content a:hover {
            color: var(--saffron-glow);
            border-color: var(--saffron-glow);
        }
        .cta-box-premium {
            margin-top: 48px; 
            padding: 32px 28px; 
            background: linear-gradient(135deg, var(--saffron-mist) 0%, var(--gold-pale) 100%); 
            border: 1px solid rgba(212, 135, 46, 0.2);
            border-radius: 16px; 
            text-align: center;
            box-shadow: 0 10px 30px rgba(212, 135, 46, 0.05);
        }
        .blog-detail-container {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 48px;
            align-items: start;
        }
        @media(max-width: 991px) {
            .blog-detail-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }
        .blog-sidebar {
            display: flex;
            flex-direction: column;
            gap: 32px;
            position: sticky;
            top: 90px;
        }
        .sidebar-card {
            background: var(--white);
            border: 1px solid var(--w200);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(30,22,16,0.02);
        }
        .sidebar-card-title {
            font-family: var(--fd);
            font-size: 19px;
            font-weight: 600;
            color: var(--temple);
            margin-bottom: 18px;
            border-bottom: 2px solid var(--saffron-mist);
            padding-bottom: 8px;
        }
    </style>
@endpush

@section('content')
    @php
        $pb = $pageBanners->get('blog');
    @endphp
    @if($pb)
        <section class="pg-hero-banner" style="background-image: url('{{ asset($pb->image_url) }}')">
            <div class="ctn">
                <span class="over" id="blogCategory">{{ $post->category }}</span>
                <h1 id="blogTitle">{{ $post->title }}</h1>
                <p id="blogMeta">Published {{ $post->published_at ? $post->published_at->format('M Y') : 'Jan 2025' }} · {{ $post->view_count }} views</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over" id="blogCategory">{{ $post->category }}</span>
                <h1 id="blogTitle">{{ $post->title }}</h1>
                <p id="blogMeta">Published {{ $post->published_at ? $post->published_at->format('M Y') : 'Jan 2025' }} · {{ $post->view_count }} views</p>
            </div>
        </section>
    @endif

    <section style="padding:clamp(40px,6vw,80px) 0">
        <div class="ctn">
            <div class="blog-detail-container">
                
                <!-- Main Content Column -->
                <div style="width: 100%; overflow: hidden;">
                    @if($post->image)
                        <div id="blogImageContainer" style="margin-bottom:36px; border-radius:16px; overflow:hidden; border:1px solid var(--w200); box-shadow:0 15px 35px rgba(30,22,16,0.08);">
                            <img id="blogImage" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->alt_image ?: $post->title }}" style="width:100%; height:auto; display:block">
                        </div>
                    @endif

                    <article class="blog-content" id="blogBody">
                        {!! $post->content !!}
                    </article>

                    <!-- Share & CTA -->
                    <div class="cta-box-premium">
                        <p style="font-size:16px; font-weight:600; color:var(--temple); margin-bottom:16px">Seeking clarity or guidance for your life? Book a consultation with <span id="ctaGuruName">{{ $settings->guru_name }}</span></p>
                        <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap">
                            <a href="{{ route('consult') }}" class="btn btn-p" style="padding:12px 28px;">Book Consultation →</a>
                            <a id="ctaWaBtn" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" class="btn btn-wa" style="padding:12px 28px;">💬 WhatsApp Now</a>
                        </div>
                    </div>

                    <div style="margin-top:32px; padding-top:20px; border-top:1px solid var(--w200); display:flex; justify-content:space-between; align-items:center">
                        <a href="{{ route('blog.index') }}" class="btn btn-o">← Back to Blog</a>
                        <div id="blogViewsBottom" style="font-size:12px; color:var(--w400)">{{ $post->view_count }} views</div>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <aside class="blog-sidebar">
                    <!-- Author Card -->
                    <div class="sidebar-card">
                        <h3 class="sidebar-card-title">Consult the Expert</h3>
                        <div style="text-align: center; margin-bottom: 16px;">
                            @if(isset($settings->guru_image) && !empty($settings->guru_image))
                                <img src="{{ asset('storage/' . $settings->guru_image) }}" alt="{{ $settings->guru_name }}" style="width: 100px; height: 120px; object-fit: cover; border-radius: 12px; margin: 0 auto 12px; display: block; border: 1px solid var(--w200);">
                            @endif
                            <h4 style="font-size: 15px; font-weight: 600; color: var(--temple); margin-bottom: 4px;">{{ $settings->guru_name }}</h4>
                            <p style="font-size: 12px; color: var(--saffron-deep); font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">Best Vedic Astrologer</p>
                        </div>
                        <p style="font-size: 13px; color: var(--w600); line-height: 1.6; text-align: center; margin-bottom: 16px;">
                            Pt. Dhiraj Baluni brings {{ $settings->experience_years }}+ years of experience to solve your career, finance, marriage, and Vastu problems.
                        </p>
                        <a href="{{ route('consult') }}" class="btn btn-p" style="display: flex; justify-content: center; font-size: 13px; padding: 10px 0; width: 100%;">Book Consultation</a>
                    </div>

                    <!-- Recent Posts Card -->
                    @if(isset($recentPosts) && $recentPosts->count() > 0)
                        <div class="sidebar-card">
                            <h3 class="sidebar-card-title">Recent Insights</h3>
                            <div style="display: flex; flex-direction: column; gap: 16px;">
                                @foreach($recentPosts as $rp)
                                    <a href="{{ route('blog.show', ['slug' => $rp->slug]) }}" style="display: flex; gap: 12px; align-items: start; text-decoration: none;">
                                        @if($rp->image)
                                            <img src="{{ asset('storage/' . $rp->image) }}" alt="{{ $rp->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; flex-shrink: 0; border: 1px solid var(--w200);">
                                        @endif
                                        <div>
                                            <h4 style="font-size: 13.5px; font-weight: 600; color: var(--w900); line-height: 1.4; transition: color 0.2s;">{{ $rp->title }}</h4>
                                            <span style="font-size: 11px; color: var(--w400); margin-top: 4px; display: block;">{{ $rp->published_at ? $rp->published_at->format('d M Y') : 'Jan 2025' }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Quick Contact Card -->
                    <div class="sidebar-card" style="background: linear-gradient(135deg, var(--temple-dark), var(--temple)); border: none; color: #fff;">
                        <h3 class="sidebar-card-title" style="color: #fff; border-bottom: 1px solid rgba(255,255,255,0.1);">Quick Help</h3>
                        <p style="font-size: 13px; color: var(--w200); line-height: 1.6; margin-bottom: 18px;">
                            Have questions regarding stones, charts, or pujas? Get answers instantly on WhatsApp.
                        </p>
                        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" class="btn btn-wa" style="display: flex; justify-content: center; font-size: 13px; padding: 10px 0; width: 100%;">
                            💬 Message Guruji
                        </a>
                    </div>
                </aside>

            </div>
        </div>
    </section>
@endsection
