@extends('layouts.app')

@section('seo_tags')
    @if(isset($activeCategory->seo_tags) && !empty($activeCategory->seo_tags))
        {!! $activeCategory->seo_tags !!}
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif
@endsection

@push('styles')
    <style>
        /* Category Intro Banner */
        .svc-cat-intro { display:flex; gap:24px; align-items:flex-start; padding:28px; background:var(--white); border:1px solid var(--w200); border-radius:var(--rad); margin-bottom:32px }
        .sci-icon { font-size:56px; flex-shrink:0; width:80px; height:80px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,var(--saffron-mist),var(--gold-pale)); border-radius:var(--rad); border:1px solid var(--w200) }
        .sci-text h2 { font-family:var(--fd); font-size:clamp(22px,3vw,30px); font-weight:600; margin-bottom:2px }
        .sci-hindi { font-size:14px; color:var(--saffron-deep); margin-bottom:12px; font-weight:500 }
        .sci-text > p { font-size:14px; color:var(--w600); line-height:1.7; margin-bottom:16px }
        .sci-stats { display:flex; gap:20px; flex-wrap:wrap }
        .sci-stat { font-size:13px; color:var(--w500); display:flex; align-items:center; gap:4px }
        .sci-stat strong { color:var(--saffron-deep); font-size:15px }

        /* Service Cards Grid */
        .svc-cards-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(260px,1fr)); gap:18px; margin-bottom:32px }
        .svc-detail-card { background:var(--white); border:1px solid var(--w200); border-radius:var(--rad); overflow:hidden; transition:all .3s }
        .svc-detail-card:hover { transform:translateY(-4px); box-shadow:0 10px 30px rgba(30,22,16,.06); border-color:var(--saffron) }
        .sdc-header { height:64px; display:flex; align-items:center; justify-content:center; position:relative }
        .sdc-icon { font-size:32px }
        .sdc-body { padding:18px 20px }
        .sdc-body h3 { font-family:var(--fd); font-size:17px; font-weight:600; margin-bottom:2px }
        .sdc-hindi { font-size:12px; color:var(--saffron-deep); margin-bottom:8px; font-weight:500 }
        .sdc-short { font-size:13px; color:var(--w600); line-height:1.5; margin-bottom:8px }
        .sdc-full { margin:10px 0; padding:12px 14px; background:var(--w50); border-radius:var(--rad-s); border:1px solid var(--w200); animation:fadeUp .3s ease }
        .sdc-full p { font-size:13px; color:var(--w600); line-height:1.7 }
        .sdc-toggle { background:none; border:none; font-size:12px; color:var(--saffron); font-weight:600; cursor:pointer; padding:0; font-family:var(--fb) }
        .sdc-actions { display:flex; gap:8px; margin-top:14px; padding-top:12px; border-top:1px solid var(--w200) }
        .sdc-btn { font-size:12px; font-weight:600; color:var(--white); background:var(--saffron); padding:7px 16px; border-radius:var(--rad-pill); transition:all .2s; text-decoration:none }
        .sdc-btn:hover { background:var(--saffron-deep) }
        .sdc-wa { font-size:12px; font-weight:500; color:var(--teal); padding:7px 12px; border-radius:var(--rad-pill); border:1px solid var(--teal-mist); transition:all .2s; text-decoration:none }
        .sdc-wa:hover { background:var(--teal-mist) }

        /* Category CTA */
        .svc-cat-cta { display:flex; align-items:center; justify-content:space-between; gap:20px; padding:24px 28px; background:linear-gradient(135deg,var(--temple-dark),var(--temple)); border-radius:var(--rad); margin-bottom:16px; flex-wrap:wrap }
        .scc-text h3 { font-family:var(--fd); font-size:20px; font-weight:500; color:var(--w100); margin-bottom:4px }
        .scc-text p { font-size:13px; color:var(--w400) }
        .scc-btns { display:flex; gap:8px; flex-wrap:wrap }
        .scc-btns .btn { padding:10px 20px; font-size:13px }

        /* Why Choose Us */
        .why-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:16px }
        .why-card { background:var(--white); border:1px solid var(--w200); border-radius:var(--rad); padding:22px 20px; transition:all .25s }
        .why-card:hover { transform:translateY(-4px); box-shadow:0 8px 24px rgba(0,0,0,.04); border-color:var(--saffron) }
        .wc-icon { font-size:28px; margin-bottom:10px }
        .why-card h4 { font-size:14px; font-weight:600; margin-bottom:4px }
        .why-card p { font-size:12px; color:var(--w500); line-height:1.5 }

        /* FAQ */
        .faq-list { display:flex; flex-direction:column; gap:10px }
        .faq-item { background:var(--white); border:1px solid var(--w200); border-radius:var(--rad); overflow:hidden; cursor:pointer; transition:border-color .2s }
        .faq-item:hover { border-color:var(--saffron) }
        .faq-q { padding:16px 20px; font-size:14px; font-weight:500; display:flex; justify-content:space-between; align-items:center; gap:12px }
        .faq-q::after { content:'▼'; font-size:10px; color:var(--saffron); transition:transform .2s; flex-shrink:0 }
        .faq-item.open .faq-q::after { transform:rotate(180deg) }
        .faq-a { display:none; padding:0 20px 16px; font-size:13px; color:var(--w600); line-height:1.7 }
        .faq-item.open .faq-a { display:block }

        @media(max-width:640px){
            .svc-cat-intro { flex-direction:column; text-align:center }
            .sci-stats { justify-content:center }
            .svc-cat-cta { flex-direction:column; text-align:center }
            .svc-cards-grid { grid-template-columns:1fr }
        }
    </style>
