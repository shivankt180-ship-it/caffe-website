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
                    <form action="#" method="POST">

                        @csrf

                        <div class="row g-4">

                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label>Your Name</label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Enter your name"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label>Phone Number</label>

                                    <input
                                        type="tel"
                                        name="phone"
                                        class="form-control"
                                        placeholder="Enter phone number"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Date -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label>Booking Date</label>

                                    <input
                                        type="date"
                                        name="date"
                                        class="form-control"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Time -->
                            <div class="col-md-6">
                                <div class="booking-field">

                                    <label>Booking Time</label>

                                    <input
                                        type="time"
                                        name="time"
                                        class="form-control"
                                        required
                                    >

                                </div>
                            </div>


                            <!-- Guests -->
                            <div class="col-12">
                                <div class="booking-field">

                                    <label>Number of Guests</label>

                                    <select
                                        name="guests"
                                        class="form-select"
                                        required
                                    >

                                        <option value="" selected disabled>
                                            Select number of guests
                                        </option>

                                        <option value="1">
                                            1 Guest
                                        </option>

                                        <option value="2">
                                            2 Guests
                                        </option>

                                        <option value="3">
                                            3 Guests
                                        </option>

                                        <option value="4">
                                            4 Guests
                                        </option>

                                        <option value="5">
                                            5 Guests
                                        </option>

                                        <option value="6">
                                            6 Guests
                                        </option>

                                        <option value="7">
                                            7 Guests
                                        </option>

                                        <option value="8">
                                            8+ Guests
                                        </option>

                                    </select>

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