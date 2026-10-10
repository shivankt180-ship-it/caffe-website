@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Welcome, {{ auth()->user()->name }}</h2>
            <p class="text-muted mb-0">Live overview of your café website</p>
        </div>
        <div class="text-muted d-none d-md-block">
            <i class="bi bi-calendar3"></i>
            {{ now()->format('l, d F Y') }}
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-2">
            <a href="{{ route('admin.reservations.index') }}" class="dashboard-card d-block h-100 text-decoration-none">
                <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
                <p class="text-muted mb-1">Bookings</p>
                <h3 class="fw-bold mb-1">{{ $reservationCount }}</h3>
                <small class="text-muted">{{ $pendingReservationCount }} pending</small>
            </a>
        </div>
        <div class="col-6 col-xl-2">
            <a href="{{ route('contacts') }}" class="dashboard-card d-block h-100 text-decoration-none">
                <div class="stat-icon"><i class="bi bi-envelope"></i></div>
                <p class="text-muted mb-1">Messages</p>
                <h3 class="fw-bold mb-1">{{ $contactCount }}</h3>
                <small class="text-muted">Contact enquiries</small>
            </a>
        </div>
        <div class="col-6 col-xl-2">
            <a href="{{ route('admin.blogs.index') }}" class="dashboard-card d-block h-100 text-decoration-none">
                <div class="stat-icon"><i class="bi bi-file-text"></i></div>
                <p class="text-muted mb-1">Blog posts</p>
                <h3 class="fw-bold mb-1">{{ $blogCount }}</h3>
                <small class="text-muted">{{ $publishedBlogCount }} published</small>
            </a>
        </div>
        <div class="col-6 col-xl-2">
            <a href="{{ route('admin.menue.index') }}" class="dashboard-card d-block h-100 text-decoration-none">
                <div class="stat-icon"><i class="bi bi-cup-hot"></i></div>
                <p class="text-muted mb-1">Menu items</p>
                <h3 class="fw-bold mb-1">{{ $menuCount }}</h3>
                <small class="text-muted">{{ $publishedMenuCount }} published</small>
            </a>
        </div>
        <div class="col-6 col-xl-2">
            <a href="{{ route('admin.gallery.index') }}" class="dashboard-card d-block h-100 text-decoration-none">
                <div class="stat-icon"><i class="bi bi-images"></i></div>
                <p class="text-muted mb-1">Gallery images</p>
                <h3 class="fw-bold mb-1">{{ $galleryCount }}</h3>
                <small class="text-muted">{{ $publishedGalleryCount }} published</small>
            </a>
        </div>
        <div class="col-6 col-xl-2">
            <div class="dashboard-card h-100">
                <div class="stat-icon"><i class="bi bi-people"></i></div>
                <p class="text-muted mb-1">Customer accounts</p>
                <h3 class="fw-bold mb-1">{{ $customerCount }}</h3>
                <small class="text-muted">Registered customers</small>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-4">
            <section class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Upcoming bookings</h5>
                    <a href="{{ route('admin.reservations.index') }}" class="view-link">View all</a>
                </div>
                @forelse ($upcomingReservations as $booking)
                    <div class="reservation-item">
                        <div>
                            <strong>{{ $booking->name }}</strong>
                            <small>{{ $booking->guests }} {{ $booking->guests === 1 ? 'guest' : 'guests' }} · {{ $booking->date->format('d M Y') }}</small>
                        </div>
                        <span>{{ substr($booking->time, 0, 5) }}</span>
                        <span class="status {{ $booking->status === 'confirmed' ? 'delivered' : 'preparing' }}">{{ ucfirst($booking->status) }}</span>
                    </div>
                @empty
                    <p class="text-muted mb-0">No upcoming bookings.</p>
                @endforelse
            </section>
        </div>

        <div class="col-xl-4">
            <section class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Recent messages</h5>
                    <a href="{{ route('contacts') }}" class="view-link">View all</a>
                </div>
                @forelse ($recentContacts as $contact)
                    <div class="border-bottom py-3">
                        <div class="d-flex justify-content-between gap-2">
                            <strong class="text-truncate">{{ $contact->name }}</strong>
                            <small class="text-muted flex-shrink-0">{{ $contact->created_at->format('d M') }}</small>
                        </div>
                        <div class="small text-muted">{{ $contact->subject }} · {{ $contact->email }}</div>
                        <p class="small mb-0 mt-1">{{ \Illuminate\Support\Str::limit($contact->message, 100) }}</p>
                    </div>
                @empty
                    <p class="text-muted mb-0">No contact messages yet.</p>
                @endforelse
            </section>
        </div>

        <div class="col-xl-4">
            <section class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Recent blog posts</h5>
                    <a href="{{ route('admin.blogs.index') }}" class="view-link">View all</a>
                </div>
                @forelse ($recentBlogs as $blog)
                    <div class="border-bottom py-3">
                        <div class="d-flex justify-content-between gap-2">
                            <strong class="text-truncate">{{ $blog->title }}</strong>
                            <span class="badge {{ $blog->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($blog->status) }}</span>
                        </div>
                        <small class="text-muted">{{ $blog->created_at->format('d M Y') }}</small>
                    </div>
                @empty
                    <p class="text-muted mb-0">No blog posts yet.</p>
                @endforelse
            </section>
        </div>
    </div>
</div>
@endsection
