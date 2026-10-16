@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1>📊 Dashboard</h1>
        <a href="{{ route('home') }}" target="_blank" class="btn-admin btn-admin-o btn-admin-sm">🌐 View Live Site</a>
    </div>

    <div class="stat-grid">
        <div class="stat-card highlight">
            <div class="num" id="statNewInquiries">{{ $newInquiriesCount }}</div>
            <div class="label">New Inquiries</div>
        </div>
        <div class="stat-card">
            <div class="num" id="statTotalInquiries">{{ $totalInquiriesCount }}</div>
            <div class="label">Total Inquiries</div>
        </div>
        <div class="stat-card">
            <div class="num" id="statServices">{{ $servicesCount }}</div>
            <div class="label">Services</div>
        </div>
        <div class="stat-card">
            <div class="num" id="statBlogs">{{ $blogsCount }}</div>
            <div class="label">Blog Posts</div>
        </div>
        <div class="stat-card">
            <div class="num" id="statTestimonials">{{ $testimonialsCount }}</div>
            <div class="label">Testimonials</div>
        </div>
        <div class="stat-card">
            <div class="num" id="statGallery">{{ $galleryCount }}</div>
            <div class="label">Gallery Items</div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Recent Inquiries</h2>
            <a href="{{ route('admin.inquiries.index') }}" class="btn-admin btn-admin-o btn-admin-sm">View All →</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="inquiriesTableBody">
                @forelse($recentInquiries as $inq)
                    <tr>
                        <td><strong>{{ $inq->full_name }}</strong></td>
                        <td>{{ $inq->phone }}</td>
                        <td>{{ $inq->form_type }}</td>
                        <td>
                            @php
                                $statusClass = strtolower($inq->status);
                                if ($statusClass == 'inprogress') $statusClass = 'inprogress';
                            @endphp
                            <span class="badge badge-{{ $statusClass }}">{{ $inq->status }}</span>
                        </td>
                        <td>{{ $inq->created_at ? $inq->created_at->format('d M, Y') : '—' }}</td>
                        <td>
                            <a href="{{ route('admin.inquiries.show', ['id' => $inq->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:var(--muted)">No inquiries received yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
