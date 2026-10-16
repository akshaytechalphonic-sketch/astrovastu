@extends('layouts.app')

@section('seo_tags')
    @if(isset($aboutPage->seo_tags) && !empty($aboutPage->seo_tags))
        {!! $aboutPage->seo_tags !!}
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif
@endsection

@section('content')
    @php
        $pb = $pageBanners->get('about');
    @endphp
    @if($pb)
        <section class="pg-hero-banner" style="background-image: url('{{ asset($pb->image_url) }}')">
            <div class="ctn">
                <span class="over">{{ $pb->title }}</span>
                <h1>{{ $pb->heading ?: 'Meet Pt. Dhiraj Baluni' }}</h1>
                <p>{{ $pb->description ?: 'Best Online Astrologer in India — ' . ($settings->experience_years) . '+ Years of Vedic Mastery — Since 1997' }}</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over">About Us</span>
                <h1>Meet Pt. Dhiraj Baluni</h1>
                <p>Best Online Astrologer in India — <span id="heroExp">{{ $settings->experience_years }}+</span> Years of Vedic Mastery — Since 1997</p>
            </div>
        </section>
    @endif

    <section class="reshape" style="background:var(--cream)">
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
                <span class="over">Legacy of Vedic Wisdom</span>
                <h2>From a Revered Brahmin Family</h2>
                @if(isset($aboutPage->content) && !empty($aboutPage->content))
                    {!! $aboutPage->content !!}
                @else
                    <p>Pt. Dhiraj Baluni has a great interest in Spiritualism, Occult Sciences, Astrology, Karmkanda and other religious rituals since the time of his late Grandfather Pt. Narendra Sharma. He studied Jyotish Praveen and Jyotish Visharadh from ICAS under the guidance of late Shri M.N. Kedar and Pradeep Chaturvedi.</p>
                @endif
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

    <!-- VEDIC PHILOSOPHY & VALUES -->
    <section class="values-sec" style="padding:clamp(48px,7vw,80px) 0; background:var(--white); border-top: 1px solid var(--w200);">
        <div class="ctn">
            <div class="sh">
                <span class="over">Our Pillars</span>
                <h2>Vedic Philosophy & Core Values</h2>
                <p>Guided by ancient traditions, we apply time-tested cosmic wisdom to bring peace and growth in your life.</p>
                <div class="sh-orn"><span>◈</span></div>
            </div>
            
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px; margin-top:40px;">
                <!-- Value Card 1 -->
                <div class="value-card" style="padding:32px 24px; border:1px solid var(--w200); border-radius:var(--rad); background:linear-gradient(135deg, var(--white) 0%, var(--w50) 100%); transition:all .3s ease; text-align:left;">
                    <div style="width:48px; height:48px; border-radius:50%; background:var(--saffron-mist); display:flex; align-items:center; justify-content:center; font-size:22px; color:var(--saffron-deep); margin-bottom:20px;">📜</div>
                    <h3 style="font-family:var(--fd); font-size:18px; font-weight:600; color:var(--temple); margin-bottom:10px;">Vedic Purity (शुद्धता)</h3>
                    <p style="font-size:13.5px; color:var(--w600); line-height:1.6; margin:0;">We perform all calculations and pooja services strictly according to authentic Parashara and Vedic principles without diluting sacred mantras.</p>
                </div>
                
                <!-- Value Card 2 -->
                <div class="value-card" style="padding:32px 24px; border:1px solid var(--w200); border-radius:var(--rad); background:linear-gradient(135deg, var(--white) 0%, var(--w50) 100%); transition:all .3s ease; text-align:left;">
                    <div style="width:48px; height:48px; border-radius:50%; background:var(--teal-mist); display:flex; align-items:center; justify-content:center; font-size:22px; color:var(--teal); margin-bottom:20px;">🛡️</div>
                    <h3 style="font-family:var(--fd); font-size:18px; font-weight:600; color:var(--temple); margin-bottom:10px;">Practical Remedies (सरल उपाय)</h3>
                    <p style="font-size:13.5px; color:var(--w600); line-height:1.6; margin:0;">Our Vastu solutions avoid structural demolition. We focus on natural energy adjusters, color therapy, gemstone recommendation, and mantras.</p>
                </div>

                <!-- Value Card 3 -->
                <div class="value-card" style="padding:32px 24px; border:1px solid var(--w200); border-radius:var(--rad); background:linear-gradient(135deg, var(--white) 0%, var(--w50) 100%); transition:all .3s ease; text-align:left;">
                    <div style="width:48px; height:48px; border-radius:50%; background:var(--gold-pale); display:flex; align-items:center; justify-content:center; font-size:22px; color:var(--gold); margin-bottom:20px;">🤝</div>
                    <h3 style="font-family:var(--fd); font-size:18px; font-weight:600; color:var(--temple); margin-bottom:10px;">Absolute Confidentiality</h3>
                    <p style="font-size:13.5px; color:var(--w600); line-height:1.6; margin:0;">All consultations, birth charts, family problems, and spiritual healing services remain 100% confidential under our Vedic ethics.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CERTIFICATIONS & CREDENTIALS -->
    <section class="credentials-sec" style="padding:clamp(48px,7vw,80px) 0; background:var(--cream); border-top:1px solid var(--w200);">
        <div class="ctn">
            <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:40px;">
                <div style="flex:1; min-width:300px;">
                    <span class="over" style="color:var(--saffron); font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:11px;">Credentials</span>
                    <h2 style="font-family:var(--fd); font-size:clamp(24px,4vw,34px); color:var(--temple); margin:8px 0 16px; font-weight:600;">Certified Vedic Mastery</h2>
                    <p style="font-size:14.5px; color:var(--w600); line-height:1.7; margin-bottom:20px;">Pt. Dhiraj Baluni studied under late Shri M.N. Kedar and Pradeep Chaturvedi, earning credentials from the Indian Council of Astrological Sciences (ICAS). With decades of dedicated research, his mastery ensures professional-grade consultations.</p>
                    <div style="display:flex; gap:12px; flex-wrap:wrap;">
                        <a href="{{ route('consult') }}" class="btn btn-p">Book Consultation</a>
                        <a href="{{ route('services.index') }}" class="btn btn-o">Explore Services</a>
                    </div>
                </div>
                
                <div style="flex:0 0 380px; max-width:100%; display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center;">
                        <div style="font-size:24px; margin-bottom:8px;">🎓</div>
                        <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">ICAS Certified</h4>
                        <p style="font-size:11px; color:var(--w500);">Jyotish Praveen & Visharadh degrees</p>
                    </div>
                    <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center;">
                        <div style="font-size:24px; margin-bottom:8px;">⚜️</div>
                        <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">Karmkand Expert</h4>
                        <p style="font-size:11px; color:var(--w500);">Vedic poojas, yagya, and shantis</p>
                    </div>
                    <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center;">
                        <div style="font-size:24px; margin-bottom:8px;">🌟</div>
                        <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">29+ Years Exp</h4>
                        <p style="font-size:11px; color:var(--w500);">Vedic master since 1997</p>
                    </div>
                    <div style="padding:20px; background:var(--white); border:1px solid var(--w200); border-radius:12px; text-align:center;">
                        <div style="font-size:24px; margin-bottom:8px;">🗺️</div>
                        <h4 style="font-size:14px; font-weight:700; color:var(--temple); margin-bottom:4px;">Global Clients</h4>
                        <p style="font-size:11px; color:var(--w500);">Serving clients in 100+ countries</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
