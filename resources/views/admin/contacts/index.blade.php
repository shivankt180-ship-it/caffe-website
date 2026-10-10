


@extends('admin.layouts.admin')
@section('content')

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Contact Messages</h2>
            <p class="text-muted mb-0">Messages sent through the café contact form</p>
        </div>
        <span class="badge bg-dark px-3 py-2">Total: {{ $contacts->total() }}</span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                        <td>{{ $contact->phone ?: '—' }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td class="text-break" style="min-width: 240px">{{ $contact->message }}</td>
                        <td>{{ $contact->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">No contact messages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $contacts->links() }}</div>
</div>
@endsection