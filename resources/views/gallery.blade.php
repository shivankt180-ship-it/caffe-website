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
            @forelse ($gallery as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-page-item">
                        <img src="{{ asset('uploads/gallery/' . $item->image) }}" alt="Cafe gallery image {{ $item->id }}">
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted mb-0">Gallery photos are coming soon.</p>
                </div>
            @endforelse
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