@extends('layouts.app')

@section('content')

<section class="booking-section">

    <!-- Decorative Background -->
    <div class="decor-circle-one"></div>
    <div class="decor-circle-two"></div>

    <div class="container">

        <!-- Heading -->
        <div class="booking-heading">

            <div class="booking-small-title">
                A Table Awaits You
            </div>

            <h1>Reserve Your Table</h1>

            <p>
                Make your visit special. Choose your preferred date,
                time and table for a memorable café experience.
            </p>

            <div class="heading-line">
                <span></span>
                <i>✦</i>
                <span></span>
            </div>

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


        <!-- Booking Card -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-9 col-md-11">

                <div class="booking-card">

                    <!-- Top Decoration -->
                    <div class="card-decoration">
                        <span></span>
                        <i>☕</i>
                        <span></span>
                    </div>


                    <!-- Booking Form -->
                    <form action="{{ route('reservation.store') }}" method="POST">

                        @csrf

                        <div class="row g-4">

                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label for="booking-name">Your Name</label>

                                    <input
                                        id="booking-name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        autocomplete="name"
                                        maxlength="255"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter your name"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label for="booking-email">Email Address</label>

                                    <input
                                        id="booking-email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        autocomplete="email"
                                        maxlength="255"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter your email"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label for="booking-phone">Phone Number</label>

                                    <input
                                        id="booking-phone"
                                        type="tel"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        autocomplete="tel"
                                        maxlength="30"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Enter phone number"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Date -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label for="booking-date">Booking Date</label>

                                    <input
                                        id="booking-date"
                                        type="date"
                                        name="date"
                                        value="{{ old('date') }}"
                                        min="{{ now()->toDateString() }}"
                                        class="form-control @error('date') is-invalid @enderror"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Time -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label for="booking-time">Booking Time</label>

                                    <input
                                        id="booking-time"
                                        type="time"
                                        name="time"
                                        value="{{ old('time') }}"
                                        class="form-control @error('time') is-invalid @enderror"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Guests -->
                            <div class="col-12">
                                <div class="booking-field">

                                    <label for="booking-guests">Number of Guests</label>

                                    <input
                                        id="booking-guests"
                                        type="number"
                                        name="guests"
                                        min="1"
                                        max="20"
                                        value="{{ old('guests', 2) }}"
                                        class="form-control @error('guests') is-invalid @enderror"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Submit Button -->
                            <div class="col-12 text-center">

                                <button
                                    type="submit"
                                    class="booking-submit"
                                >
                                    Reserve My Table
                                    <span>→</span>
                                </button>

                            </div>

                        </div>

                    </form>


                    <!-- Bottom Note -->
                    <div class="booking-note">
                        ✦ We look forward to welcoming you ✦
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection