@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Add gallery image</h2>
            <p class="text-muted mb-0">Upload an image and choose whether it is visible publicly.</p>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-dark">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to gallery
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="image" class="form-label fw-semibold">Image</label>
                        <input id="image" type="file" name="image" required accept=".jpg,.jpeg,.png,.webp" class="form-control @error('image') is-invalid @enderror">
                        <small class="text-muted">JPG, JPEG, PNG or WEBP, up to 2 MB.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="draft" @selected(old('status', 'draft') === 'draft')>Draft</option>
                            <option value="published" @selected(old('status') === 'published')>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div id="imagePreview" class="border rounded d-flex align-items-center justify-content-center" style="height: 220px; background: #f8f9fa;">
                            <span class="text-muted"><i class="fa-regular fa-image me-2"></i>Image preview</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-plus me-1"></i> Save image</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.querySelector('#image').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.querySelector('#imagePreview');

    if (file) {
        const imageUrl = URL.createObjectURL(file);
        preview.innerHTML = `<img src="${imageUrl}" alt="Image preview" style="width:100%;height:100%;object-fit:contain;">`;
    }
});
</script>
@endsection