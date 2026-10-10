
@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Gallery</h2>
            <p class="text-muted mb-0">Manage the images shown on your cafe gallery.</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-dark">
            <i class="fa-solid fa-plus me-1"></i> Add image
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">#</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gallery as $item)
                        <tr>
                            <td class="px-4">{{ $gallery->firstItem() + $loop->index }}</td>
                            <td>
                                <img src="{{ asset('uploads/gallery/' . $item->image) }}" alt="Gallery image {{ $item->id }}" width="80" height="56" style="object-fit: cover; border-radius: 6px;">
                            </td>
                            <td>
                                <span class="badge {{ $item->status === 'published' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" title="Edit image" aria-label="Edit image">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this gallery image?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete image" aria-label="Delete image">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="fa-regular fa-image fs-1 text-muted"></i>
                                <h5 class="mt-3">No gallery images yet</h5>
                                <a href="{{ route('admin.gallery.create') }}" class="btn btn-dark">Add the first image</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($gallery->hasPages())
            <div class="card-footer">{{ $gallery->links() }}</div>
        @endif
    </div>
</div>
@endsection

