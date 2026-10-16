@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="page-header">
        <h1>⭐ Edit Testimonial: {{ $testimonial->client_name }}</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Testimonials</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.testimonials.update', ['id' => $testimonial->id]) }}" method="POST" enctype="multipart/form-data">
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
                    <label>Client Name <span style="color:var(--d)">*</span></label>
                    <input name="ClientName" required placeholder="e.g. Ram Sharma" value="{{ old('ClientName', $testimonial->client_name) }}">
                </div>
                <div class="form-group">
                    <label>Location <span style="color:var(--d)">*</span></label>
                    <input name="Location" required placeholder="e.g. Noida, India" value="{{ old('Location', $testimonial->location) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Initials (Avatar letters, max 4) <span style="color:var(--d)">*</span></label>
                    <input name="Initials" required placeholder="e.g. RS" maxlength="4" value="{{ old('Initials', $testimonial->initials) }}">
                </div>
                <div class="form-group">
                    <label>Avatar Color (saffron, teal, maroon) <span style="color:var(--d)">*</span></label>
                    <select name="AvatarColor" required>
                        <option value="saffron" {{ old('AvatarColor', $testimonial->avatar_color) == 'saffron' ? 'selected' : '' }}>Saffron</option>
                        <option value="teal" {{ old('AvatarColor', $testimonial->avatar_color) == 'teal' ? 'selected' : '' }}>Teal</option>
                        <option value="maroon" {{ old('AvatarColor', $testimonial->avatar_color) == 'maroon' ? 'selected' : '' }}>Maroon</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Rating (1 to 5 Stars) <span style="color:var(--d)">*</span></label>
                    <select name="Rating" required>
                        <option value="5" {{ old('Rating', $testimonial->rating) == '5' ? 'selected' : '' }}>5 Stars</option>
                        <option value="4" {{ old('Rating', $testimonial->rating) == '4' ? 'selected' : '' }}>4 Stars</option>
                        <option value="3" {{ old('Rating', $testimonial->rating) == '3' ? 'selected' : '' }}>3 Stars</option>
                        <option value="2" {{ old('Rating', $testimonial->rating) == '2' ? 'selected' : '' }}>2 Stars</option>
                        <option value="1" {{ old('Rating', $testimonial->rating) == '1' ? 'selected' : '' }}>1 Star</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Client Photo File (Optional)</label>
                    <input type="file" name="Image">
                    @if($testimonial->image)
                        <div style="margin-top:10px">
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Preview" style="max-height:80px; border-radius:8px">
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label>Photo Alt Text</label>
                <input name="AltImage" placeholder="e.g. Ram Sharma" value="{{ old('AltImage', $testimonial->alt_image) }}">
            </div>

            <div class="form-group">
                <label>Quote (Review Message) <span style="color:var(--d)">*</span></label>
                <textarea name="Quote" required placeholder="Write review message here..." style="min-height:140px">{{ old('Quote', $testimonial->quote) }}</textarea>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px; margin-top:12px">Save Testimonial</button>
        </form>
    </div>
@endsection
