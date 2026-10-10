@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Homepage Media</h2>
        <p class="text-muted mb-0">Change the hero background video and café story photo.</p>
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

    <form action="{{ route('admin.site-media.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-xl-6">
                <section class="dashboard-card h-100">
                    <h3 class="h5 fw-bold">Hero video</h3>
                    <p class="text-muted">Upload an MP4, WebM, or MOV video up to 50 MB.</p>

                    @if ($heroVideo)
                        <video class="w-100 mb-3" style="max-height: 260px; object-fit: cover" controls>
                            <source src="{{ asset('storage/'.$heroVideo) }}">
                        </video>
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center mb-3" style="height: 180px">
                            <span class="text-muted">Using the default hero video</span>
                        </div>
                    @endif

                    <label class="form-label" for="hero-video">Replace hero video</label>
                    <input id="hero-video" class="form-control" type="file" name="hero_video" accept="video/mp4,video/webm,video/quicktime">
                    @error('hero_video') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </section>
            </div>

            <div class="col-xl-6">
                <section class="dashboard-card h-100">
                    <h3 class="h5 fw-bold">Story photo</h3>
                    <p class="text-muted">Upload a JPG, PNG, or WebP image up to 5 MB.</p>

                    @if ($storyPhoto)
                        <img class="w-100 mb-3" style="height: 260px; object-fit: cover" src="{{ asset('storage/'.$storyPhoto) }}" alt="Current story photo">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center mb-3" style="height: 260px">
                            <span class="text-muted">Using the latest published gallery photo</span>
                        </div>
                    @endif

                    <label class="form-label" for="story-photo">Replace story photo</label>
                    <input id="story-photo" class="form-control" type="file" name="story_photo" accept="image/jpeg,image/png,image/webp">
                    @error('story_photo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </section>
            </div>

            <div class="col-12">
                <button class="btn btn-dark" type="submit"><i class="bi bi-upload me-1"></i> Save homepage media</button>
            </div>
        </div>
    </form>
</div>
@endsection