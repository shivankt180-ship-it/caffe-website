@extends('layouts.app')

@section('content')
<section class="blog-hero">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-7">
                <span class="blog-label">OUR CAFE JOURNAL</span>
                <h1>Stories, Coffee<br>& <span>Good Moments</span></h1>
                <p>Explore our latest stories, coffee culture, delicious food and the moments that make Cafe Bliss special.</p>
            </div>
        </div>
    </div>
</section>

@if($blogs->isNotEmpty())
<section class="py-5 py-lg-6">
    <div class="container">
        @php($featuredBlog = $blogs->first())
        <div class="section-title mb-5">
            <span>FEATURED STORY</span>
            <h2>A Perfect Morning <strong>Starts With Coffee</strong></h2>
        </div>
        <div class="row g-0 featured-blog">
            <div class="col-lg-6">
                <div class="featured-image">
                    @if($featuredBlog->image)
                        <img src="{{ asset('uploads/blogs/' . $featuredBlog->image) }}" alt="{{ $featuredBlog->title }}">
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="featured-content">
                    <span class="category">CAFE JOURNAL</span>
                    <h3>{{ $featuredBlog->title }}</h3>
                    <p>{{ Str::limit($featuredBlog->description, 180) }}</p>
                    <div class="blog-meta">{{ $featuredBlog->created_at->format('d F Y') }} <span>•</span> 5 Min Read</div>
                    <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="read-btn">Read Full Story</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="latest-blogs py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <span>FROM OUR CAFE</span>
            <h2>Latest <strong>Stories</strong></h2>
            <p>Fresh stories, delicious food and coffee moments from Cafe Bliss.</p>
        </div>
        <div class="row g-4">
            @forelse($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card">
                        <div class="blog-image">
                            @if($blog->image)
                                <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                            @endif
                            <span class="blog-category">CAFE</span>
                        </div>
                        <div class="blog-card-body">
                            <small>{{ $blog->created_at->format('d F Y') }}</small>
                            <h3>{{ $blog->title }}</h3>
                            <p>{{ Str::limit($blog->description, 130) }}</p>
                            <div class="card-bottom">
                                <strong>Cafe Journal</strong>
                                <a href="{{ route('blog.show', $blog->slug) }}">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h3>No blogs available</h3>
                    <p>New cafe stories will appear here soon.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="blog-cta">
    <div class="container text-center">
        <span>YOUR TABLE IS WAITING</span>
        <h2>Come. Sit. Sip. <strong>Enjoy.</strong></h2>
        <p>Make your next coffee moment memorable.</p>
        <a href="{{ url('table') }}">Book Your Table</a>
    </div>
</section>
@endsection
