@extends('layouts.app')

@section('content')

<section class="gallery-page">

    <div class="container">

        <!-- Page Heading -->
        <div class="gallery-page-heading text-center">

            <span>OUR GALLERY</span>

            <h1>
                A Glimpse Into <strong>Our Café</strong>
            </h1>

            <p>
                Take a look at the atmosphere, delicious creations,
                warm moments and beautiful memories that make our café special.
            </p>

        </div>


        <!-- Gallery Grid -->
        <div class="row g-4">


            <!-- Image 1 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-page-item">

                    <img
                        src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=1000&q=80"
                        alt="Café Interior">

                    <div class="gallery-page-overlay">
                        <h3>Our Café</h3>
                        <p>A warm and welcoming place to relax.</p>
                    </div>

                </div>

            </div>


            <!-- Image 2 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-page-item">

                    <img
                        src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=1000&q=80"
                        alt="Fresh Coffee">

                    <div class="gallery-page-overlay">
                        <h3>Fresh Coffee</h3>
                        <p>Freshly prepared coffee made with care.</p>
                    </div>

                </div>

            </div>


            <!-- Image 3 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-page-item">

                    <img
                        src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1000&q=80"
                        alt="Café Experience">

                    <div class="gallery-page-overlay">
                        <h3>Café Experience</h3>
                        <p>Good food, great conversations and beautiful moments.</p>
                    </div>

                </div>

            </div>


            <!-- Image 4 -->
            <div class="col-lg-6 col-md-6">

                <div class="gallery-page-item gallery-page-large">

                    <img
                        src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1200&q=80"
                        alt="Café Atmosphere">

                    <div class="gallery-page-overlay">
                        <h3>Café Atmosphere</h3>
                        <p>Where every corner tells a story.</p>
                    </div>

                </div>

            </div>


            <!-- Image 5 -->
            <div class="col-lg-6 col-md-6">

                <div class="gallery-page-item gallery-page-large">

                    <img
                        src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&w=1200&q=80"
                        alt="Coffee Beans">

                    <div class="gallery-page-overlay">
                        <h3>Premium Coffee</h3>
                        <p>Carefully selected beans for every cup.</p>
                    </div>

                </div>

            </div>


            <!-- Image 6 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-page-item">

                    <img
                        src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1000&q=80"
                        alt="Dessert">

                    <div class="gallery-page-overlay">
                        <h3>Sweet Moments</h3>
                        <p>Delicious desserts made for special moments.</p>
                    </div>

                </div>

            </div>


            <!-- Image 7 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-page-item">

                    <img
                        src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?auto=format&fit=crop&w=1000&q=80"
                        alt="Pizza">

                    <div class="gallery-page-overlay">
                        <h3>Freshly Made</h3>
                        <p>Delicious food prepared fresh for you.</p>
                    </div>

                </div>

            </div>


            <!-- Image 8 -->
            <div class="col-lg-4 col-md-6">

                <div class="gallery-page-item">

                    <img
                        src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=1000&q=80"
                        alt="Burger">

                    <div class="gallery-page-overlay">
                        <h3>Our Specials</h3>
                        <p>Simple ingredients, memorable flavours.</p>
                    </div>

                </div>

            </div>

        </div>


        <!-- Bottom Content -->

        <div class="gallery-bottom text-center">

            <h2>
                Every Visit Creates a Memory
            </h2>

            <p>
                From your first coffee in the morning to evenings spent
                with friends, we are happy to be a part of your moments.
            </p>

            <a href="{{url('/table')}}">
                Book Your Table →
            </a>

        </div>

    </div>

</section>

@endsection