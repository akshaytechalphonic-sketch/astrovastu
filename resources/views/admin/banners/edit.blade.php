@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
    <div class="page-header">
        <h1>🖼️ Edit Banner: {{ $banner->title }}</h1>
        <a href="{{ route('admin.banners.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Banners</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.banners.update', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div style="background:#FDF2F2; color:#7A1F1F; border:1px solid rgba(122,31,31,.2); padding:12px; border-radius:8px; font-size:13px; margin-bottom:20px">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label>Title <span style="color:var(--d)">*</span></label>
                <input name="Title" required placeholder="e.g. Vastu Shastra Banner" value="{{ old('Title', $banner->title) }}">
            </div>

            <div class="form-group"  >
                <label>Page Target <span style="color:var(--d)">*</span></label>
                <select name="PageSlug" required style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px;">
                    <option value="home" {{ old('PageSlug', $banner->page_slug) === 'home' ? 'selected' : '' }}>Home Page (Main Slider)</option>
                    <option value="about" {{ old('PageSlug', $banner->page_slug) === 'about' ? 'selected' : '' }}>About Page (Hero Background)</option>
                    <option value="services" {{ old('PageSlug', $banner->page_slug) === 'services' ? 'selected' : '' }}>Services Page (Hero Background)</option>
                    <option value="gallery" {{ old('PageSlug', $banner->page_slug) === 'gallery' ? 'selected' : '' }}>Gallery Page (Hero Background)</option>
                    <option value="blog" {{ old('PageSlug', $banner->page_slug) === 'blog' ? 'selected' : '' }}>Blog Page (Hero Background)</option>
                    <option value="consult" {{ old('PageSlug', $banner->page_slug) === 'consult' ? 'selected' : '' }}>Consultation Page (Hero Background)</option>
                    <option value="contact" {{ old('PageSlug', $banner->page_slug) === 'contact' ? 'selected' : '' }}>Contact Page (Hero Background)</option>
                    <option value="privacy-policy" {{ old('PageSlug', $banner->page_slug) === 'privacy-policy' ? 'selected' : '' }}>Privacy Policy Page (Hero Background)</option>
                    <option value="terms-and-conditions" {{ old('PageSlug', $banner->page_slug) === 'terms-and-conditions' ? 'selected' : '' }}>Terms & Conditions Page (Hero Background)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Overlay Heading (Optional - shown on slide text overlay)</label>
                <input name="Heading" placeholder="e.g. Discover Your True Destiny" value="{{ old('Heading', $banner->heading) }}">
            </div>

            <div class="form-group">
                <label>Overlay Description (Optional - shown on slide text overlay)</label>
                <textarea name="Description" placeholder="e.g. Pt Dhiraj Baluni offers expert guidance on your Kundli matching..." rows="3" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;">{{ old('Description', $banner->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Link URL (Redirection path on click)</label>
                <input name="LinkUrl" placeholder="e.g. services.html?category=vastu" value="{{ old('LinkUrl', $banner->link_url) }}">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Banner Image File</label>
                    <input type="file" name="Image">
                    <div style="margin-top:10px">
                        <img src="{{ asset($banner->image_url) }}" alt="Preview" style="max-height:80px; border-radius:4px">
                    </div>
                </div>
                <div class="form-group">
                    <label>Image Alt Text</label>
                    <input name="AltImage" placeholder="e.g. Pt Dhiraj Baluni Vastu advice" value="{{ old('AltImage', $banner->alt_image) }}">
                </div>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px; margin-top:12px">Save Banner</button>
        </form>
    </div>
@endsection
