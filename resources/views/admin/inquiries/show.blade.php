@extends('layouts.admin')

@section('title', 'Inquiry Details')

@section('content')
    <div class="page-header">
        <h1 id="inquiryName">📋 Lead: {{ $inquiry->full_name }}</h1>
        <a href="{{ route('admin.inquiries.index') }}" class="btn-admin btn-admin-o btn-admin-sm">← Back to Inquiries</a>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px" id="detailsLayout">
        <div class="card">
            <h2 style="font-size:16px; margin-bottom:16px">Contact & Birth Details</h2>
            <div class="detail-row"><strong>Name:</strong> <span>{{ $inquiry->full_name }}</span></div>
            <div class="detail-row"><strong>Phone:</strong> <span>{{ $inquiry->phone }}</span></div>
            <div class="detail-row"><strong>Email:</strong> <span>{{ $inquiry->email ?: '—' }}</span></div>
            <div class="detail-row"><strong>Date of Birth:</strong> <span>{{ $inquiry->date_of_birth ? \Carbon\Carbon::parse($inquiry->date_of_birth)->format('d M, Y') : '—' }}</span></div>
            <div class="detail-row"><strong>Time of Birth:</strong> <span>{{ $inquiry->time_of_birth ?: '—' }}</span></div>
            <div class="detail-row"><strong>Gender:</strong> <span>{{ $inquiry->gender ?: '—' }}</span></div>
            <div class="detail-row"><strong>Language:</strong> <span>{{ $inquiry->language ?: '—' }}</span></div>
            <div class="detail-row"><strong>Birth Place:</strong> <span>{{ $inquiry->place_of_birth ?: '—' }}</span></div>
            <div class="detail-row"><strong>Form Type:</strong> <span>{{ $inquiry->form_type }}</span></div>
            <div class="detail-row"><strong>Created At:</strong> <span>{{ $inquiry->created_at ? $inquiry->created_at->toDayDateTimeString() : '—' }}</span></div>
            
            <p style="margin-top:16px; font-weight:600; color:var(--muted)">Concern / Question:</p>
            <p id="valConcern" style="background:var(--bg); padding:12px; border-radius:8px; margin-top:6px; font-size:13px; line-height:1.5; border:1px solid var(--border)">{{ $inquiry->concern ?: 'No concern specified.' }}</p>
        </div>

        <div class="card">
            <h2 style="font-size:16px; margin-bottom:16px">Status & Notes</h2>
            <form action="{{ route('admin.inquiries.status', ['id' => $inquiry->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Lead Status</label>
                    <select name="status">
                        <option value="New" {{ $inquiry->status == 'New' ? 'selected' : '' }}>New</option>
                        <option value="Contacted" {{ $inquiry->status == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="InProgress" {{ $inquiry->status == 'InProgress' ? 'selected' : '' }}>InProgress</option>
                        <option value="Closed" {{ $inquiry->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Admin Notes</label>
                    <textarea name="notes" placeholder="Add private notes about this lead...">{{ $inquiry->admin_notes }}</textarea>
                </div>
                <button type="submit" class="btn-admin btn-admin-p">Update Status</button>
            </form>
        </div>
    </div>
@endsection
