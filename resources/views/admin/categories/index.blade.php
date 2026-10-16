@extends('layouts.admin')

@section('title', 'Service Categories')

@section('content')
    <div class="page-header">
        <h1>📁 Service Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn-admin btn-admin-p">+ Add Category</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Hindi Name</th>
                    <th>Slug</th>
                    <th>Color Class</th>
                    <th>Services Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="categoriesTableBody">
                @forelse($categories as $cat)
                    <tr>
                        <td>
                            @if($cat->image)
                                <img src="{{ asset('storage/' . $cat->image) }}" alt="Icon" style="width:36px; height:36px; border-radius:6px; object-fit:cover;">
                            @else
                                <span style="font-size:20px">{{ $cat->icon }}</span>
                            @endif
                        </td>
                        <td><strong>{{ $cat->name }}</strong></td>
                        <td>{{ $cat->name_hindi ?: '—' }}</td>
                        <td><code>{{ $cat->slug }}</code></td>
                        <td><span style="font-size:12px;background:var(--{{ $cat->color_class }});padding:3px 8px;border-radius:4px;color:var(--text)">{{ $cat->color_class }}</span></td>
                        <td>{{ $cat->services->count() }}</td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.categories.edit', ['id' => $cat->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">Edit</a>
                                <form action="{{ route('admin.categories.destroy', ['id' => $cat->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-d btn-admin-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center; color:var(--muted)">No service categories found. Click "+ Add Category" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
