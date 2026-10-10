@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Edit menu</h2>
            <p class="text-muted mb-0">Update this cafe menu post.</p>
        </div>
        <a href="{{ route('admin.menue.index') }}" class="btn btn-outline-dark">Back to menu</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.menue.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Menu name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $menu->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="draft" {{ old('status', $menu->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $menu->status) === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Price</label>
                        <input type="number" name="price" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $menu->price) }}" required>
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
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

        <option value="coffee" {{ old('category', $menu->category) == 'coffee' ? 'selected' : '' }}>
            Coffee
        </option>

        <option value="burger" {{ old('category', $menu->category) == 'burger' ? 'selected' : '' }}>
            Burger
        </option>

        <option value="tea" {{ old('category', $menu->category) == 'tea' ? 'selected' : '' }}>
            Tea
        </option>

        <option value="pizza" {{ old('category', $menu->category) == 'pizza' ? 'selected' : '' }}>
            Pizza
        </option>

        <option value="dessert" {{ old('category', $menu->category) == 'dessert' ? 'selected' : '' }}>
            Dessert
        </option>
    </select>

    @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>









                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Menu image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        @if($menu->image)
                            <img src="{{ asset('uploads/menu/' . $menu->image) }}" alt="{{ $menu->name }}" class="mt-3" width="120">
                        @endif
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="discription" rows="5" class="form-control @error('discription') is-invalid @enderror" required>{{ old('discription', $menu->discription) }}</textarea>
                        @error('discription')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <hr>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.menue.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-dark">Update menu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
