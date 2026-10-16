@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="page-header">
        <h1>⭐ Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-admin btn-admin-p">+ Add Testimonial</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Av</th>
                    <th>Client Name</th>
                    <th>Location</th>
                    <th>Quote</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="testiTableBody">
                @forelse($testimonials as $t)
                    <tr>
                        <td>
                            @if($t->image)
                                <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->alt_image ?: $t->client_name }}" style="width:30px; height:30px; border-radius:50%; object-fit:cover">
                            @else
                                <div style="width:30px; height:30px; border-radius:50%; background:linear-gradient(135deg,var(--{{ $t->avatar_color ?: 'saffron' }}),var(--saffron-deep)); display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:600">
                                    {{ $t->initials }}
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $t->client_name }}</strong></td>
                        <td>{{ $t->location }}</td>
                        <td style="max-width:300px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; font-style:italic">"{{ $t->quote }}"</td>
                        <td style="color:var(--p)">{{ str_repeat('★', $t->rating) }}</td>
                        <td>
                            <div style="display:flex; gap:6px">
                                <a href="{{ route('admin.testimonials.edit', ['id' => $t->id]) }}" class="btn-admin btn-admin-o btn-admin-sm">Edit</a>
                                <form action="{{ route('admin.testimonials.destroy', ['id' => $t->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-d btn-admin-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:var(--muted)">No testimonials found. Click "+ Add Testimonial" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
