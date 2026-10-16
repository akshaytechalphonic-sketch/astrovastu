@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
    <div class="page-header">
        <h1>⚙️ Site Settings</h1>
        <button type="button" class="btn-admin btn-admin-p" onclick="document.getElementById('settingsForm').submit()">Save Settings</button>
    </div>

    @if ($errors->any())
        <div style="background:#FDF2F2; color:#7A1F1F; border:1px solid rgba(122,31,31,.2); padding:12px; border-radius:8px; font-size:13px; margin-bottom:20px">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="tabs" style="margin-bottom:20px">
        <button class="tab-btn active" onclick="switchSettingsTab('general', event)">General & Contact</button>
        <button class="tab-btn" onclick="switchSettingsTab('hero', event)">Hero Section</button>
        <button class="tab-btn" onclick="switchSettingsTab('cta', event)">Call-to-Action & Stats</button>
        <button class="tab-btn" onclick="switchSettingsTab('scripts', event)">SEO & Code Scripts</button>
    </div>

    <form id="settingsForm" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- TAB: GENERAL -->
        <div id="set-general" class="settings-tab-content">
            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">Brand & Guruji Details</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label>Site Name</label>
                        <input name="site_name" required value="{{ old('site_name', $setting->site_name) }}">
                    </div>
                    <div class="form-group">
                        <label>Guruji Name</label>
                        <input name="guru_name" required value="{{ old('guru_name', $setting->guru_name) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Guruji Short Biography (Home page)</label>
                    <textarea name="about_short" required rows="4">{{ old('about_short', $setting->about_short) }}</textarea>
                </div>
                <div class="form-group" style="margin-top:16px">
                    <label>Guruji Photo (Home page)</label>
                    <input type="file" name="guru_image" style="margin-bottom:8px">
                    @if($setting->guru_image)
                        <div style="margin-top:10px">
                            <img src="{{ asset('storage/' . $setting->guru_image) }}" alt="Guruji Photo" style="max-height:100px; border-radius:8px">
                        </div>
                    @endif
                </div>
                <div class="form-group" style="margin-top:16px">
                    <label>Footer Description</label>
                    <textarea name="footer_desc" required rows="3">{{ old('footer_desc', $setting->footer_desc) }}</textarea>
                </div>
            </div>

            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">Contact Information</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label>Phone (Display format)</label>
                        <input name="phone" required value="{{ old('phone', $setting->phone) }}">
                    </div>
                    <div class="form-group">
                        <label>Phone Raw (No spaces/special chars, for tel: links)</label>
                        <input name="phone_raw" required value="{{ old('phone_raw', $setting->phone_raw) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="email" type="email" required value="{{ old('email', $setting->email) }}">
                    </div>
                    <div class="form-group">
                        <label>WhatsApp Number (without + or 0, e.g. 919868340066)</label>
                        <input name="whatsapp" required value="{{ old('whatsapp', $setting->whatsapp) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Office Address</label>
                    <input name="address" required value="{{ old('address', $setting->address) }}">
                </div>
            </div>

            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">Social Media Profiles</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label>Facebook URL</label>
                        <input name="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}">
                    </div>
                    <div class="form-group">
                        <label>Instagram URL</label>
                        <input name="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Twitter / X URL</label>
                        <input name="twitter_url" value="{{ old('twitter_url', $setting->twitter_url) }}">
                    </div>
                    <div class="form-group">
                        <label>LinkedIn URL</label>
                        <input name="linkedin_url" value="{{ old('linkedin_url', $setting->linkedin_url) }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: HERO -->
        <div id="set-hero" class="settings-tab-content" style="display:none">
            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">Homepage Hero Banner</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label>Hero Badge Text</label>
                        <input name="hero_badge" required value="{{ old('hero_badge', $setting->hero_badge) }}">
                    </div>
                    <div class="form-group">
                        <label>Hero Main Title</label>
                        <input name="hero_title" required value="{{ old('hero_title', $setting->hero_title) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Hero Quote (Hindi/Sanskrit phrase)</label>
                    <input name="hero_quote" required value="{{ old('hero_quote', $setting->hero_quote) }}">
                </div>
                <div class="form-group">
                    <label>Hero Description</label>
                    <textarea name="hero_description" required rows="4">{{ old('hero_description', $setting->hero_description) }}</textarea>
                </div>
            </div>

            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">Hero Trust Badges</h2>
                <div class="form-group">
                    <label>Trust Badge 1</label>
                    <input name="hero_trust_1" required value="{{ old('hero_trust_1', $setting->hero_trust_1) }}">
                </div>
                <div class="form-group">
                    <label>Trust Badge 2</label>
                    <input name="hero_trust_2" required value="{{ old('hero_trust_2', $setting->hero_trust_2) }}">
                </div>
                <div class="form-group">
                    <label>Trust Badge 3</label>
                    <input name="hero_trust_3" required value="{{ old('hero_trust_3', $setting->hero_trust_3) }}">
                </div>
            </div>
        </div>

        <!-- TAB: CTA & STATS -->
        <div id="set-cta" class="settings-tab-content" style="display:none">
            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">CTA Band Banner</h2>
                <div class="form-group">
                    <label>CTA Heading Title</label>
                    <input name="cta_title" required value="{{ old('cta_title', $setting->cta_title) }}">
                </div>
                <div class="form-group">
                    <label>CTA Subtitle</label>
                    <input name="cta_subtitle" required value="{{ old('cta_subtitle', $setting->cta_subtitle) }}">
                </div>
            </div>

            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">Vedic Platform Counters & Stats</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label>Experience (Years)</label>
                        <input name="experience_years" type="number" required value="{{ old('experience_years', $setting->experience_years) }}">
                    </div>
                    <div class="form-group">
                        <label>Gems Recommended</label>
                        <input name="stat_gems" type="number" required value="{{ old('stat_gems', $setting->stat_gems) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Poojas Performed</label>
                        <input name="stat_poojas" type="number" required value="{{ old('stat_poojas', $setting->stat_poojas) }}">
                    </div>
                    <div class="form-group">
                        <label>Countries Served</label>
                        <input name="stat_countries" type="number" required value="{{ old('stat_countries', $setting->stat_countries) }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: SCRIPTS & SEO -->
        <div id="set-scripts" class="settings-tab-content" style="display:none">
            <div class="card">
                <h2 style="font-size:16px; margin-bottom:16px">Global SEO & Custom Codes</h2>
                <div class="form-group">
                    <label>Global SEO Meta Tags (HTML head scripts)</label>
                    <textarea name="seo_tags" rows="10" style="font-family:monospace; font-size:13px; line-height:1.5">{{ old('seo_tags', $setting->seo_tags) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Google Analytics / Header Tracking Script</label>
                    <textarea name="analytics_code" rows="6" placeholder="<!-- Paste script code here -->" style="font-family:monospace; font-size:13px; line-height:1.5">{{ old('analytics_code', $setting->analytics_code) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Custom Site CSS Rules</label>
                    <textarea name="custom_css" rows="6" placeholder="/* Custom CSS style overrides */" style="font-family:monospace; font-size:13px; line-height:1.5">{{ old('custom_css', $setting->custom_css) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Custom Site JS Code</label>
                    <textarea name="custom_js" rows="6" placeholder="// Custom Javascript to fire on page load" style="font-family:monospace; font-size:13px; line-height:1.5">{{ old('custom_js', $setting->custom_js) }}</textarea>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        function switchSettingsTab(tabName, event) {
            document.querySelectorAll('.settings-tab-content').forEach(c => c.style.display = 'none');
            document.getElementById('set-' + tabName).style.display = 'block';
            
            document.querySelectorAll('.tabs .tab-btn').forEach(b => b.classList.remove('active'));
            event.currentTarget.classList.add('active');
        }
    </script>
@endpush
