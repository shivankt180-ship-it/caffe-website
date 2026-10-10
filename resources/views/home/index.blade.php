@extends('layouts.app')

@section('content')


<section class="hero-section position-relative">

    <!-- Background Video -->
    <video class="hero-video" autoplay muted loop playsinline preload="auto">
        <source src="{{ $heroVideo ? asset('storage/'.$heroVideo) : asset('videos/vi.mp4') }}" type="{{ $heroVideo ? $heroVideoType : 'video/mp4' }}">
        Your browser does not support the video tag.
    </video>

    <!-- Dark Overlay -->
    <div class="hero-overlay"></div>

    <!-- Hero Content -->
    <div class="container position-relative hero-content">
        <div class="row justify-content-center text-center">

            <div class="col-lg-8">

                <!-- Cafe Logo -->
                <div class="cafe-logo mb-4">
                    <div class="logo-icon">☕</div>

                    <h1 class="logo-name">
                        Café
                    </h1>

                    <p class="logo-tagline">
                        BREW • TASTE • RELAX
                    </p>
                </div>

                <!-- Heading -->
                <h2 class="display-3 fw-bold text-white mb-3">
                    Where Every Sip
                    <br>
                    Tells a Story
                </h2>

                <!-- Description -->
                <p class="lead text-white mb-4">
                    Freshly brewed coffee, delicious food
                    and moments worth remembering.
                </p>

                <!-- Buttons -->
                <div class="d-flex justify-content-center gap-3 flex-wrap">

        <a href="{{url('/table')}}" class="btn btn-book">
                        Book a Table
                        <span>→</span>
                    </a>

                    <a href="{{url('/menu')}}" class="btn btn-menu">
                        Explore Menu
                    </a>

                </div>

            </div>

        </div>
    </div>

    <!-- Scroll Down -->
    <div class="scroll-down">
        <span>Scroll Down</span>
        <div>↓</div>
    </div>

</section>
























<section class="cafe-menu">

    <div class="container">

        <!-- Heading -->
        <div class="text-center menu-heading">
            <span>OUR MENU</span>
            <h2>Discover Our <strong>Specials</strong></h2>
        </div>


        @if ($featuredMenu->isNotEmpty())
            <div class="menu-categories text-center">
                @foreach ($featuredMenu->pluck('category')->unique()->values() as $index => $category)
                    <button class="menu-category {{ $index === 0 ? 'active' : '' }}" data-category="{{ \Illuminate\Support\Str::slug($category) }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>
        @endif


        <div class="row g-4 justify-content-center">
            @forelse ($featuredMenu as $item)
                <div class="col-lg col-md-6 menu-item" data-category="{{ \Illuminate\Support\Str::slug($item->category) }}">
                    <div class="menu-card">
                        @if ($item->image)
                            <img src="{{ asset('uploads/menu/'.$item->image) }}" alt="{{ $item->name }}">
                        @endif
                        <div class="menu-card-body">
                            <h5>{{ $item->name }}</h5>
                            <p>{{ \Illuminate\Support\Str::limit($item->discription, 100) }}</p>
                            <div class="menu-bottom">
                                <span>₹{{ number_format((float) $item->price, 2) }}</span>
                                <a href="{{ route('menu') }}">View →</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Menu items will appear here once published.</div>
            @endforelse
        </div>


        <!-- Full Menu -->
        <div class="text-center">
            <a href="{{ route('menu') }}" class="full-menu-btn">
                View Full Menu →
            </a>
        </div>

    </div>

</section>




<!-- yaha se blog ko show karnne ke liye system bana raha. hun  -->


<section class="cafe-blog">

    <div class="container">

        <!-- Heading -->
        <div class="blog-heading text-center">
            <span>FROM OUR BLOG</span>
            <h2>Stories From <strong>Our Café</strong></h2>
            <p>Discover stories, ideas and moments from our café.</p>
        </div>


        <div class="row g-4">
            @forelse ($recentBlogs as $blog)
                <div class="col-lg-6">
                    <article class="blog-card">
                        <div class="blog-image">
                            @if ($blog->image)
                                <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="{{ $blog->title }}">
                            @endif
                        </div>
                        <div class="blog-content">
                            <span class="blog-date">{{ $blog->created_at->format('d F Y') }}</span>
                            <h3>{{ $blog->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 140) }}</p>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-read">Read Blog →</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Published stories will appear here.</div>
            @endforelse
        </div>


        <!-- View All -->
        <div class="text-center blog-all">

            <a href="/blog" class="blog-btn">
                View All Blogs →
            </a>

        </div>

    </div>

</section>




<!-- gallery. ke liye. hum yaha se banna. rahe h  -->



<section class="cafe-gallery">

    <div class="container">

        <!-- Heading -->
        <div class="gallery-heading text-center">

            <span>OUR GALLERY</span>

            <h2>
                Moments From <strong>Our Café</strong>
            </h2>

            <p>
                A glimpse of beautiful moments, delicious food and
                memorable experiences.
            </p>

        </div>


        <div class="row g-4">
            @forelse ($galleryItems as $index => $galleryItem)
                <div class="{{ $index === 4 ? 'col-lg-6' : 'col-lg-3' }} col-md-6">
                    <div class="gallery-item {{ $index === 4 ? 'gallery-large' : '' }}">
                        <img src="{{ asset('uploads/gallery/'.$galleryItem->image) }}" alt="Café gallery image {{ $index + 1 }}">
                        <div class="gallery-overlay"><span>Café Moments</span></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Gallery photos will appear here once published.</div>
            @endforelse
        </div>


        <!-- Button -->
        <div class="text-center gallery-button">

            <a href="{{ route('gallery') }}">
                View Full Gallery →
            </a>

        </div>

    </div>

</section>



































<!-- Owner Story Section -->
<section class="owner-story">
    <div class="owner-story-container">

        <!-- Left Content -->
        <div class="owner-story-content">
            <span class="story-label">OUR STORY</span>

            <h2>
                A Café Built With
                <span>Passion & Love</span>
            </h2>

            <p class="story-intro">
                Every great café begins with a dream. Our journey started
                with a simple idea — to create a place where great coffee,
                delicious food and beautiful memories come together.
            </p>

            <p>
                Our founder always believed that a café should be more than
                just a place to eat and drink. It should feel like a second
                home — a place where people can relax, connect and enjoy
                every moment.
            </p>

            <p>
                With this vision, our café was created with attention to
                every little detail, from the ambience and interiors to
                every cup served on your table.
            </p>

            <a href="#" class="story-btn">
                Discover Our Story
                <span>→</span>
            </a>
        </div>


        <!-- Right Image -->
        <div class="owner-story-image">

            <div class="royal-frame">

                <div class="frame-top-decoration">
                    <span></span>
                    <i>✦</i>
                    <span></span>
                </div>

                <div class="image-wrapper">
                    @if ($storyPhoto || $storyPhotoFallback)
                        <img
                            src="{{ $storyPhoto ? asset('storage/'.$storyPhoto) : asset('uploads/gallery/'.$storyPhotoFallback) }}"
                            alt="Our Café"
                        >
                    @endif
                </div>

                <div class="frame-bottom-decoration">
                    <span></span>
                    <i>✦</i>
                    <span></span>
                </div>

            </div>

        </div>

    </div>
</section>


@endsection


