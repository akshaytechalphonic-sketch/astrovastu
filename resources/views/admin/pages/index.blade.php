@extends('layouts.admin')

@section('title', 'Pages')

@section('content')
    <div class="page-header">
        <h1>📄 Dynamic Pages</h1>
        <a href="{{ route('admin.pages.create') }}" class="btn-admin btn-admin-p">+ Create Page</a>
    </div>

    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:12px; border-radius:6px; margin-bottom:20px; border:1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Public URL</th>
                    <th>Sections</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $p)
                    <tr>
                        <td><strong>{{ $p->title }}</strong></td>
                        <td><code>{{ $p->slug }}</code></td>
                        <td>
                            <a href="{{ route('pages.show', ['slug' => $p->slug]) }}" target="_blank" style="color:var(--saffron-deep); text-decoration:underline;">
                                /{{ $p->slug }} 🌐
                            </a>
                        </td>
                        <td>
                            <span style="display:inline-block; padding:4px 8px; border-radius:4px; font-size:11px; font-weight:600; background:var(--saffron-mist); color:var(--saffron-deep);">
                                {{ $p->sections()->count() }} sections
                            </span>
                        </td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.pages.edit', ['id' => $p->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">Edit / Sections</a>
                                {{-- <form action="{{ route('admin.pages.destroy', ['id' => $p->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page and all its sections?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">Delete</button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:30px; color:var(--w500);">
                            No dynamic landing pages created yet. Click "+ Create Page" to get started.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
