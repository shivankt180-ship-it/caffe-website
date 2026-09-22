@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Table Bookings</h2>
            <p class="text-muted">Manage customer reservations</p>
        </div>

        <span class="badge bg-dark px-3 py-2">
            Total: {{ $bookings->count() }}
        </span>
    </div>

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

                            <td>{{ $booking->date }}</td>

                            <td>{{ $booking->time }}</td>

                            <td>
                                <span class="badge bg-light text-dark">
                                    {{ $booking->guests }}
                                </span>
                            </td>

                            <td>
                                @if($booking->status == 'confirmed')
                                    <span class="badge bg-success">
                                        Confirmed
                                    </span>
                                @elseif($booking->status == 'cancelled')
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
                                <button class="btn btn-sm btn-primary">
                                    View
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="9" class="text-center py-5">
                                No bookings found.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection