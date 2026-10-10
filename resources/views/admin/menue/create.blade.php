
@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Create New menu</h2>
            <p class="text-muted mb-0">
                Create and publish a new cafe menu post.
            </p>
        </div>

        <a href="{{ route('admin.menue.index') }}" class="btn btn-outline-dark">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Back to menu
        </a>

    </div>


    {{-- Form Card --}}
    <div class="card border-0 shadow-sm">

    

        <div class="card-body p-4">

            <form action="{{route('admin.menue.store')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- Title --}}
                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            menu name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="Enter blog title"
                            value="{{ old('name') }}"
                        >

                        @error('name')
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

                            <option value="draft">
                                Draft
                            </option>

                            <option value="published"
                               >
                                Published
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- price --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            price
                        </label>

                        <input
                            type="text"
                            name="price"
                            class="form-control @error('price') is-invalid @enderror"
                            placeholder="example-menu-price"
                            value="{{ old('price') }}"
                        >

                        <small class="text-muted">
                            Example: our-best-coffee
                        </small>

                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                  





                    {{-- Description --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            menu Description
                        </label>

                        <textarea
                            name="discription"
                            rows="8"
                            class="form-control @error('discription') is-invalid @enderror"
                            placeholder="Write your menu content here..."
                        >{{ old('discription') }}</textarea>

                        @error('discription')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

















{{-- Category --}}
<div class="col-12">

    <label class="form-label fw-semibold">
        Category
    </label>

    <select
        name="category"
        class="form-select @error('category') is-invalid @enderror"
    >
        <option value="">Select Category</option>

        <option value="coffee" {{ old('category') == 'coffee' ? 'selected' : '' }}>
            Coffee
        </option>

        <option value="burger" {{ old('category') == 'burger' ? 'selected' : '' }}>
            Burger
        </option>

        <option value="tea" {{ old('category') == 'tea' ? 'selected' : '' }}>
            Tea
        </option>

        <option value="pizza" {{ old('category') == 'pizza' ? 'selected' : '' }}>
            Pizza
        </option>

        <option value="dessert" {{ old('category') == 'dessert' ? 'selected' : '' }}>
            Dessert
        </option>
    </select>

    @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>













                    {{-- Image --}}
                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            menu Image
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
                                Create menu
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

