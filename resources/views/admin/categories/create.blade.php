@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
    <div class="page-header">
        <h1>📁 Create Service Category</h1>
        <a href="{{ route('admin.categories.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Categories</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label>Category Name <span style="color:var(--d)">*</span></label>
                    <input name="Name" required placeholder="e.g. Astrology" value="{{ old('Name') }}">
                </div>
                <div class="form-group">
                    <label>Hindi Name</label>
                    <input name="NameHindi" placeholder="e.g. ज्योतिष" value="{{ old('NameHindi') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Slug (URL identifier) — auto-generated if blank</label>
                    <input name="Slug" pattern="[a-z0-9\-]*" title="lowercase letters, numbers and dashes only" placeholder="e.g. astrology" value="{{ old('Slug') }}">
                </div>
                <div class="form-group" style="display:grid; grid-template-columns: 1fr 1fr; gap:16px">
                    <div>
                        <label>Icon Emoji <span style="color:var(--d)">*</span></label>
                        <input name="Icon" required placeholder="🔮" value="{{ old('Icon', '🔮') }}">
                    </div>
                    <div>
                        <label>Color Class <span style="color:var(--d)">*</span></label>
                        <select name="ColorClass" required>
                            <option value="saffron-mist" {{ old('ColorClass') == 'saffron-mist' ? 'selected' : '' }}>Saffron Mist</option>
                            <option value="teal-mist" {{ old('ColorClass', 'teal-mist') == 'teal-mist' ? 'selected' : '' }}>Teal Mist</option>
                            <option value="gold-pale" {{ old('ColorClass') == 'gold-pale' ? 'selected' : '' }}>Gold Pale</option>
                            <option value="maroon-mist" {{ old('ColorClass') == 'maroon-mist' ? 'selected' : '' }}>Maroon Mist</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Category Image File</label>
                    <input type="file" name="Image">
                </div>
                <div class="form-group">
                    <label>Image Alt Text</label>
                    <input name="AltImage" placeholder="e.g. Astrology Category Banner" value="{{ old('AltImage') }}">
                </div>
            </div>

            <div class="form-group">
                <label>SEO Tags (HTML meta tags & schema script)</label>
                <textarea name="SeoTags" rows="12" style="font-family:monospace; font-size:13px; line-height:1.5; min-height:240px">{{ old('SeoTags', $defaultSeoTemplate) }}</textarea>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px; margin-top:12px">Save Category</button>
        </form>
    </div>
@endsection
