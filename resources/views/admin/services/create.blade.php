@extends('layouts.admin')

@section('title', 'Create Service')

@section('content')
    <div class="page-header">
        <h1>🔮 Create Service</h1>
        <a href="{{ route('admin.services.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Services</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field-description" style="background:#FFF8EF; border-left:3px solid var(--p); padding:10px 14px; border-radius:6px; margin-bottom:20px; font-size:13px; color:var(--muted)">
                ℹ️ <strong>Tip:</strong> The <em>Full Description</em> field accepts HTML — you can use <code>&lt;h4&gt;</code>, <code>&lt;p&gt;</code>, <code>&lt;ol&gt;</code>/<code>&lt;ul&gt;</code> tags. Click <strong>Show Preview</strong> below the textarea to see how it will render on the website. Leave <em>Slug</em> blank to auto-generate from the Title.
            </div>

            @if ($errors->any())
                <div style="background:#FDF2F2; color:#7A1F1F; border:1px solid rgba(122,31,31,.2); padding:12px; border-radius:8px; font-size:13px; margin-bottom:20px">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="form-row">
                <div class="form-group">
                    <label>Title <span style="color:var(--d)">*</span></label>
                    <input name="Title" required placeholder="e.g. Marriage Astrology Consultation" value="{{ old('Title') }}">
                </div>
                <div class="form-group">
                    <label>Hindi Title</label>
                    <input name="TitleHindi" placeholder="e.g. विवाह ज्योतिष परामर्श" value="{{ old('TitleHindi') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Slug (URL identifier) — auto-generated if blank</label>
                    <input name="Slug" pattern="[a-z0-9\-]*" title="lowercase letters, numbers and dashes only" placeholder="e.g. marriage-astrology" value="{{ old('Slug') }}">
                </div>
                <div class="form-group">
                    <label>Category <span style="color:var(--d)">*</span></label>
                    <select name="ServiceCategoryId" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('ServiceCategoryId') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Icon Emoji <span style="color:var(--d)">*</span></label>
                    <input name="Icon" required placeholder="🔮" maxlength="5" style="max-width:120px" value="{{ old('Icon', '🔮') }}">
                </div>
                <div class="form-group">
                    <label>Color Class <span style="color:var(--d)">*</span></label>
                    <select name="ColorClass" required>
                        <option value="saffron-mist" {{ old('ColorClass') == 'saffron-mist' ? 'selected' : '' }}>Saffron Mist</option>
                        <option value="teal-mist" {{ old('ColorClass', 'teal-mist') == 'teal-mist' ? 'selected' : '' }}>Teal Mist</option>
                        <option value="gold-pale" {{ old('ColorClass') == 'gold-pale' ? 'selected' : '' }}>Gold Pale</option>
                        <option value="maroon-mist" {{ old('ColorClass') == 'maroon-mist' ? 'selected' : '' }}>Maroon Mist</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Short Description (shows on service card)</label>
                <input name="ShortDescription" maxlength="500" placeholder="One-line summary that appears on the service card." value="{{ old('ShortDescription') }}">
            </div>

            <div class="form-group">
                <label>Full Description (HTML — long-form content shown when user clicks "Read more")</label>
                <textarea id="fullDescEditor" name="FullDescription" rows="12" placeholder="Write full description here..." style="min-height:280px; font-family:monospace; font-size:13px; line-height:1.5">{{ old('FullDescription') }}</textarea>
                <div style="display:flex; gap:10px; margin-top:8px; align-items:center; flex-wrap:wrap">
                    <button type="button" id="togglePreviewBtn" class="btn-admin btn-admin-o btn-admin-sm" onclick="togglePreview()">👁 Show Preview</button>
                    <button type="button" class="btn-admin btn-admin-o btn-admin-sm" onclick="insertTemplate()">📋 Insert Sample Template</button>
                </div>
                <div id="fullDescPreview" style="display:none; margin-top:14px; padding:18px 22px; background:#FAF7F3; border:1px solid var(--border); border-radius:10px">
                    <div style="font-size:11px; font-weight:600; color:var(--muted); text-transform:uppercase; letter-spacing:.5px; margin-bottom:10px">Preview</div>
                    <div id="fullDescPreviewBody" class="sdc-full-preview"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Featured Image File</label>
                    <input type="file" name="Image">
                </div>
                <div class="form-group">
                    <label>Image Alt Text</label>
                    <input name="AltImage" placeholder="e.g. Pt Dhiraj Baluni performing pooja" value="{{ old('AltImage') }}">
                </div>
            </div>

            <div class="form-group">
                <label>SEO Tags (HTML meta tags & schema script)</label>
                <textarea name="SeoTags" rows="12" style="font-family:monospace; font-size:13px; line-height:1.5; min-height:240px">{{ old('SeoTags', $defaultSeoTemplate) }}</textarea>
            </div>

            <div class="form-row" style="margin-bottom:24px">
                <div class="form-group toggle-container">
                    <label class="toggle-switch">
                        <input type="checkbox" name="IsActive" value="1" checked>
                        <span class="slider"></span>
                    </label>
                    <span style="font-size:13px; font-weight:500">Service is Active (Visible on site)</span>
                </div>
                
                <div class="form-group toggle-container">
                    <label class="toggle-switch">
                        <input type="checkbox" name="ShowOnHome" value="1">
                        <span class="slider"></span>
                    </label>
                    <span style="font-size:13px; font-weight:500">Show on Home Page Tiles</span>
                </div>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px">Save Service Details</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePreview() {
            const editor = document.getElementById("fullDescEditor");
            const previewContainer = document.getElementById("fullDescPreview");
            const previewBody = document.getElementById("fullDescPreviewBody");
            const toggleBtn = document.getElementById("togglePreviewBtn");

            const isShowing = previewContainer.style.display === "block";

            if (isShowing) {
                previewContainer.style.display = "none";
                toggleBtn.textContent = "👁 Show Preview";
            } else {
                previewBody.innerHTML = editor.value || "<p><em>No description text written.</em></p>";
                previewContainer.style.display = "block";
                toggleBtn.textContent = "👁 Hide Preview";
            }
        }

        function insertTemplate() {
            const editor = document.getElementById("fullDescEditor");
            const template = `<h4>Vedic Significance</h4>
<p>ज्योतिष शास्त्र में इसका विशेष महत्व माना गया है। This service balances celestial energies to align your planetary charts for peace and growth.</p>

<h4>Benefits of this Consultation</h4>
<ul>
  <li><strong>Detailed Chart Reading:</strong> Comprehensive analysis of main houses.</li>
  <li><strong>Remedial Solutions:</strong> Authentic stone therapy, mantra and simple pooja recommendations.</li>
  <li><strong>Life Path Clarity:</strong> Clear guidance on timings for major decisions.</li>
</ul>

<h4>How it Works</h4>
<ol>
  <li>Provide your full birth details (Date, Time, and City of Birth).</li>
  <li>Our team performs preliminary chart studies.</li>
  <li>Interactive consultation session (Online video call or In-person).</li>
</ol>`;
            editor.value = template;
        }
    </script>
@endpush
