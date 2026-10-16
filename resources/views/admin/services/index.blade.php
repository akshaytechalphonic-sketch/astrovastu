@extends('layouts.admin')

@section('title', 'Services')

@section('content')
    <div class="page-header">
        <h1>🔮 Services</h1>
        <a href="{{ route('admin.services.create') }}" class="btn-admin btn-admin-p">+ Add Service</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Hindi</th>
                    <th>Category</th>
                    <th>Active</th>
                    <th>Home</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="servicesTableBody">
                @forelse($services as $s)
                    <tr>
                        <td style="font-size:20px">{{ $s->icon }}</td>
                        <td><strong>{{ $s->title }}</strong></td>
                        <td>{{ $s->title_hindi ?: '—' }}</td>
                        <td>{{ $s->category->name ?? 'Unknown' }}</td>
                        <td>
                            <span class="badge {{ $s->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $s->is_active ? 'Active' : 'Off' }}
                            </span>
                        </td>
                        <td>{{ $s->show_on_home ? '🏠' : '—' }}</td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.services.edit', ['id' => $s->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">Edit</a>
                                <form action="{{ route('admin.services.destroy', ['id' => $s->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-d btn-admin-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center; color:var(--muted)">No services found. Click "+ Add Service" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
