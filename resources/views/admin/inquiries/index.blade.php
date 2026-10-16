@extends('layouts.admin')

@section('title', 'Inquiries')

@section('content')
    <div class="page-header">
        <h1>📋 Inquiries / Leads</h1>
        <div style="display:flex; gap:6px" id="filterContainer">
            <a href="{{ route('admin.inquiries.index', ['status' => 'all']) }}" class="btn-admin btn-admin-o btn-admin-sm {{ $statusFilter === 'all' ? 'btn-admin-p' : '' }}">All</a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'New']) }}" class="btn-admin btn-admin-o btn-admin-sm {{ $statusFilter === 'New' ? 'btn-admin-p' : '' }}">New</a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'Contacted']) }}" class="btn-admin btn-admin-o btn-admin-sm {{ $statusFilter === 'Contacted' ? 'btn-admin-p' : '' }}">Contacted</a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'InProgress']) }}" class="btn-admin btn-admin-o btn-admin-sm {{ $statusFilter === 'InProgress' ? 'btn-admin-p' : '' }}">InProgress</a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'Closed']) }}" class="btn-admin btn-admin-o btn-admin-sm {{ $statusFilter === 'Closed' ? 'btn-admin-p' : '' }}">Closed</a>
        </div>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Concern</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="inquiriesTableBody">
                @forelse($inquiries as $i)
                    <tr>
                        <td><strong>{{ $i->full_name }}</strong></td>
                        <td>{{ $i->phone }}</td>
                        <td>{{ $i->email ?: '—' }}</td>
                        <td>{{ $i->form_type }}</td>
                        <td style="max-width:200px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap">{{ $i->concern ?: '—' }}</td>
                        <td>
                            @php
                                $statusClass = strtolower($i->status);
                                if ($statusClass == 'inprogress') $statusClass = 'inprogress';
                            @endphp
                            <span class="badge badge-{{ $statusClass }}">{{ $i->status }}</span>
                        </td>
                        <td>{{ $i->created_at ? $i->created_at->format('d M, H:i') : '—' }}</td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.inquiries.show', ['id' => $i->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">View</a>
                                <form action="{{ route('admin.inquiries.destroy', ['id' => $i->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lead?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-d btn-admin-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center; color:var(--muted)">No inquiries matching filter "{{ $statusFilter }}".</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($inquiries->hasPages())
            <div style="margin-top:20px; display:flex; justify-content:center;">
                {{ $inquiries->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
