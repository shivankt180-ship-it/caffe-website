

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
























<section class="cafe-menu">

    <div class="container">

        <!-- Heading -->
        <div class="text-center menu-heading">
            <span>OUR MENU</span>
            <h2>Discover Our <strong>Specials</strong></h2>
        </div>


        <!-- Category Options -->
        <div class="menu-categories text-center">

            <button class="menu-category active" data-category="coffee">
                Coffee
            </button>

            <button class="menu-category" data-category="tea">
                Tea
            </button>

            <button class="menu-category" data-category="pizza">
                Pizza
            </button>

            <button class="menu-category" data-category="burger">
                Burger
            </button>

            <button class="menu-category" data-category="dessert">
                Dessert
            </button>

        </div>


        <!-- Menu Cards -->
        <div class="row g-4 justify-content-center">


            <!-- Coffee -->
            <div class="col-lg col-md-6 menu-item"
                 data-category="coffee">

                <div class="menu-card">

                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=700&q=80"
                         alt="Coffee">

                    <div class="menu-card-body">

                        <h5>Cappuccino</h5>

                        <p>
                            Rich espresso with creamy steamed milk.
                        </p>

                        <div class="menu-bottom">
                            <span>₹180</span>
                            <a href="/menu">View →</a>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Tea -->
            <div class="col-lg col-md-6 menu-item"
                 data-category="tea">

                <div class="menu-card">

                    <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?auto=format&fit=crop&w=700&q=80"
                         alt="Tea">

                    <div class="menu-card-body">

                        <h5>Masala Tea</h5>

                        <p>
                            Traditional Indian tea with aromatic spices.
                        </p>

                        <div class="menu-bottom">
                            <span>₹100</span>
                            <a href="/menu">View →</a>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Pizza -->
            <div class="col-lg col-md-6 menu-item"
                 data-category="pizza">

                <div class="menu-card">

                    <img src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?auto=format&fit=crop&w=700&q=80"
                         alt="Pizza">

                    <div class="menu-card-body">

                        <h5>Margherita Pizza</h5>

                        <p>
                            Fresh mozzarella, tomato and Italian herbs.
                        </p>

                        <div class="menu-bottom">
                            <span>₹299</span>
                            <a href="/menu">View →</a>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Burger -->
            <div class="col-lg col-md-6 menu-item"
                 data-category="burger">

                <div class="menu-card">

                    <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=700&q=80"
                         alt="Burger">

                    <div class="menu-card-body">

                        <h5>Classic Burger</h5>

                        <p>
                            Juicy patty with fresh vegetables and sauce.
                        </p>

                        <div class="menu-bottom">
                            <span>₹249</span>
                            <a href="/menu">View →</a>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Dessert -->
            <div class="col-lg col-md-6 menu-item"
                 data-category="dessert">

                <div class="menu-card">

                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=700&q=80"
                         alt="Dessert">

                    <div class="menu-card-body">

                        <h5>Chocolate Cake</h5>

                        <p>
                            Soft chocolate cake with creamy topping.
                        </p>

                        <div class="menu-bottom">
                            <span>₹199</span>
                            <a href="/menu">View →</a>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Full Menu -->
        <div class="text-center">
            <a href="/menu" class="full-menu-btn">
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


            <!-- Blog 1 -->
            <div class="col-lg-6">

                <div class="blog-card">

                    <!-- Left Image -->
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=800&q=80"
                             alt="Coffee Story">
                    </div>


                    <!-- Right Content -->
                    <div class="blog-content">

                        <span class="blog-date">
                            20 September 2026
                        </span>

                        <h3>
                            The Art of a Perfect Cup of Coffee
                        </h3>

                        <p>
                            Discover the story behind our coffee,
                            from carefully selected beans to the
                            perfect cup served at our café.
                        </p>

                        <a href="/blog" class="blog-read">
                            Read Blog →
                        </a>

                    </div>

                </div>

            </div>


            <!-- Blog 2 -->
            <div class="col-lg-6">

                <div class="blog-card">

                    <!-- Left Image -->
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80"
                             alt="Cafe Story">
                    </div>


                    <!-- Right Content -->
                    <div class="blog-content">

                        <span class="blog-date">
                            18 September 2026
                        </span>

                        <h3>
                            Why Our Café Feels Like Home
                        </h3>

                        <p>
                            A place for conversations, coffee
                            and beautiful memories. Explore what
                            makes our café special.
                        </p>

                        <a href="/blog" class="blog-read">
                            Read Blog →
                        </a>

                    </div>

                </div>

            </div>


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



