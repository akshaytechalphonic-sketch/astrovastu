@extends('layouts.admin')

@section('title', 'Banners')

@section('content')
    <div class="page-header">
        <h1>🖼️ Banners</h1>
        <a href="{{ route('admin.banners.create') }}" class="btn-admin btn-admin-p">+ Add Banner</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Page Target</th>
                    <th>Link URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="bannersTableBody">
                @forelse($banners as $b)
                    <tr>
                        <td>
                            <img src="{{ asset($b->image_url) }}" alt="{{ $b->alt_image ?: $b->title }}" style="max-height:60px; border-radius:4px">
                        </td>
                        <td><strong>{{ $b->title }}</strong></td>
                        <td>
                            <span style="display:inline-block; padding:4px 8px; border-radius:4px; font-size:11px; font-weight:600; text-transform:uppercase; background:rgba(0,0,0,0.05); color:#333;">
                                @if($b->page_slug === 'home')
                                    Home Page (Slider)
                                @elseif($b->page_slug === 'about')
                                    About Page
                                @elseif($b->page_slug === 'services')
                                    Services Page
                                @elseif($b->page_slug === 'gallery')
                                    Gallery Page
                                @elseif($b->page_slug === 'blog')
                                    Blog Page
                                @elseif($b->page_slug === 'consult')
                                    Consultation Page
                                @elseif($b->page_slug === 'contact')
                                    Contact Page
                                @elseif($b->page_slug === 'privacy-policy')
                                    Privacy Policy
                                @elseif($b->page_slug === 'terms-and-conditions')
                                    Terms & Conditions
                                @else
                                    {{ $b->page_slug }}
                                @endif
                            </span>
                        </td>
                        <td><code>{{ $b->link_url ?: '—' }}</code></td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.banners.edit', ['id' => $b->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">Edit</a>
                                <form action="{{ route('admin.banners.destroy', ['id' => $b->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-d btn-admin-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; color:var(--muted)">No banners found. Click "+ Add Banner" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
