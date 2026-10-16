@extends('layouts.app')

@section('seo_tags')
    @if(isset($page->seo_tags) && !empty($page->seo_tags))
        {!! $page->seo_tags !!}
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif
@endsection

@section('content')

    <!-- Dynamic Sections Loop -->
    @foreach($page->sections as $s)
        
        @if($s->type === 'hero')
            <!-- HERO BANNER -->
            <section class="pg-hero-banner reveal vis" style="background-image: url('{{ asset($s->image_url) }}'); min-height: 480px; display: flex; align-items: center; justify-content: center; position: relative;">
                <div class="ctn" style="width: 100%; display: flex; align-items: center; justify-content: center; text-align: center; z-index: 2;">
                    <div style="max-width: 800px; margin: 0 auto; padding: 40px 0;">
                        @if($s->subtitle)
                            <span class="over" style="color:var(--saffron-glow); text-shadow: 0 1px 3px rgba(0,0,0,0.6); display: block; margin-bottom: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">{{ $s->subtitle }}</span>
                        @endif
                        <h1 style="color: #fff !important; text-shadow: 0 2px 8px rgba(0,0,0,0.8); font-size: clamp(32px, 5vw, 54px); margin-bottom: 20px; font-family: var(--fd); font-weight: 600; line-height: 1.2;">{{ $s->title }}</h1>
                        @if($s->content)
                            <p style="color: rgba(255,255,255,0.95) !important; text-shadow: 0 1px 4px rgba(0,0,0,0.6); font-size: 16px; line-height: 1.7; margin-bottom: 32px;">{{ $s->content }}</p>
                        @endif
                        @if($s->button_text && $s->button_link)
                            <a href="{{ $s->button_link }}" class="btn btn-p" style="padding: 12px 36px; font-size: 15px; border-radius: 50px;">{{ $s->button_text }}</a>
                        @endif
                    </div>
                </div>
            </section>

        @elseif($s->type === 'rich_text')
            <!-- VEDIC TEXT BLOCK -->
            <section style="padding: clamp(60px, 8vw, 100px) 0; background: var(--cream);">
                <div class="ctn" style="max-width: {{ ($s->image_position === 'left' || $s->image_position === 'right') && $s->image_url ? '1000px' : '800px' }};">
                    @if($s->title || $s->subtitle)
                        <div class="sh">
                            @if($s->subtitle)
                                <span class="over">{{ $s->subtitle }}</span>
                            @endif
                            @if($s->title)
                                <h2>{{ $s->title }}</h2>
                            @endif
                            <div class="sh-orn"><span>◈</span></div>
                        </div>
                    @endif

                    @if(($s->image_position === 'left' || $s->image_position === 'right') && $s->image_url)
                        <!-- Side-by-side Layout -->
                        <div class="rich-text-side-layout" style="display: flex; gap: clamp(32px, 5vw, 64px); align-items: center; flex-direction: {{ $s->image_position === 'right' ? 'row-reverse' : 'row' }}; justify-content: space-between; flex-wrap: wrap;">
                            <div style="flex: 1 1 400px; max-width: 100%;">
                                <div style="border-radius: 16px; overflow: hidden; border: 1px solid var(--w200); box-shadow: 0 15px 35px rgba(30,22,16,0.06);">
                                    <img src="{{ asset($s->image_url) }}" alt="{{ $s->title }}" style="width: 100%; height: auto; display: block;">
                                </div>
                            </div>
                            <div style="flex: 1 1 450px; max-width: 100%;">
                                <article class="blog-content" style="font-size: 16px; line-height: 1.95; color: var(--w800); text-align: left;">
                                    {!! $s->content !!}
                                </article>
                                @if($s->button_text && $s->button_link)
                                    <div style="margin-top: 28px; text-align: left;">
                                        <a href="{{ $s->button_link }}" class="btn btn-p" style="padding: 12px 36px; border-radius: 50px;">{{ $s->button_text }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <!-- Centered Layout -->
                        @if($s->image_url)
                            <div style="margin-bottom: 36px; border-radius: 16px; overflow: hidden; border: 1px solid var(--w200); box-shadow: 0 15px 35px rgba(30,22,16,0.06);">
                                <img src="{{ asset($s->image_url) }}" alt="{{ $s->title }}" style="width: 100%; height: auto; display: block;">
                            </div>
                        @endif
                        <article class="blog-content" style="font-size: 16px; line-height: 1.95; color: var(--w800);">
                            {!! $s->content !!}
                        </article>
                        @if($s->button_text && $s->button_link)
                            <div style="margin-top: 36px; text-align: center;">
                                <a href="{{ $s->button_link }}" class="btn btn-p" style="padding: 12px 36px; border-radius: 50px;">{{ $s->button_text }}</a>
                            </div>
                        @endif
                    @endif
                </div>
            </section>

        @elseif($s->type === 'features_three_col')
            <!-- THREE COLUMNS PILLARS -->
            <section style="padding: clamp(60px, 8vw, 100px) 0; background: var(--white); border-top: 1px solid var(--w200); border-bottom: 1px solid var(--w200);">
                <div class="ctn">
                    <div class="sh">
                        @if($s->subtitle)
                            <span class="over">{{ $s->subtitle }}</span>
                        @endif
                        @if($s->title)
                            <h2>{{ $s->title }}</h2>
                        @endif
                        <div class="sh-orn"><span>◈</span></div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-top: 40px;">
                        @php
                            // Split by double newlines to create dynamic column cards
                            $paragraphs = array_filter(array_map('trim', explode("\n\n", $s->content ?? '')));
                            if(empty($paragraphs)) {
                                $paragraphs = [
                                    "Vedic Purity — We perform calculations and poojas strictly according to authentic Parashara principles.",
                                    "Practical Remedies — Our Vastu and gem solutions avoid any structural demolitions.",
                                    "Absolute Confidentiality — All charts and healing services remain completely private."
                                ];
                            }
                        @endphp
                        @foreach($paragraphs as $idx => $para)
                            @php
                                $parts = explode('—', $para);
                                $colTitle = trim($parts[0] ?? 'Pillar');
                                $colDesc = trim($parts[1] ?? ($parts[0] ?? ''));
                                $icons = ['📜', '🛡️', '🤝', '🌟', '⚜️', '🗺️'];
                            @endphp
                            <div class="value-card" style="padding:32px 24px; border:1px solid var(--w200); border-radius:var(--rad); background:linear-gradient(135deg, var(--white) 0%, var(--w50) 100%); text-align:left; box-shadow: 0 4px 20px rgba(30,22,16,0.02); transition: all 0.3s;">
                                <div style="width:48px; height:48px; border-radius:50%; background:var(--saffron-mist); display:flex; align-items:center; justify-content:center; font-size:22px; color:var(--saffron-deep); margin-bottom:20px;">
                                    {{ $icons[$idx % count($icons)] }}
                                </div>
                                <h3 style="font-family:var(--fd); font-size:18px; font-weight:600; color:var(--temple); margin-bottom:10px;">{{ $colTitle }}</h3>
                                <p style="font-size:13.5px; color:var(--w600); line-height:1.6; margin:0;">{{ $colDesc }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        @elseif($s->type === 'services_grid')
            <!-- SERVICES GRID -->
            <section class="svc-sec" style="padding: clamp(60px, 8vw, 100px) 0;">
                <div class="ctn">
                    <div class="sh">
                        @if($s->subtitle)
                            <span class="over">{{ $s->subtitle }}</span>
                        @endif
                        <h2>{{ $s->title ?: 'Sacred Vedic Services' }}</h2>
                        <p>Explore our wide range of services designed to bring peace, prosperity, and clarity to your life.</p>
                        <div class="sh-orn"><span>◈</span></div>
                    </div>
                    <div class="svc-grid" style="margin-top: 40px;">
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

        @elseif($s->type === 'testimonials_slider')
            <!-- TESTIMONIALS -->
            <section class="testi" style="padding: clamp(60px, 8vw, 100px) 0;">
                <div class="ctn">
                    <div class="sh">
                        @if($s->subtitle)
                            <span class="over">{{ $s->subtitle }}</span>
                        @endif
                        <h2>{{ $s->title ?: 'What Our Clients Say' }}</h2>
                        <div class="sh-orn"><span>◈</span></div>
                    </div>
                    <div class="testi-grid" style="margin-top: 40px;">
                        @foreach($testimonials as $t)
                            <div class="testi-card">
                                <div class="testi-stars">{{ str_repeat('★', $t->rating) }}</div>
                                <div class="testi-quote">"{{ $t->quote }}"</div>
                                <div class="testi-author">
                                    <div class="testi-av" style="background:linear-gradient(135deg,var(--{{ $t->avatar_color ?? 'saffron' }}),var(--saffron-deep)); width:42px; height:42px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#fff; overflow:hidden;">
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

        @elseif($s->type === 'contact_form')
            <!-- BOOKING CONSULTATION FORM -->
            <section class="consult-sec" style="padding: clamp(60px, 8vw, 100px) 0; background: var(--cream);" id="contact_form">
                <div class="ctn">
                    <div class="sh">
                        @if($s->subtitle)
                            <span class="over">{{ $s->subtitle }}</span>
                        @endif
                        <h2>{{ $s->title ?: 'Book Your Consultation' }}</h2>
                        <div class="sh-orn"><span>◈</span></div>
                    </div>

                    @if(session('success'))
                        <div style="max-width:900px; margin:0 auto 24px; padding:12px 20px; text-align:center; font-size:14px; border-radius:8px; background: #EDF8F5; border: 1px solid #1B6B5A; color: #1B6B5A;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="consult-layout" style="margin-top: 40px;">
                        <div class="con-info">
                            <h3>Start Your Journey</h3>
                            <p>Get authentic Vedic recommendations, Kundli matching, and astro solutions from Pt. Dhiraj Baluni. Simply fill out the form, and our coordinator will get in touch with you shortly.</p>
                            
                            <div class="con-item" style="display:flex; align-items:center; gap:12px; padding:13px 16px; background:var(--white); border-radius:var(--rad-s); margin-bottom:8px; border:1px solid var(--w200);">
                                <div class="ci-icon">📞</div>
                                <div>
                                    <div class="ci-lbl">WhatsApp / Call</div>
                                    <div class="ci-val">{{ $settings->whatsapp }}</div>
                                </div>
                            </div>
                            <div class="con-item" style="display:flex; align-items:center; gap:12px; padding:13px 16px; background:var(--white); border-radius:var(--rad-s); margin-bottom:8px; border:1px solid var(--w200);">
                                <div class="ci-icon">✉️</div>
                                <div>
                                    <div class="ci-lbl">Email Address</div>
                                    <div class="ci-val">{{ $settings->email }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-card">
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="form-grp">
                                    <label>Full Name <span style="color:red">*</span></label>
                                    <input type="text" name="FullName" required placeholder="e.g. Rahul Sharma" value="{{ old('FullName') }}">
                                </div>
                                <div class="form-grp">
                                    <label>Phone / WhatsApp Number <span style="color:red">*</span></label>
                                    <input type="text" name="Phone" required placeholder="e.g. +91 99999 99999" value="{{ old('Phone') }}">
                                </div>
                                <div class="form-grp">
                                    <label>Email Address</label>
                                    <input type="email" name="Email" placeholder="your@email.com" value="{{ old('Email') }}">
                                </div>
                                <div class="form-grp">
                                    <label>Subject / Service Name</label>
                                    <input type="text" name="Subject" placeholder="e.g. Vastu Consultation / Pooja Bookings" value="{{ old('Subject') }}">
                                </div>
                                <div class="form-grp">
                                    <label>Message / Birth Details</label>
                                    <textarea name="Concern" placeholder="Provide your query or date, time and place of birth..." required>{{ old('Concern') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-p btn-full">Submit Request</button>
                            </form>
                        </div>
                    </div>
                </div>
        @elseif($s->type === 'about_legacy')
            <!-- GURUJI LEGACY RESHAPE SECTION -->
            <section class="reshape" style="background: var(--cream);">
                <div class="ctn">
                    <div class="reshape-img">
                        <div class="ri-main" style="overflow: hidden;">
                            @if($s->image_url)
                                <img src="{{ asset($s->image_url) }}" alt="{{ $s->title }}" style="width:100%; height:100%; object-fit:cover; border-radius:var(--rad);">
                            @elseif(isset($settings->guru_image) && !empty($settings->guru_image))
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
                        @if($s->subtitle)
                            <span class="over">{{ $s->subtitle }}</span>
                        @endif
                        @if($s->title)
                            <h2>{{ $s->title }}</h2>
                        @endif
                        <article class="blog-content" style="font-size: 15px; color: var(--w700); line-height: 1.8; margin-bottom: 24px; text-align: left;">
                            {!! $s->content !!}
                        </article>
                        <div class="reshape-features">
                            <div class="reshape-feat"><div class="rf-icon">✓</div><span>Expert in Vedic Astrology — Profession, Finance, Marriage, Education, Property & Vastu</span></div>
                            <div class="reshape-feat"><div class="rf-icon">✓</div><span>Extensive research on Manglik Dosh in Lagna, 4th, 7th, 8th & 12th houses</span></div>
                            <div class="reshape-feat"><div class="rf-icon">✓</div><span>Mastered remedial Astrology with great experience in Stone Therapy</span></div>
                            <div class="reshape-feat"><div class="rf-icon">✓</div><span>Full team for Navgrah Shanti, Kaalsarp Dosh, Mangal Dosh & all Vedic poojas</span></div>
                            <div class="reshape-feat"><div class="rf-icon">✓</div><span>Online services — thousands have benefited worldwide</span></div>
                        </div>
                    </div>
                </div>
            </section>

        @elseif($s->type === 'about_credentials')
            <!-- CERTIFICATIONS & CREDENTIALS SECTION -->
            <section class="credentials-sec" style="padding: clamp(48px, 7vw, 80px) 0; background: var(--cream); border-top: 1px solid var(--w200);">
                <div class="ctn">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 40px;">
                        <div style="flex: 1; min-width: 300px;">
                            @if($s->subtitle)
                                <span class="over" style="color:var(--saffron); font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:11px;">{{ $s->subtitle }}</span>
                            @endif
                            @if($s->title)
                                <h2 style="font-family:var(--fd); font-size:clamp(24px, 4vw, 34px); color:var(--temple); margin:8px 0 16px; font-weight:600;">{{ $s->title }}</h2>
                            @endif
                            <div style="font-size:14.5px; color:var(--w600); line-height:1.7; margin-bottom:20px; text-align: left;">
                                {!! $s->content !!}
                            </div>
                            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                                <a href="{{ route('consult') }}" class="btn btn-p">Book Consultation</a>
                                <a href="{{ route('services.index') }}" class="btn btn-o">Explore Services</a>
                            </div>
                        </div>
                        
                        <div style="flex: 0 0 380px; max-width: 100%; display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center; box-shadow: 0 4px 15px rgba(30,22,16,0.02);">
                                <div style="font-size:24px; margin-bottom:8px;">🎓</div>
                                <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">ICAS Certified</h4>
                                <p style="font-size:11px; color:var(--w500);">Jyotish Praveen & Visharadh degrees</p>
                            </div>
                            <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center; box-shadow: 0 4px 15px rgba(30,22,16,0.02);">
                                <div style="font-size:24px; margin-bottom:8px;">⚜️</div>
                                <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">Karmkand Expert</h4>
                                <p style="font-size:11px; color:var(--w500);">Vedic poojas, yagya, and shantis</p>
                            </div>
                            <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center; box-shadow: 0 4px 15px rgba(30,22,16,0.02);">
                                <div style="font-size:24px; margin-bottom:8px;">🌟</div>
                                <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">{{ $settings->experience_years ?? '29' }}+ Years Exp</h4>
                                <p style="font-size:11px; color:var(--w500);">Vedic master since 1997</p>
                            </div>
                            <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center; box-shadow: 0 4px 15px rgba(30,22,16,0.02);">
                                <div style="font-size:24px; margin-bottom:8px;">🗺️</div>
                                <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">Global Clients</h4>
                                <p style="font-size:11px; color:var(--w500);">Serving clients in 100+ countries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endforeach

@endsection
