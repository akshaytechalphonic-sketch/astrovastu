@extends('layouts.admin')

@section('title', 'Create Banner')

@section('content')
    <div class="page-header">
        <h1>🖼️ Create Banner</h1>
        <a href="{{ route('admin.banners.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Banners</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div style="background:#FDF2F2; color:#7A1F1F; border:1px solid rgba(122,31,31,.2); padding:12px; border-radius:8px; font-size:13px; margin-bottom:20px">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label>Title <span style="color:var(--d)">*</span></label>
                <input name="Title" required placeholder="e.g. Vastu Shastra Banner" value="{{ old('Title') }}">
            </div>

            <div class="form-group">
                <label>Page Target <span style="color:var(--d)">*</span></label>
                <select name="PageSlug" required style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; ">
                    <option value="home" {{ old('PageSlug') === 'home' ? 'selected' : '' }}>Home Page (Main Slider)</option>
                    <option value="about" {{ old('PageSlug') === 'about' ? 'selected' : '' }}>About Page (Hero Background)</option>
                    <option value="services" {{ old('PageSlug') === 'services' ? 'selected' : '' }}>Services Page (Hero Background)</option>
                    <option value="gallery" {{ old('PageSlug') === 'gallery' ? 'selected' : '' }}>Gallery Page (Hero Background)</option>
                    <option value="blog" {{ old('PageSlug') === 'blog' ? 'selected' : '' }}>Blog Page (Hero Background)</option>
                    <option value="consult" {{ old('PageSlug') === 'consult' ? 'selected' : '' }}>Consultation Page (Hero Background)</option>
                    <option value="contact" {{ old('PageSlug') === 'contact' ? 'selected' : '' }}>Contact Page (Hero Background)</option>
                    <option value="privacy-policy" {{ old('PageSlug') === 'privacy-policy' ? 'selected' : '' }}>Privacy Policy Page (Hero Background)</option>
                    <option value="terms-and-conditions" {{ old('PageSlug') === 'terms-and-conditions' ? 'selected' : '' }}>Terms & Conditions Page (Hero Background)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Overlay Heading (Optional - shown on slide text overlay)</label>
                <input name="Heading" placeholder="e.g. Discover Your True Destiny" value="{{ old('Heading') }}">
            </div>

            <div class="form-group">
                <label>Overlay Description (Optional - shown on slide text overlay)</label>
                <textarea name="Description" placeholder="e.g. Pt Dhiraj Baluni offers expert guidance on your Kundli matching..." rows="3" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;">{{ old('Description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Link URL (Redirection path on click)</label>
                <input name="LinkUrl" placeholder="e.g. services.html?category=vastu" value="{{ old('LinkUrl') }}">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Banner Image File <span style="color:var(--d)">*</span></label>
                    <input type="file" name="Image" required>
                </div>
                <div class="form-group">
                    <label>Image Alt Text</label>
                    <input name="AltImage" placeholder="e.g. Pt Dhiraj Baluni Vastu advice" value="{{ old('AltImage') }}">
                </div>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px; margin-top:12px">Save Banner</button>
        </form>
    </div>
@endsection
