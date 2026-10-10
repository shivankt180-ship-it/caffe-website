@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Table Bookings</h2>
            <p class="text-muted">Manage customer reservations</p>
        </div>

        <span class="badge bg-dark px-3 py-2">
            Total: {{ $bookingCount }}
        </span>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="GET" action="{{ route('admin.reservations.index') }}" class="row g-2 mb-3">
        <div class="col-md-5">
            <label class="visually-hidden" for="booking-search">Search bookings</label>
            <input id="booking-search" type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search name, email or phone">
        </div>
        <div class="col-md-3">
            <label class="visually-hidden" for="booking-status-filter">Filter by status</label>
            <select id="booking-status-filter" name="status" class="form-select">
                <option value="">All statuses</option>
                @foreach (['pending' => 'Pending', 'confirmed' => 'Confirmed', 'cancelled' => 'Cancelled'] as $statusValue => $statusLabel)
                    <option value="{{ $statusValue }}" @selected(request('status') === $statusValue)>{{ $statusLabel }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-dark" type="submit">Filter</button>
            <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline-secondary">Clear</a>
        </div>
    </form>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Guests</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                        <tr>

                            <td>{{ $booking->id }}</td>

                            <td>
                                <strong>{{ $booking->name }}</strong>
                            </td>

                            <td>{{ $booking->email }}</td>

                            <td>{{ $booking->phone }}</td>

                            <td>{{ $booking->date->format('d M Y') }}</td>

                            <td>{{ substr($booking->time, 0, 5) }}</td>

                            <td>
                                <span class="badge bg-light text-dark">
                                    {{ $booking->guests }} {{ $booking->guests === 1 ? 'guest' : 'guests' }}
                                </span>
                            </td>

                            <td>
                                @if($booking->status === 'confirmed')
                                    <span class="badge bg-success">
                                        Confirmed
                                    </span>
                                @elseif($booking->status === 'cancelled')
                                    <span class="badge bg-danger">
                                        Cancelled
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">
                                    <form action="{{ route('admin.reservations.status', $booking) }}" method="POST" class="d-flex gap-1">
                                        @csrf
                                        @method('PATCH')
                                        <label class="visually-hidden" for="booking-status-{{ $booking->id }}">Status for booking {{ $booking->id }}</label>
                                        <select id="booking-status-{{ $booking->id }}" name="status" class="form-select form-select-sm">
                                            @foreach (['pending' => 'Pending', 'confirmed' => 'Confirmed', 'cancelled' => 'Cancelled'] as $statusValue => $statusLabel)
                                                <option value="{{ $statusValue }}" @selected($booking->status === $statusValue)>{{ $statusLabel }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                    </form>
                                    <form action="{{ route('admin.reservations.destroy', $booking) }}" method="POST" onsubmit="return confirm('Delete this booking?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="9" class="text-center py-5">
                                No bookings match your filters.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-3">
        {{ $bookings->links() }}
    </div>

</div>

@endsection