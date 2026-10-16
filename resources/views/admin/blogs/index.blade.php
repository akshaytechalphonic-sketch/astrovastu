@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
    <div class="page-header">
        <h1>📝 Blog Posts</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn-admin btn-admin-p">+ Add Blog Post</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Views</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="blogsTableBody">
                @forelse($posts as $b)
                    <tr>
                        <td style="font-size:20px">{{ $b->thumb_icon ?: '🔮' }}</td>
                        <td><strong>{{ $b->title }}</strong></td>
                        <td>{{ $b->category }}</td>
                        <td>{{ $b->published_at ? $b->published_at->format('d M, Y') : '—' }}</td>
                        <td>{{ $b->view_count }} views</td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.blogs.edit', ['id' => $b->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">Edit</a>
                                <form action="{{ route('admin.blogs.destroy', ['id' => $b->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-d btn-admin-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:var(--muted)">No blog posts found. Click "+ Add Blog Post" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
