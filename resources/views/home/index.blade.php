

@extends('layouts.app')

@section('content')


<section class="hero-section position-relative">

    <!-- Background Video -->
    <video class="hero-video" autoplay muted loop playsinline preload="auto">
        <source src="/videos/vi.mp4" type="video/mp4">
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
                    <img
                        src="{{ asset('images/cafe-owner.jpg') }}"
                        alt="Our Café"
                    >
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


