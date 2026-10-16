@php
    $waLink = "https://wa.me/" . ($settings->whatsapp ?? '919868340066');
@endphp
<!-- FRAUD WARNING -->
<div class="fraud-warn">
    <div class="ctn">
        <p>⚠️ <strong>Note:</strong> Beware of fake names and websites. We do not have any other branch or contact numbers. We are not responsible for any fraudulent activity by third parties.</p>
    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    <div class="ctn">
        <div class="foot-grid">
            <div class="foot-brand">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
                    <img src="{{ asset('images/logo.jpg') }}" alt="AstroVastuPooja Logo" style="width: 38px; height: 38px; border-radius: 50%; object-fit: cover; border: 1px solid rgba(255,255,255,.1);">
                    <div><div class="logo-brand" style="color:var(--w200)">{{ $settings->site_name ?? 'AstroVastuPooja' }}</div></div>
                </div>
                <div class="fb-desc">{{ $settings->footer_desc ?? 'The most reliable destination for Vedic Astrology, Vastu Shastra, Karmkand rituals and Gem consultation.' }}</div>
                <div class="foot-pay" style="margin-top:16px"><span>UPI</span><span>Bank Transfer</span><span>Cash</span></div>
            </div>
            <div class="foot-links">
                <h4>Quick Links</h4>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('services.index') }}">Services</a>
                <a href="{{ route('consult') }}">Online Consult</a>
                <a href="{{ route('gallery.index') }}">Gallery</a>
                <a href="{{ route('blog.index') }}">Blog</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            <div class="foot-links">
                <h4>Services</h4>
                <a href="{{ route('services.index', ['category' => 'astrology']) }}">Astrology</a>
                <a href="{{ route('services.index', ['category' => 'pooja-path']) }}">Pooja Path</a>
                <a href="{{ route('services.index', ['category' => 'vastu']) }}">Vastu Shastra</a>
                <a href="{{ route('services.index', ['category' => 'gems-numerology']) }}">Gems & Numerology</a>
            </div>
            <div>
                <h4>Get In Touch</h4>
                <div class="foot-ci"><span class="fci-icon">📞</span><span>{{ $settings->phone ?? '+91 98683 40066' }}</span></div>
                <div class="foot-ci"><span class="fci-icon">📧</span><span>{{ $settings->email ?? 'shiv.astro@yahoo.com' }}</span></div>
                <div class="foot-ci"><span class="fci-icon">📍</span><span>{{ $settings->address ?? 'Noida' }}</span></div>
                <div style="display:flex;gap:8px;margin-top:12px">
                    @if(isset($settings->facebook_url) && !empty($settings->facebook_url) && $settings->facebook_url !== '#')
                        <a href="{{ $settings->facebook_url }}" title="Facebook" target="_blank" style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:13px;color:var(--w400);transition:all .2s"><i class="bi bi-facebook"></i></a>
                    @endif
                    @if(isset($settings->instagram_url) && !empty($settings->instagram_url) && $settings->instagram_url !== '#')
                        <a href="{{ $settings->instagram_url }}" title="Instagram" target="_blank" style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:13px;color:var(--w400);transition:all .2s"><i class="bi bi-instagram"></i></a>
                    @endif
                    @if(isset($settings->twitter_url) && !empty($settings->twitter_url) && $settings->twitter_url !== '#')
                        <a href="{{ $settings->twitter_url }}" title="Twitter" target="_blank" style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:13px;color:var(--w400);transition:all .2s"><i class="bi bi-twitter-x"></i></a>
                    @endif
                    @if(isset($settings->linkedin_url) && !empty($settings->linkedin_url) && $settings->linkedin_url !== '#')
                        <a href="{{ $settings->linkedin_url }}" title="LinkedIn" target="_blank" style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:13px;color:var(--w400);transition:all .2s"><i class="bi bi-linkedin"></i></a>
                    @endif
                    <a href="{{ $waLink }}" title="WhatsApp" target="_blank" style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:13px;color:var(--w400);transition:all .2s"><i class="bi bi-whatsapp"></i></a>
                    <!-- Justdial -->
<a href="https://jsdl.in/DT-23PHD476NZL"
   title="Justdial"
   target="_blank"
   rel="noopener noreferrer"
   style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:11px;color:var(--w400);transition:all .2s">
    <span style="font-weight:600;">JD</span>
</a>
                </div>
            </div>
        </div>
        <div class="foot-bottom">
            <span>© {{ date('Y') }} {{ $settings->site_name ?? 'AstroVastuPooja' }}. All Rights Reserved.</span>
            <div style="display:flex;gap:12px">
                <a href="{{ route('privacy-policy') }}" style="color:var(--w400);font-size:12px">Privacy Policy</a>
                <a href="{{ route('terms-and-conditions') }}" style="color:var(--w400);font-size:12px">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Float -->
<a class="wa-float" href="{{ $waLink }}" target="_blank">💬</a>

<!-- Sticky Bottom (Mobile) -->
<div class="sticky-bottom">
    <div class="sb-inner">
        <a class="sb-call" href="tel:{{ $settings->phone_raw ?? '919868340066' }}">📞 Call Now</a>
        <a class="sb-wa" href="{{ $waLink }}" target="_blank">💬 WhatsApp</a>
    </div>
</div>
