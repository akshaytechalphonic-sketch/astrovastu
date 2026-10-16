@extends('layouts.admin')

@section('title', 'Edit Page')

@section('content')
    <div class="page-header">
        <h1>📄 Edit Dynamic Page: {{ $page->title }}</h1>
        <div>
            <a href="{{ route('pages.show', ['slug' => $page->slug]) }}" target="_blank" class="btn-admin btn-admin-o" style="margin-right:8px;">View Page 🌐</a>
            <a href="{{ route('admin.pages.index') }}" class="btn-admin btn-admin-o">Back to Pages</a>
        </div>
    </div>

    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:12px; border-radius:6px; margin-bottom:20px; border:1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:12px; border-radius:6px; margin-bottom:20px; border:1px solid #f5c6cb;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pages.update', ['id' => $page->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Page Settings Card -->
        <div class="card" style="margin-bottom: 24px;">
            <h2 style="font-size:18px; font-weight:600; color:var(--temple); margin-bottom:18px; border-bottom:1px solid var(--w200); padding-bottom:8px;">Page Configurations</h2>
            
            <div class="form-group" style="margin-bottom:12px;">
                <label>Page Title <span style="color:red">*</span></label>
                <input type="text" name="Title" id="pageTitle" value="{{ old('Title', $page->title) }}" required>
            </div>

            <div class="form-group" style="margin-bottom:12px;">
                <label>URL Slug <span style="color:red">*</span></label>
                <input type="text" name="Slug" id="pageSlug" value="{{ old('Slug', $page->slug) }}" required>
                <span style="font-size:12px; color:var(--w500);">Public URL will be: <code>/{{ $page->slug }}</code></span>
            </div>

            <div class="form-group">
                <label>SEO Tags / Custom Meta (Optional)</label>
                <textarea name="SeoTags" placeholder="e.g. <meta name='description' content='diwali specials pooja...'>" rows="3" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;">{{ old('SeoTags', $page->seo_tags) }}</textarea>
            </div>
        </div>

        <!-- Dynamic Sections Builder Card -->
        <div class="page-header" style="margin-top: 32px; border-top: 1px solid var(--w200); padding-top: 24px; margin-bottom: 16px;">
            <h2>🧩 Page Sections Builder</h2>
            <button type="button" class="btn-admin btn-admin-p" id="addSectionBtn">+ Add New Section</button>
        </div>

        <div id="sectionsListContainer">
            @foreach($page->sections as $index => $section)
                <div class="card section-card" data-index="{{ $index }}" style="border-left: 4px solid var(--saffron); padding: 20px; margin-bottom: 20px; position: relative;">
                    <button type="button" class="btn-admin btn-admin-danger remove-section-btn" style="position: absolute; top: 12px; right: 12px; padding: 4px 8px; font-size: 11px;">Remove</button>
                    <h3 style="font-size: 15px; font-weight: 600; color: var(--temple); margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                        <span class="section-number">#{{ $index + 1 }}</span> Section Configuration
                    </h3>
                    
                    <input type="hidden" name="sections[{{ $index }}][id]" value="{{ $section->id }}">

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                        <div class="form-group">
                            <label>Section Type</label>
                            <select name="sections[{{ $index }}][type]" class="section-type-select" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; ">
                                <option value="hero" {{ $section->type === 'hero' ? 'selected' : '' }}>Hero Section (Title, Subtitle, Image & CTA)</option>
                                <option value="rich_text" {{ $section->type === 'rich_text' ? 'selected' : '' }}>Vedic Text Block (Heading + Description)</option>
                                <option value="features_three_col" {{ $section->type === 'features_three_col' ? 'selected' : '' }}>Three Columns Pillars/Values</option>
                                <option value="services_grid" {{ $section->type === 'services_grid' ? 'selected' : '' }}>Services Grid (Dynamic display)</option>
                                <option value="testimonials_slider" {{ $section->type === 'testimonials_slider' ? 'selected' : '' }}>Testimonials Slider (Dynamic display)</option>
                                <option value="contact_form" {{ $section->type === 'contact_form' ? 'selected' : '' }}>Consultation Booking Form (Dynamic display)</option>
                                <option value="about_legacy" {{ $section->type === 'about_legacy' ? 'selected' : '' }}>About Guruji Legacy (Title, Subtitle & Text with Left Image)</option>
                                <option value="about_credentials" {{ $section->type === 'about_credentials' ? 'selected' : '' }}>About Credentials Grid (Title, Subtitle & ICAS Grid)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sections[{{ $index }}][sort_order]" value="{{ $section->sort_order }}" class="section-sort-order" style="width:100%;">
                        </div>
                    </div>

                    <!-- Fields Group -->
                    <div class="section-fields-group">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;" class="field-row-title-sub">
                            <div class="form-group section-field-title">
                                <label>Section Title</label>
                                <input type="text" name="sections[{{ $index }}][title]" value="{{ $section->title }}" style="width:100%;">
                            </div>
                            <div class="form-group section-field-subtitle">
                                <label>Section Subtitle / Over-title</label>
                                <input type="text" name="sections[{{ $index }}][subtitle]" value="{{ $section->subtitle }}" style="width:100%;">
                            </div>
                        </div>

                        <div class="form-group section-field-content" style="margin-bottom: 12px;">
                            <label>Section Content / Text (HTML supported)</label>
                            <textarea name="sections[{{ $index }}][content]" rows="4" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;">{{ $section->content }}</textarea>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;" class="field-row-buttons">
                            <div class="form-group section-field-btn-text">
                                <label>Button Text (Optional)</label>
                                <input type="text" name="sections[{{ $index }}][button_text]" value="{{ $section->button_text }}" style="width:100%;">
                            </div>
                            <div class="form-group section-field-btn-link">
                                <label>Button Link URL (Optional)</label>
                                <input type="text" name="sections[{{ $index }}][button_link]" value="{{ $section->button_link }}" style="width:100%;">
                            </div>
                        </div>

                        <div class="form-group section-field-image" style="margin-bottom: 12px;">
                            <label>Section Image (Optional)</label>
                            <input type="file" name="sections[{{ $index }}][image]" style="width:100%; padding:4px;">
                            <input type="hidden" name="sections[{{ $index }}][existing_image_url]" value="{{ $section->image_url }}">
                            @if($section->image_url)
                                <div style="margin-top:10px;">
                                    <span style="font-size:12px; color:var(--w500); display:block; margin-bottom:4px;">Current image:</span>
                                    <img src="{{ asset($section->image_url) }}" alt="Preview" style="max-height:80px; border:1px solid var(--w200); border-radius:6px;">
                                </div>
                            @endif
                            <div style="margin-top: 10px;">
                                <label style="display:inline-block; font-size:12px; margin-bottom:4px;">Image Alignment (for Text Block)</label>
                                <select name="sections[{{ $index }}][image_position]" style="width:100%; padding:8px; border:1px solid var(--w300); border-radius:6px; ">
                                    <option value="center" {{ $section->image_position === 'center' ? 'selected' : '' }}>Center / Top (Default)</option>
                                    <option value="left" {{ $section->image_position === 'left' ? 'selected' : '' }}>Left Align (Text on Right)</option>
                                    <option value="right" {{ $section->image_position === 'right' ? 'selected' : '' }}>Right Align (Text on Left)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn-admin btn-admin-p" style="margin-top: 24px; padding: 14px 32px; font-size: 15px; font-weight: 600; box-shadow: 0 4px 15px rgba(212,135,46,0.3);">Save Dynamic Page & Sections ✓</button>
    </form>

    <!-- JS template for sections creator -->
    <script>
        let sectionCount = {{ $page->sections->count() }};

        document.getElementById('addSectionBtn').addEventListener('click', function() {
            let container = document.getElementById('sectionsListContainer');
            let index = sectionCount;
            
            let cardHtml = `
                <div class="card section-card" data-index="${index}" style="border-left: 4px solid var(--saffron); padding: 20px; margin-bottom: 20px; position: relative; animation: fadeUp 0.3s ease-out;">
                    <button type="button" class="btn-admin btn-admin-danger remove-section-btn" style="position: absolute; top: 12px; right: 12px; padding: 4px 8px; font-size: 11px;">Remove</button>
                    <h3 style="font-size: 15px; font-weight: 600; color: var(--temple); margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                        <span class="section-number">#${index + 1}</span> Section Configuration
                    </h3>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                        <div class="form-group">
                            <label>Section Type</label>
                            <select name="sections[${index}][type]" class="section-type-select" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px;">
                                <option value="hero">Hero Section (Title, Subtitle, Image & CTA)</option>
                                <option value="rich_text">Vedic Text Block (Heading + Description)</option>
                                <option value="features_three_col">Three Columns Pillars/Values</option>
                                <option value="services_grid">Services Grid (Dynamic display)</option>
                                <option value="testimonials_slider">Testimonials Slider (Dynamic display)</option>
                                <option value="contact_form">Consultation Booking Form (Dynamic display)</option>
                                <option value="about_legacy">About Guruji Legacy (Title, Subtitle & Text with Left Image)</option>
                                <option value="about_credentials">About Credentials Grid (Title, Subtitle & ICAS Grid)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sections[${index}][sort_order]" value="${index}" class="section-sort-order" style="width:100%;">
                        </div>
                    </div>

                    <!-- Fields Group -->
                    <div class="section-fields-group">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;" class="field-row-title-sub">
                            <div class="form-group section-field-title">
                                <label>Section Title</label>
                                <input type="text" name="sections[${index}][title]" value="" style="width:100%;">
                            </div>
                            <div class="form-group section-field-subtitle">
                                <label>Section Subtitle / Over-title</label>
                                <input type="text" name="sections[${index}][subtitle]" value="" style="width:100%;">
                            </div>
                        </div>

                        <div class="form-group section-field-content" style="margin-bottom: 12px;">
                            <label>Section Content / Text (HTML supported)</label>
                            <textarea name="sections[${index}][content]" rows="4" style="width:100%; padding:10px; border:1px solid var(--w300); border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;"></textarea>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;" class="field-row-buttons">
                            <div class="form-group section-field-btn-text">
                                <label>Button Text (Optional)</label>
                                <input type="text" name="sections[${index}][button_text]" value="" style="width:100%;">
                            </div>
                            <div class="form-group section-field-btn-link">
                                <label>Button Link URL (Optional)</label>
                                <input type="text" name="sections[${index}][button_link]" value="" style="width:100%;">
                            </div>
                        </div>

                        <div class="form-group section-field-image" style="margin-bottom: 12px;">
                            <label>Section Image (Optional)</label>
                            <input type="file" name="sections[${index}][image]" style="width:100%; padding:4px;">
                            <input type="hidden" name="sections[${index}][existing_image_url]" value="">
                            <div style="margin-top: 10px;">
                                <label style="display:inline-block; font-size:12px; margin-bottom:4px;">Image Alignment (for Text Block)</label>
                                <select name="sections[${index}][image_position]" style="width:100%; padding:8px; border:1px solid var(--w300); border-radius:6px; background:#fff;">
                                    <option value="center">Center / Top (Default)</option>
                                    <option value="left">Left Align (Text on Right)</option>
                                    <option value="right">Right Align (Text on Left)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', cardHtml);
            sectionCount++;
            bindSectionTypes();
        });

        // Delegate deletion logic
        document.getElementById('sectionsListContainer').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-section-btn')) {
                if(confirm('Are you sure you want to remove this section? It will be deleted permanently when you save.')) {
                    let card = e.target.closest('.section-card');
                    card.style.animation = "fadeUp 0.2s reverse ease-in";
                    setTimeout(() => {
                        card.remove();
                        reindexSections();
                    }, 200);
                }
            }
        });

        // Fix dynamic selection toggle logic based on selected type
        function bindSectionTypes() {
            document.querySelectorAll('.section-type-select').forEach(select => {
                select.removeEventListener('change', handleTypeToggle);
                select.addEventListener('change', handleTypeToggle);
                // Trigger once on init
                select.dispatchEvent(new Event('change'));
            });
        }

        function handleTypeToggle(e) {
            let select = e.target;
            let card = select.closest('.section-card');
            let type = select.value;
            
            let titleRow = card.querySelector('.field-row-title-sub');
            let contentRow = card.querySelector('.section-field-content');
            let buttonRow = card.querySelector('.field-row-buttons');
            let imageRow = card.querySelector('.section-field-image');

            // Hide/Show fields depending on type
            if (type === 'hero' || type === 'rich_text' || type === 'about_legacy') {
                titleRow.style.display = 'grid';
                contentRow.style.display = 'block';
                buttonRow.style.display = (type === 'about_legacy') ? 'none' : 'grid';
                imageRow.style.display = 'block';
            } else if (type === 'features_three_col' || type === 'about_credentials') {
                titleRow.style.display = 'grid';
                contentRow.style.display = (type === 'about_credentials') ? 'block' : 'none';
                buttonRow.style.display = 'none';
                imageRow.style.display = 'none';
            } else if (type === 'services_grid' || type === 'testimonials_slider' || type === 'contact_form') {
                // Dynamic widget triggers: only title and subtitle are optional headers, other fields can be hidden
                titleRow.style.display = 'grid';
                contentRow.style.display = 'none';
                buttonRow.style.display = 'none';
                imageRow.style.display = 'none';
            }
        }

        function reindexSections() {
            document.querySelectorAll('.section-card').forEach((card, idx) => {
                card.querySelector('.section-number').innerText = `#${idx + 1}`;
            });
        }

        // Automatic slug generator
        document.getElementById('pageTitle').addEventListener('input', function() {
            let title = this.value;
            let slug = title.toLowerCase()
                            .replace(/[^a-z0-9\s-]/g, '') // remove special characters
                            .replace(/\s+/g, '-')         // replace spaces with dashes
                            .replace(/-+/g, '-');         // remove multiple dashes
            document.getElementById('pageSlug').value = slug;
        });

        // Initialize bindings
        bindSectionTypes();
    </script>
@endsection
