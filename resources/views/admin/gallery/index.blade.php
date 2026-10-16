@extends('layouts.admin')

@section('title', 'Gallery Items')

@section('content')
    <div class="page-header">
        <h1>🖼️ Gallery Items</h1>
        <a href="{{ route('admin.gallery.create') }}" class="btn-admin btn-admin-p">+ Add Gallery Item</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Display</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Gradients</th>
                    <th>Span Size</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="galleryTableBody">
                @forelse($galleryItems as $g)
                    <tr>
                        <td>
                            @if($g->image)
                                <img src="{{ asset('storage/' . $g->image) }}" alt="{{ $g->alt_image ?: $g->title }}" style="max-height:40px; border-radius:4px">
                            @else
                                <span style="font-size:24px">{{ $g->icon }}</span>
                            @endif
                        </td>
                        <td><strong>{{ $g->title }}</strong></td>
                        <td>{{ $g->category }}</td>
                        <td><code>{{ $g->gradient_colors }}</code></td>
                        <td>{{ $g->is_span2 ? 'Span 2 (Large)' : 'Normal' }}</td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.gallery.edit', ['id' => $g->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">Edit</a>
                                <form action="{{ route('admin.gallery.destroy', ['id' => $g->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this gallery item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-d btn-admin-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:var(--muted)">No gallery items found. Click "+ Add Gallery Item" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
