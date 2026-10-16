@extends('layouts.admin')

@section('title', 'Create Gallery Item')

@section('content')
    <div class="page-header">
        <h1>🖼️ Create Gallery Item</h1>
        <a href="{{ route('admin.gallery.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Gallery</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                    <input name="Title" required placeholder="e.g. Rudra Abhishek Ceremony" value="{{ old('Title') }}">
                </div>
                <div class="form-group">
                    <label>Category <span style="color:var(--d)">*</span></label>
                    <input name="Category" required placeholder="e.g. Pooja" value="{{ old('Category') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Icon Emoji (Fallback if image is missing)</label>
                    <input name="Icon" placeholder="🔔" value="{{ old('Icon', '🙏') }}">
                </div>
                <div class="form-group">
                    <label>Gradient Colors Fallback (comma-separated)</label>
                    <input name="GradientColors" placeholder="saffron-mist,teal-mist" value="{{ old('GradientColors', 'saffron-mist,teal-mist') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Gallery Image File</label>
                    <input type="file" name="Image">
                </div>
                <div class="form-group">
                    <label>Image Alt Text</label>
                    <input name="AltImage" placeholder="e.g. Rudra Abhishek performed by Pt Dhiraj Baluni" value="{{ old('AltImage') }}">
                </div>
            </div>

            <div class="form-group">
                <label>SEO Tags (HTML meta tags & schema script)</label>
                <textarea name="SeoTags" rows="8" style="font-family:monospace; font-size:13px; line-height:1.5; min-height:160px">{{ old('SeoTags', $defaultSeoTemplate) }}</textarea>
            </div>

            <div class="form-group toggle-container" style="margin-bottom:24px">
                <label class="toggle-switch">
                    <input type="checkbox" name="IsSpan2" value="1">
                    <span class="slider"></span>
                </label>
                <span style="font-size:13px; font-weight:500">Span 2 (Renders double width in gallery grid)</span>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px">Save Gallery Item</button>
        </form>
    </div>
@endsection
