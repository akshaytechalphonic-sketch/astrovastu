@extends('layouts.app')

@section('content')
    <!-- BANNERS -->
    <section class="banner-slider">
        <div id="bannerTrack" class="banner-track">
            @foreach($banners as $index => $b)
                @if($b->heading || $b->description)
                    <div class="banner-slide banner-has-img">
                        <img class="banner-bg-img" src="{{ asset($b->image_url) }}" alt="{{ $b->alt_image ?: $b->title }}" loading="{{ $index === 0 ? 'eager' : 'lazy' }}" />
                        <div class="ctn" style="width: 100%; display: flex; align-items: center; justify-content: flex-start;">
                            <div class="banner-content-overlay" style="text-align: left; padding: 20px;">
                                <h2>{{ $b->heading }}</h2>
                                @if($b->description)
                                    <p style="margin-top: 10px; font-size: 14px; line-height: 1.6;">{{ $b->description }}</p>
                                @endif
                                @if($b->link_url)
                                    <div class="banner-cta-row" style="margin-top:20px">
                                        <a class="btn btn-p" href="{{ $b->link_url }}">Explore Now →</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="banner-slide banner-img-only">
                        <a href="{{ $b->link_url ? $b->link_url : route('services.index') }}" class="banner-img-link">
                            <img class="banner-full-img" src="{{ asset($b->image_url) }}" alt="{{ $b->alt_image ?: $b->title }}" loading="{{ $index === 0 ? 'eager' : 'lazy' }}" />
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <div id="bannerDots" class="banner-dots"></div>
    </section>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-bg-mandala">
            <svg viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="90" fill="none" stroke="currentColor" stroke-width=".4"/>
                <circle cx="100" cy="100" r="70" fill="none" stroke="currentColor" stroke-width=".4"/>
                <circle cx="100" cy="100" r="50" fill="none" stroke="currentColor" stroke-width=".4"/>
                <circle cx="100" cy="100" r="30" fill="none" stroke="currentColor" stroke-width=".4"/>
                <line x1="100" y1="10" x2="100" y2="190" stroke="currentColor" stroke-width=".3"/>
                <line x1="10" y1="100" x2="190" y2="100" stroke="currentColor" stroke-width=".3"/>
            </svg>
        </div>
        <div class="ctn">
            <div class="hero-left">
                <div class="hero-badge" id="heroBadge">{{ $settings->hero_badge }}</div>
                <h1 id="heroTitle">{{ $settings->hero_title }}</h1>
                <div class="hero-quote">"<span id="heroQuote">{{ $settings->hero_quote }}</span>"</div>
                <p class="hero-desc" id="heroDesc">{{ $settings->hero_description }}</p>
                <div class="hero-actions">
                    <a class="btn btn-p" href="{{ route('consult') }}">Book Consultation →</a>
                    <a class="btn btn-wa" id="heroWaLink" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank">💬 WhatsApp Now</a>
                    <a class="btn btn-o" href="{{ route('services.index') }}">Explore Services</a>
                </div>
                <div class="hero-trust">
                    <div class="hero-trust-item" id="heroTrust1">{{ $settings->hero_trust_1 }}</div>
                    <div class="hero-trust-item" id="heroTrust2">{{ $settings->hero_trust_2 }}</div>
                    <div class="hero-trust-item" id="heroTrust3">{{ $settings->hero_trust_3 }}</div>
                </div>
            </div>
            <div class="hero-right">
                <div class="hero-card hero-card-main">
                    <div class="hc-img" style="background:linear-gradient(135deg,var(--saffron-mist),var(--teal-mist))">
                        🙏<div class="conf-badge">100% Confidential</div>
                    </div>
                    <div class="hc-body">
                        <h3>Vedic Consultation</h3>
                        <p>Astrology · Vastu · Pooja · Gems · Numerology</p>
                        <div class="hc-tags">
                            <span style="background:var(--saffron-mist);color:var(--saffron-deep)">Astrology</span>
                            <span style="background:var(--teal-mist);color:var(--teal)">Vastu</span>
                            <span style="background:var(--gold-pale);color:var(--gold)">Pooja</span>
                        </div>
                    </div>
                </div>
                <div class="hero-card hero-float">
                    <div class="hf-num" id="heroFloatExp">{{ $settings->experience_years }}+</div>
                    <div class="hf-lbl">Years of Vedic Expertise</div>
                </div>
                <div class="hero-card hero-float2">
                    <div class="stars">★★★★★</div>
                    <div class="stars-text">500+ Happy Reviews</div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="svc-sec">
        <div class="ctn">
            <div class="sh">
                <span class="over">Our Astrology Services</span>
                <h2>Comprehensive Vedic Solutions for All</h2>
                <p>Ancient wisdom applied to every aspect of modern life — for all religions</p>
                <div class="sh-orn"><span>◈</span></div>
            </div>
            <div class="svc-grid" id="svcGrid">
                @foreach($serviceCategories as $cat)
                    <a class="svc-card" href="{{ route('services.index', ['category' => $cat->slug]) }}">
                        <div class="sc-img" style="background:linear-gradient(135deg,var(--{{ $cat->color_class ?? 'saffron-mist' }}),var(--gold-pale)); overflow:hidden; display:flex; align-items:center; justify-content:center;">
                            @if($cat->image)
                                <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->alt_image ?: $cat->name }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                {{ $cat->icon ?? '🔮' }}
                            @endif
                        </div>
                        <div class="sc-body">
                            <h3>{{ $cat->name }}</h3>
                            <p>{{ $cat->name_hindi }} — {{ $cat->services->where('is_active', true)->count() }} services available</p>
                            <div class="sc-link">Explore →</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROBLEM SOLUTIONS (HOME TILES) -->
    <section class="problems">
        <div class="ctn">
            <div class="sh">
                <span class="over">Get Your Life Sorted</span>
                <h2>One Call & Get a Better Life</h2>
                <p>Solutions for every problem under one roof</p>
                <div class="sh-orn"><span>◈</span></div>
            </div>
            <div class="prob-grid" id="probGrid">
                @forelse($featuredServices as $s)
                    <a class="prob-card" href="{{ route('services.show', ['slug' => $s->slug]) }}">
                        <div class="pc-icon">{{ $s->icon }}</div>
                        <h4>{{ $s->title }}</h4>
                        <p>{{ $s->short_description }}</p>
                    </a>
                @empty
                    <a class="prob-card" href="{{ route('services.index', ['category' => 'astrology']) }}">
                        <div class="pc-icon">💑</div>
                        <h4>Relationship Problems</h4>
                        <p>Marriage disputes, love & harmony</p>
                    </a>
                    <a class="prob-card" href="{{ route('services.index', ['category' => 'astrology']) }}">
                        <div class="pc-icon">💼</div>
                        <h4>Business & Job</h4>
                        <p>Financial growth & career success</p>
                    </a>
                    <a class="prob-card" href="{{ route('services.index', ['category' => 'astrology']) }}">
                        <div class="pc-icon">🎓</div>
                        <h4>Education & Career</h4>
                        <p>Academic success & right path</p>
                    </a>
                    <a class="prob-card" href="{{ route('services.index', ['category' => 'astrology']) }}">
                        <div class="pc-icon">🏥</div>
                        <h4>Health Problems</h4>
                        <p>Health predictions & remedies</p>
                    </a>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ABOUT GURUJI -->
    <section class="reshape">
        <div class="ctn">
            <div class="reshape-img">
                <div class="ri-main">
                    @if(isset($settings->guru_image) && !empty($settings->guru_image))
                        <img src="{{ asset('storage/' . $settings->guru_image) }}" alt="{{ $settings->guru_name }}" style="width:100%; height:100%; object-fit:cover; border-radius:var(--rad);">
                    @else
                        🙏
                    @endif
                </div>
                <div class="ri-badge">
                    <div class="rb-num" id="aboutExp">{{ $settings->experience_years }}+</div>
                    <div class="rb-lbl">Years Exp.</div>
                </div>
            </div>
            <div class="reshape-text">
                <span class="over">About the Guruji</span>
                <h2>Reshape Your Life Through Astrology with <span id="aboutGuruName">{{ $settings->guru_name }}</span></h2>
                <p id="aboutShort">{{ $settings->about_short }}</p>
                <div class="reshape-features">
                    <div class="reshape-feat"><div class="rf-icon">✓</div><span>Expert in Vedic Astrology — Profession, Finance, Marriage, Education, Property & Vastu</span></div>
                    <div class="reshape-feat"><div class="rf-icon">✓</div><span>Extensive research on Manglik Dosh across Lagna, 4th, 7th, 8th & 12th houses</span></div>
                    <div class="reshape-feat"><div class="rf-icon">✓</div><span>Mastered remedial Astrology with great experience in Stone Therapy</span></div>
                    <div class="reshape-feat"><div class="rf-icon">✓</div><span>Full team for all Karmkand — Navgrah Shanti, Kaalsarp Dosh, Mangal Dosh poojas</span></div>
                </div>
                <div style="display:flex;gap:10px;flex-wrap:wrap">
                    <a class="btn btn-p" href="{{ route('about') }}">Read Full Story →</a>
                    <a class="btn btn-wa" id="aboutWaLink" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank">💬 Chat on WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="stats">
        <div class="ctn">
            <div class="stats-grid">
                <div><div class="stat-num" id="statYears">{{ $settings->experience_years }}+</div><div class="stat-lbl">Years Experience</div></div>
                <div><div class="stat-num" id="statGems">{{ $settings->stat_gems }}+</div><div class="stat-lbl">Gem Expertise</div></div>
                <div><div class="stat-num" id="statPoojas">
                    @php
                        $poojaCount = (int)$settings->stat_poojas;
                        $poojaDisplay = ($poojaCount >= 1000) ? ($poojaCount / 1000) . "K" : $settings->stat_poojas;
                    @endphp
                    {{ $poojaDisplay }}+
                </div><div class="stat-lbl">Poojas Performed</div></div>
                <div><div class="stat-num" id="statCountries">{{ $settings->stat_countries }}+</div><div class="stat-lbl">Countries Served</div></div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testi">
        <div class="ctn">
            <div class="sh">
                <span class="over">Client Words</span>
                <h2>What Our Clients Say</h2>
                <div class="sh-orn"><span>◈</span></div>
            </div>
            <div class="testi-grid" id="testiGrid">
                @foreach($testimonials as $t)
                    <div class="testi-card">
                        <div class="testi-stars">{{ str_repeat('★', $t->rating) }}</div>
                        <div class="testi-quote">"{{ $t->quote }}"</div>
                        <div class="testi-author">
                            <div class="testi-av" style="background:linear-gradient(135deg,var(--{{ $t->avatar_color }}),var(--saffron-deep)); overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                @if($t->image)
                                    <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->alt_image ?: $t->client_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    {{ $t->initials }}
                                @endif
                            </div>
                            <div>
                                <div class="testi-name">{{ $t->client_name }}</div>
                                <div class="testi-loc">{{ $t->location }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- BLOG SECTION -->
   

    <!-- CTA BAND -->
    <section class="cta-band">
        <div class="ctn">
            <h2 id="ctaTitle">{{ $settings->cta_title }}</h2>
            <p id="ctaSubtitle">{{ $settings->cta_subtitle }}</p>
            <div class="btn-row">
                <a class="btn btn-p" id="ctaCallBtn" href="tel:{{ $settings->phone_raw }}">📞 Call Now — {{ $settings->phone }}</a>
                <a class="btn btn-wa" id="ctaWaBtn" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank">💬 Chat on WhatsApp</a>
            </div>
        </div>
    </section>

     @if(isset($recentBlogs) && $recentBlogs->isNotEmpty())
    <section class="blog-sec" style="background: var(--white);">
        <div class="ctn">
            <div class="sh">
                <span class="over">Insights & News</span>
                <h2>Latest from Our Blog</h2>
                <p>Read our recent articles, tips, and spiritual insights to guide your life's path</p>
                <div class="sh-orn"><span>◈</span></div>
            </div>
            <div class="blog-grid" id="blogGrid">
                @foreach($recentBlogs as $p)
                    <a class="blog-card" href="{{ route('blog.show', ['slug' => $p->slug]) }}">
                        @if($p->image)
                            <div class="blog-thumb blog-thumb-img">
                                <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->alt_image ?: $p->title }}" loading="lazy">
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
                @endforeach
            </div>
            <div style="margin-top:40px; display:flex; justify-content:center;">
                <a class="btn btn-p" href="{{ route('blog.index') }}">View All Posts →</a>
            </div>
        </div>
    </section>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const bannerTrack = document.getElementById("bannerTrack");
            const bannerDots = document.getElementById("bannerDots");
            let bannerIdx = 0;
            const bannerCount = {{ $banners->count() }};

            if (bannerCount > 1) {
                // Generate dots
                for (let i = 0; i < bannerCount; i++) {
                    const dot = document.createElement("span");
                    dot.className = `banner-dot ${i === 0 ? 'active' : ''}`;
                    dot.onclick = () => jumpToBanner(i);
                    bannerDots.appendChild(dot);
                }

                // Clone first slide and append to the end for seamless looping
                const firstClone = bannerTrack.children[0].cloneNode(true);
                bannerTrack.appendChild(firstClone);

                function updateDots() {
                    const activeDotIdx = bannerIdx % bannerCount;
                    document.querySelectorAll('.banner-dot').forEach((dot, i) => {
                        dot.classList.toggle('active', i === activeDotIdx);
                    });
                }

                function nextBanner() {
                    bannerIdx++;
                    bannerTrack.style.transition = 'transform 0.6s ease';
                    bannerTrack.style.transform = 'translateX(calc(-' + bannerIdx + ' * 100%))';
                    updateDots();

                    if (bannerIdx === bannerCount) {
                        setTimeout(() => {
                            bannerTrack.style.transition = 'none';
                            bannerIdx = 0;
                            bannerTrack.style.transform = 'translateX(0)';
                            bannerTrack.offsetHeight; // Force reflow
                            updateDots();
                        }, 600);
                    }
                }

                // Auto slide disabled / manual control
                setInterval(nextBanner, 5000);
            }
        });
    </script>
@endpush
