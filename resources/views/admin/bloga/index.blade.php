
@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Blogs</h2>
            <p class="text-muted mb-0">
                Manage your cafe blogs from here.
            </p>
        </div>

        <a href="{{ route('admin.blogs.create') }}" class="btn btn-dark">
            <i class="fa-solid fa-plus me-1"></i>
            Create Blog
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>

    @endif


    {{-- Blog Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="px-4">#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($blogs as $blog)

                            <tr>

                                {{-- ID --}}
                                <td class="px-4">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Image --}}
                                <td>

                                    @if($blog->image)

                                        <img
                                            src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                            alt="{{ $blog->title }}"
                                            width="70"
                                            height="50"
                                            style="object-fit: cover; border-radius: 8px;"
                                        >

                                    @else

                                        <div
                                            class="bg-light d-flex align-items-center justify-content-center"
                                            style="width:70px;height:50px;border-radius:8px;"
                                        >
                                            <i class="fa-regular fa-image text-muted"></i>
                                        </div>

                                    @endif

                                </td>


                                {{-- Title --}}
                                <td>

                                    <strong>
                                        {{ $blog->title }}
                                    </strong>

                                </td>


                                {{-- Slug --}}
                                <td>

                                    <small class="text-muted">
                                        {{ $blog->slug }}
                                    </small>

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($blog->status === 'published')

                                        <span class="badge bg-success">
                                            Published
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Draft
                                        </span>

                                    @endif

                                </td>


                                {{-- Date --}}
                                <td>

                                    {{ $blog->created_at->format('d M Y') }}

                                </td>


                                {{-- Actions --}}
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.blogs.edit', $blog->id) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </a>


                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this blog?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    <i class="fa-regular fa-newspaper fs-1 text-muted"></i>

                                    <h5 class="mt-3">
                                        No Blogs Found
                                    </h5>

                                    <p class="text-muted">
                                        Create your first cafe blog.
                                    </p>

                                    <a
                                        href="{{ route('admin.blogs.create') }}"
                                        class="btn btn-dark"
                                    >
                                        Create Blog
                                    </a>

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
