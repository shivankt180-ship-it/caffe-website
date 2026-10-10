
@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Create New Blog</h2>
            <p class="text-muted mb-0">
                Create and publish a new cafe blog post.
            </p>
        </div>

        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-dark">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Back to Blogs
        </a>

    </div>


    {{-- Form Card --}}
    <div class="card border-0 shadow-sm">

    

        <div class="card-body p-4">

            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- Title --}}
                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            Blog Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control form-control-lg @error('title') is-invalid @enderror"
                            placeholder="Enter blog title"
                            value="{{ old('title') }}"
                        >

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select form-select-lg @error('status') is-invalid @enderror"
                        >

                            <option value="draft"
                                {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="published"
                                {{ old('status') == 'published' ? 'selected' : '' }}>
                                Published
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Slug --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Slug
                        </label>

                        <input
                            type="text"
                            name="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            placeholder="example-blog-title"
                            value="{{ old('slug') }}"
                        >

                        <small class="text-muted">
                            Example: our-best-coffee
                        </small>

                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Blog Description
                        </label>

                        <textarea
                            name="description"
                            rows="8"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Write your blog content here..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Image --}}
                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            Blog Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control @error('image') is-invalid @enderror"
                            accept="image/*"
                        >

                        <small class="text-muted">
                            JPG, JPEG, PNG or WEBP
                        </small>

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Image Preview --}}
                    <div class="col-md-4">

                        <div
                            id="imagePreview"
                            class="border rounded d-flex align-items-center justify-content-center"
                            style="height: 150px; background: #f8f9fa;"
                        >

                            <div class="text-center text-muted">

                                <i class="fa-regular fa-image fs-2"></i>

                                <div class="small mt-2">
                                    Image Preview
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-12">

                        <hr>

                        <div class="d-flex justify-content-end gap-2">

                            <a
                                href="{{ route('admin.blogs.index') }}"
                                class="btn btn-light px-4"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="btn btn-dark px-4"
                            >
                                <i class="fa-solid fa-plus me-1"></i>
                                Create Blog
                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Image Preview Script --}}
<script>

document.querySelector('input[name="image"]').addEventListener('change', function(event) {

    const preview = document.getElementById('imagePreview');

    const file = event.target.files[0];

    if (file) {

        const imageUrl = URL.createObjectURL(file);

        preview.innerHTML = `
            <img
                src="${imageUrl}"
                style="width:100%; height:100%; object-fit:cover; border-radius:6px;"
            >
        `;

    }

});

</script>

@endsection

