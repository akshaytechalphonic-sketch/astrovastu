@extends('layouts.admin')

@section('title', 'Create Testimonial')

@section('content')
    <div class="page-header">
        <h1>⭐ Create Testimonial</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Testimonials</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label>Client Name <span style="color:var(--d)">*</span></label>
                    <input name="ClientName" required placeholder="e.g. Ram Sharma" value="{{ old('ClientName') }}">
                </div>
                <div class="form-group">
                    <label>Location <span style="color:var(--d)">*</span></label>
                    <input name="Location" required placeholder="e.g. Noida, India" value="{{ old('Location') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Initials (Avatar letters, max 4) <span style="color:var(--d)">*</span></label>
                    <input name="Initials" required placeholder="e.g. RS" maxlength="4" value="{{ old('Initials') }}">
                </div>
                <div class="form-group">
                    <label>Avatar Color (saffron, teal, maroon) <span style="color:var(--d)">*</span></label>
                    <select name="AvatarColor" required>
                        <option value="saffron" {{ old('AvatarColor') == 'saffron' ? 'selected' : '' }}>Saffron</option>
                        <option value="teal" {{ old('AvatarColor') == 'teal' ? 'selected' : '' }}>Teal</option>
                        <option value="maroon" {{ old('AvatarColor') == 'maroon' ? 'selected' : '' }}>Maroon</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Rating (1 to 5 Stars) <span style="color:var(--d)">*</span></label>
                    <select name="Rating" required>
                        <option value="5" {{ old('Rating') == '5' ? 'selected' : '' }}>5 Stars</option>
                        <option value="4" {{ old('Rating') == '4' ? 'selected' : '' }}>4 Stars</option>
                        <option value="3" {{ old('Rating') == '3' ? 'selected' : '' }}>3 Stars</option>
                        <option value="2" {{ old('Rating') == '2' ? 'selected' : '' }}>2 Stars</option>
                        <option value="1" {{ old('Rating') == '1' ? 'selected' : '' }}>1 Star</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Client Photo File (Optional)</label>
                    <input type="file" name="Image">
                </div>
            </div>

            <div class="form-group">
                <label>Photo Alt Text</label>
                <input name="AltImage" placeholder="e.g. Ram Sharma" value="{{ old('AltImage') }}">
            </div>

            <div class="form-group">
                <label>Quote (Review Message) <span style="color:var(--d)">*</span></label>
                <textarea name="Quote" required placeholder="Write review message here..." style="min-height:140px">{{ old('Quote') }}</textarea>
            </div>

            <button type="submit" class="btn-admin btn-admin-p" style="padding:12px 30px; font-size:14px; margin-top:12px">Save Testimonial</button>
        </form>
    </div>
@endsection
