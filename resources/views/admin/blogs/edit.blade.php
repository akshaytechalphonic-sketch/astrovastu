@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
    <div class="page-header">
        <h1>📝 Edit Blog Post: {{ $post->title }}</h1>
        <a href="{{ route('admin.blogs.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Blog Posts</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.blogs.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                    <input name="Title" required placeholder="e.g. Unlocking Your Destiny: The Power of Astrology" value="{{ old('Title', $post->title) }}">
                </div>
                <div class="form-group">
                    <label>Category <span style="color:var(--d)">*</span></label>
                    <input name="Category" required placeholder="e.g. Astrology" value="{{ old('Category', $post->category) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Slug (URL identifier)</label>
                    <input name="Slug" required pattern="[a-z0-9\-]*" title="lowercase letters, numbers and dashes only" placeholder="e.g. unlocking-your-destiny" value="{{ old('Slug', $post->slug) }}">
                </div>
                <div class="form-group" style="display:grid; grid-template-columns: 1fr 1fr; gap:16px">
                    <div>
                        <label>Thumbnail Emoji</label>
                        <input name="ThumbIcon" placeholder="🔮" value="{{ old('ThumbIcon', $post->thumb_icon) }}">
                    </div>
                    <div>
                        <label>Thumbnail Gradient (comma-separated)</label>
                        <input name="ThumbGradient" placeholder="saffron-mist,gold-pale" value="{{ old('ThumbGradient', $post->thumb_gradient) }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Excerpt (Short summary) <span style="color:var(--d)">*</span></label>
                <input name="Excerpt" required placeholder="Short summary that appears in listings." value="{{ old('Excerpt', $post->excerpt) }}">
            </div>

            <div class="form-group">
                <label>Content (HTML format) <span style="color:var(--d)">*</span></label>
                <textarea name="Content" rows="15" placeholder="Write full HTML content here..." style="min-height:300px; font-family:monospace; font-size:13px; line-height:1.5">{{ old('Content', $post->content) }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Featured Image File</label>
                    <input type="file" name="Image">
                    @if($post->image)
                        <div style="margin-top:10px">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Preview" style="max-height:80px; border-radius:8px">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image Alt Text</label>
                    <input name="AltImage" placeholder="e.g. Horoscope analysis chart example" value="{{ old('AltImage', $post->alt_image) }}">
                </div>
            </div>

            <div class="form-group">
                <label>SEO Tags (HTML meta tags & schema script)</label>
                <textarea name="SeoTags" rows="12" style="font-family:monospace; font-size:13px; line-height:1.5; min-height:240px">{{ old('SeoTags', $post->seo_tags) }}</textarea>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px; margin-top:12px">Save Blog Post</button>
        </form>
    </div>
@endsection