<section class="cafe-blog">

    <div class="container">

        <!-- Heading -->
        <div class="blog-heading text-center">
            <span>FROM OUR BLOG</span>
            <h2>Stories From <strong>Our Café</strong></h2>
            <p>Discover stories, ideas and moments from our café.</p>
        </div>


        <div class="row g-4">


            <!-- Blog 1 -->
            <div class="col-lg-6">

                <div class="blog-card">

                    <!-- Left Image -->
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=800&q=80"
                             alt="Coffee Story">
                    </div>


                    <!-- Right Content -->
                    <div class="blog-content">

                        <span class="blog-date">
                            20 September 2026
                        </span>

                        <h3>
                            The Art of a Perfect Cup of Coffee
                        </h3>

                        <p>
                            Discover the story behind our coffee,
                            from carefully selected beans to the
                            perfect cup served at our café.
                        </p>

                        <a href="/blog" class="blog-read">
                            Read Blog →
                        </a>

                    </div>

                </div>

            </div>


            <!-- Blog 2 -->
            <div class="col-lg-6">

                <div class="blog-card">

                    <!-- Left Image -->
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80"
                             alt="Cafe Story">
                    </div>


                    <!-- Right Content -->
                    <div class="blog-content">

                        <span class="blog-date">
                            18 September 2026
                        </span>

                        <h3>
                            Why Our Café Feels Like Home
                        </h3>

                        <p>
                            A place for conversations, coffee
                            and beautiful memories. Explore what
                            makes our café special.
                        </p>

                        <a href="/blog" class="blog-read">
                            Read Blog →
                        </a>

                    </div>

                </div>

            </div>


        </div>


        <!-- View All -->
        <div class="text-center blog-all">

            <a href="/blog" class="blog-btn">
                View All Blogs →
            </a>

        </div>

    </div>

</section>











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


        <!-- Gallery -->
        <div class="row g-4">

            <!-- Image 1 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-item">

                    <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=900&q=80"
                         alt="Cafe Interior">

                    <div class="gallery-overlay">
                        <span>Café Interior</span>
                    </div>

                </div>

            </div>


            <!-- Image 2 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-item">

                    <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=900&q=80"
                         alt="Coffee">

                    <div class="gallery-overlay">
                        <span>Fresh Coffee</span>
                    </div>

                </div>

            </div>


            <!-- Image 3 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-item">

                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=900&q=80"
                         alt="Restaurant">

                    <div class="gallery-overlay">
                        <span>Our Place</span>
                    </div>

                </div>

            </div>


            <!-- Image 4 -->
            <div class="col-lg-3 col-md-6">

                <div class="gallery-item">

                    <img src="https://images.unsplash.com/photo-1498804103079-a6351b050096?auto=format&fit=crop&w=800&q=80"
                         alt="Coffee Cup">

                    <div class="gallery-overlay">
                        <span>Coffee Time</span>
                    </div>

                </div>

            </div>


            <!-- Image 5 -->
            <div class="col-lg-6 col-md-6">

                <div class="gallery-item gallery-large">

                    <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1000&q=80"
                         alt="Cafe">

                    <div class="gallery-overlay">
                        <span>Café Moments</span>
                    </div>

                </div>

            </div>


            <!-- Image 6 -->
            <div class="col-lg-3 col-md-6">

                <div class="gallery-item">

                    <img src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&w=800&q=80"
                         alt="Coffee Beans">

                    <div class="gallery-overlay">
                        <span>Fresh Beans</span>
                    </div>

                </div>

            </div>

        </div>


        <!-- Button -->
        <div class="text-center gallery-button">

            <a href="/gallery">
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


