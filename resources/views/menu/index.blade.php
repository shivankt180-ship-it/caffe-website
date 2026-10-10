
@extends('layouts.app')

@section('content')

<section class="menu-section">

    <div class="container">

        <!-- Heading -->
        <div class="menu-heading text-center">
            <span>OUR SPECIAL MENU</span>
            <h1>Choose Your Favourite</h1>
            <p>Freshly prepared with love and served with passion.</p>
        </div>


        <!-- ================= CATEGORY BUTTONS ================= -->

        <div class="menu-categories">

            <button type="button"
                    class="menu-category active"
                    onclick="showMenu('coffee', this)">
                ☕ Coffee
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('burger', this)">
                🍔 Burger
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('tea', this)">
                🍵 Tea
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('pizza', this)">
                🍕 Pizza
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('dessert', this)">
                🍰 Dessert
            </button>

        </div>


        <!-- ================= COFFEE ================= -->

        <div class="menu-items active-menu" id="coffee">

            <div class="row g-4">

                @forelse($menu->where('category', 'coffee') as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="menu-card">

                            @if($item->image)

                                <img
                                    src="{{ asset('uploads/menu/' . $item->image) }}"
                                    alt="{{ $item->name }}"
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center bg-light"
                                    style="height:250px;"
                                >
                                    <i class="fa-regular fa-image fs-1 text-muted"></i>
                                </div>

                            @endif


                            <div class="menu-card-content">

                                <div class="menu-title">

                                    <h3>
                                        {{ $item->name }}
                                    </h3>

                                    <span>
                                        ₹{{ $item->price }}
                                    </span>

                                </div>

                                <p>
                                    {{ $item->description }}
                                </p>

                                <button class="order-btn">
                                    Order Now
                                </button>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">
                        <p>No coffee items available.</p>
                    </div>

                @endforelse

            </div>

        </div>


        <!-- ================= BURGER ================= -->

        <div class="menu-items" id="burger">

            <div class="row g-4">

                @forelse($menu->where('category', 'burger') as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="menu-card">

                            @if($item->image)

                                <img
                                    src="{{ asset('uploads/menu/' . $item->image) }}"
                                    alt="{{ $item->name }}"
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center bg-light"
                                    style="height:250px;"
                                >
                                    <i class="fa-regular fa-image fs-1 text-muted"></i>
                                </div>

                            @endif


                            <div class="menu-card-content">

                                <div class="menu-title">

                                    <h3>
                                        {{ $item->name }}
                                    </h3>

                                    <span>
                                        ₹{{ $item->price }}
                                    </span>

                                </div>

                                <p>
                                    {{ $item->description }}
                                </p>

                                <button class="order-btn">
                                    Order Now
                                </button>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">
                        <p>No burger items available.</p>
                    </div>

                @endforelse

            </div>

        </div>


        <!-- ================= TEA ================= -->

        <div class="menu-items" id="tea">

            <div class="row g-4">

                @forelse($menu->where('category', 'tea') as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="menu-card">

                            @if($item->image)

                                <img
                                    src="{{ asset('uploads/menu/' . $item->image) }}"
                                    alt="{{ $item->name }}"
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center bg-light"
                                    style="height:250px;"
                                >
                                    <i class="fa-regular fa-image fs-1 text-muted"></i>
                                </div>

                            @endif


                            <div class="menu-card-content">

                                <div class="menu-title">

                                    <h3>
                                        {{ $item->name }}
                                    </h3>

                                    <span>
                                        ₹{{ $item->price }}
                                    </span>

                                </div>

                                <p>
                                    {{ $item->description }}
                                </p>

                                <button class="order-btn">
                                    Order Now
                                </button>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">
                        <p>No tea items available.</p>
                    </div>

                @endforelse

            </div>

        </div>


        <!-- ================= PIZZA ================= -->

        <div class="menu-items" id="pizza">

            <div class="row g-4">

                @forelse($menu->where('category', 'pizza') as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="menu-card">

                            @if($item->image)

                                <img
                                    src="{{ asset('uploads/menu/' . $item->image) }}"
                                    alt="{{ $item->name }}"
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center bg-light"
                                    style="height:250px;"
                                >
                                    <i class="fa-regular fa-image fs-1 text-muted"></i>
                                </div>

                            @endif


                            <div class="menu-card-content">

                                <div class="menu-title">

                                    <h3>
                                        {{ $item->name }}
                                    </h3>

                                    <span>
                                        ₹{{ $item->price }}
                                    </span>

                                </div>

                                <p>
                                    {{ $item->description }}
                                </p>

                                <button class="order-btn">
                                    Order Now
                                </button>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">
                        <p>No pizza items available.</p>
                    </div>

                @endforelse

            </div>

        </div>


        <!-- ================= DESSERT ================= -->

        <div class="menu-items" id="dessert">

            <div class="row g-4">

                @forelse($menu->where('category', 'dessert') as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="menu-card">

                            @if($item->image)

                                <img
                                    src="{{ asset('uploads/menu/' . $item->image) }}"
                                    alt="{{ $item->name }}"
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center bg-light"
                                    style="height:250px;"
                                >
                                    <i class="fa-regular fa-image fs-1 text-muted"></i>
                                </div>

                            @endif


                            <div class="menu-card-content">

                                <div class="menu-title">

                                    <h3>
                                        {{ $item->name }}
                                    </h3>

                                    <span>
                                        ₹{{ $item->price }}
                                    </span>

                                </div>

                                <p>
                                    {{ $item->description }}
                                </p>

                                <button class="order-btn">
                                    Order Now
                                </button>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">
                        <p>No dessert items available.</p>
                    </div>

                @endforelse

            </div>

        </div>


    </div>

</section>


@endsection