@endpush

@section('content')
    <section class="pg-hero">
        <div class="ctn">
            <span class="over">Our Services</span>
            <h1>Vedic Solutions for Every Aspect of Life</h1>
            <p>Comprehensive astrology, Vastu, pooja path, gem stone and numerology services by {{ $settings->guru_name }} — {{ $settings->experience_years }}+ years of Vedic mastery</p>
        </div>
    </section>

    <!-- TABS -->
    <section style="padding:clamp(32px,5vw,56px) 0 0">
        <div class="ctn">
            <div class="tabs" id="tabsList">
                @foreach($categories as $cat)
                    <button class="tab-btn {{ $activeCategory && $activeCategory->id === $cat->id ? 'active' : '' }}" onclick="showCat({{ $cat->id }}, event)">
                        {{ $cat->icon }} {{ $cat->name }}
                    </button>
                @endforeach
            </div>

            <div id="tabsContent">
                @foreach($categories as $cat)
                    @php
                        $isActive = $activeCategory && $activeCategory->id === $cat->id;
                        $catServices = $services->where('category_id', $cat->id);
                        $catIntros = [
                            "astrology" => "ज्योतिष शास्त्र एक प्राचीन वेदांग है, जिसे \"वेद का चक्षु\" कहा गया है। Vedic astrology studies the positions of planets and celestial bodies to predict and guide every aspect of human life — from career and marriage to health and wealth. Our expert astrologers provide precise birth chart analysis, marriage compatibility matching, career guidance, wealth predictions, and remedies for planetary afflictions.",
                            "pooja-path" => "कर्मकांड और पूजा पाठ सनातन धर्म का अभिन्न अंग है। Our team of experienced pandits performs all types of Vedic rituals — from Rudra Abhishek and Durga Saptashati to Grih Pravesh, Marriage ceremonies, and Dosh Nivaran poojas. Each ritual is performed with complete Vedic vidhi-vidhan for maximum divine blessings and spiritual benefit.",
                            "vastu" => "वास्तु शास्त्र प्राचीन भारतीय वास्तुकला का विज्ञान है। Vastu Shastra harmonizes your living and working spaces with cosmic energies. Our expert Vastu consultation covers homes, offices, factories, and plots — identifying directional imbalances, energy blockages, and providing practical remedies to create an environment of health, prosperity, and peace.",
                            "gems-numerology" => "रत्न ज्योतिष एक प्राचीन विज्ञान है जो ग्रहों के प्रभाव को संतुलित करता है। Gem stones and numerology are powerful tools in Vedic science. We recommend the right gemstones based on your birth chart to strengthen weak planets and balance cosmic energies. Our numerology services help with name corrections, lucky numbers, and business name selection for maximum success."
                        ];
                        $catIntroText = $catIntros[$cat->slug] ?? '';
                    @endphp
                    <div id="cat-{{ $cat->id }}" class="tab-content" style="display: {{ $isActive ? 'block' : 'none' }}">
                        <!-- Category Intro Banner -->
                        <div class="svc-cat-intro">
                            <div class="sci-icon" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
                                @if($cat->image)
                                    <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->alt_image ?: $cat->name }}" style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    {{ $cat->icon }}
                                @endif
                            </div>
                            <div class="sci-text">
                                <h2>{{ $cat->name }}</h2>
                                <p class="sci-hindi">{{ $cat->name_hindi }}</p>
                                <p>{{ $catIntroText }}</p>
                                <div class="sci-stats">
                                    <div class="sci-stat"><strong>{{ $catServices->count() }}</strong> Services</div>
                                    <div class="sci-stat"><strong>{{ $settings->experience_years }}+</strong> Years Experience</div>
                                    <div class="sci-stat"><strong>10K+</strong> Clients Served</div>
                                </div>
                            </div>
                        </div>

                        <!-- Service Cards Grid -->
                        <div class="svc-cards-grid">
                            @foreach($catServices as $s)
                                <div class="svc-detail-card" id="svc-{{ $s->id }}">
                                    <div class="sdc-header" style="background:linear-gradient(135deg,var(--{{ $s->color_class ?? 'saffron-mist' }}),var(--gold-pale))">
                                        <span class="sdc-icon">{{ $s->icon }}</span>
                                    </div>
                                    <div class="sdc-body">
                                        <h3>{{ $s->title }}</h3>
                                        <p class="sdc-hindi">{{ $s->title_hindi }}</p>
                                        <p class="sdc-short">{{ $s->short_description }}</p>
                                        
                                        @if($s->full_description)
                                            <div class="sdc-full" id="full-{{ $s->id }}" style="display:none">
                                                <p>{!! $s->full_description !!}</p>
                                            </div>
                                            <button class="sdc-toggle" onclick="toggleReadMore({{ $s->id }}, event)">▼ Read more</button>
                                        @endif

                                        <div class="sdc-actions">
                                            <a class="sdc-btn" href="{{ route('services.show', ['slug' => $s->slug]) }}">View Details</a>
                                            <a class="sdc-wa" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank">💬 WhatsApp</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Category CTA -->
                        <div class="svc-cat-cta">
                            <div class="scc-text">
                                <h3>Need Help With {{ $cat->name }}?</h3>
                                <p>Get personalized guidance from {{ $settings->guru_name }}. Book a consultation today.</p>
                            </div>
                            <div class="scc-btns">
                                <a class="btn btn-p" href="{{ route('consult') }}">Book Consultation →</a>
                                <a class="btn btn-wa" href="https://wa.me/{{ $settings->whatsapp }}" target="_blank">💬 WhatsApp</a>
                                <a class="btn btn-o" href="tel:{{ $settings->phone_raw }}" style="background: #e8e0d6;">📞 Call Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section style="padding:clamp(40px,6vw,64px) 0;background:var(--w50)">
        <div class="ctn">
            <div class="sh">
                <span class="over">Why Choose Us</span>
                <h2>What Makes Us Different</h2>
                <div class="sh-orn"><span>◈</span></div>
            </div>
            <div class="why-grid">
                <div class="why-card"><div class="wc-icon">🏅</div><h4>ICAS Certified</h4><p>Studied Jyotish Praveen & Jyotish Visharadh from Indian Council of Astrological Science</p></div>
                <div class="why-card"><div class="wc-icon">📚</div><h4>29+ Years Research</h4><p>Extensive research on Manglik Dosh, Kaal Sarp Dosh, and advanced predictive astrology</p></div>
                <div class="why-card"><div class="wc-icon">🌍</div><h4>100+ Countries</h4><p>Serving clients worldwide with online consultations in Hindi and English</p></div>
                <div class="why-card"><div class="wc-icon">💎</div><h4>Stone Therapy Expert</h4><p>Mastered remedial astrology with deep experience in gemstone recommendations</p></div>
                <div class="why-card"><div class="wc-icon">🔔</div><h4>Complete Karmkand Team</h4><p>Full team of experienced pandits for all types of Vedic rituals and ceremonies</p></div>
                <div class="why-card"><div class="wc-icon">🔒</div><h4>100% Confidential</h4><p>Your personal information and consultations are kept strictly private</p></div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section style="padding:clamp(40px,6vw,64px) 0">
        <div class="ctn" style="max-width:800px">
            <div class="sh">
                <span class="over">FAQ</span>
                <h2>Frequently Asked Questions</h2>
                <div class="sh-orn"><span>◈</span></div>
            </div>
            <div class="faq-list">
                @foreach($faqs as $faq)
                    <div class="faq-item" onclick="this.classList.toggle('open')">
                        <div class="faq-q">{{ $faq->question }}</div>
                        <div class="faq-a">{{ $faq->answer }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const SERVICE_CATEGORIES = @json($categories);

        // Tab switcher
        function showCat(id, event) {
            document.querySelectorAll('.tab-content').forEach(t => t.style.display = 'none');
            document.getElementById('cat-' + id).style.display = 'block';
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            event.currentTarget.classList.add('active');
            
            // Update URL query parameter without reloading
            const catObj = SERVICE_CATEGORIES.find(c => c.id === id);
            if (catObj) {
                const newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?category=' + catObj.slug;
                window.history.pushState({path:newurl},'',newurl);
            }
        }

        // Toggle Read More block
        function toggleReadMore(id, event) {
            event.stopPropagation();
            const el = document.getElementById('full-' + id);
            const show = el.style.display === 'none';
            el.style.display = show ? 'block' : 'none';
            event.currentTarget.textContent = show ? '▲ Show less' : '▼ Read more';
        }
    </script>
@endpush
