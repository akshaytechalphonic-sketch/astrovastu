@extends('layouts.admin')

@section('title', 'Create Page')

@section('content')
    <div class="page-header">
        <h1>📄 Create Dynamic Page</h1>
        <a href="{{ route('admin.pages.index') }}" class="btn-admin btn-admin-o">Back to Pages</a>
    </div>

    @if($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:12px; border-radius:6px; margin-bottom:20px; border:1px solid #f5c6cb;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form action="{{ route('admin.pages.store') }}" method="POST" style="display:flex; flex-direction:column; gap:20px;">
            @csrf

            <div class="form-group">
                <label>Page Title <span style="color:red">*</span></label>
                <input type="text" name="Title" id="pageTitle" placeholder="e.g. Special Diwali Pooja Offer" value="{{ old('Title') }}" required>
            </div>

            <div class="form-group">
                <label>URL Slug <span style="color:red">*</span></label>
                <input type="text" name="Slug" id="pageSlug" placeholder="e.g. diwali-pooja-offer" value="{{ old('Slug') }}" required>
                <span style="font-size:12px; color:var(--w500);">Public URL will be: <code>/{slug}</code></span>
            </div>

            <div class="form-group">
                <label>SEO Tags / Custom Meta (Optional)</label>
                <textarea name="SeoTags" placeholder="e.g. <meta name='description' content='diwali specials pooja...'>" rows="4" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;">{{ old('SeoTags') }}</textarea>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="align-self:flex-start; padding:12px 24px;">Create Page & Add Sections →</button>
        </form>
    </div>

    <script>
        // Automatic slug generator
        document.getElementById('pageTitle').addEventListener('input', function() {
            let title = this.value;
            let slug = title.toLowerCase()
                            .replace(/[^a-z0-9\s-]/g, '') // remove special characters
                            .replace(/\s+/g, '-')         // replace spaces with dashes
                            .replace(/-+/g, '-');         // remove multiple dashes
            document.getElementById('pageSlug').value = slug;
        });
    </script>
@endsection
