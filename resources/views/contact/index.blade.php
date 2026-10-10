
@extends('layouts.app')

@section('content')

<!-- Contact Hero -->
<section class="contact-hero py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">

                <span class="contact-label">
                    GET IN TOUCH
                </span>

                <h1 class="display-3 fw-bold mt-3">
                    We'd Love To
                    <span>Hear From You.</span>
                </h1>

                <p class="lead mt-3">
                    Have a question, suggestion or simply want to say hello?
                    Send us a message and our café team will get back to you.
                </p>

            </div>
        </div>
    </div>
</section>


<!-- Contact Section -->
<section class="contact-section py-5">

    <div class="container py-lg-5">

        <div class="row g-4 g-lg-5">


            <!-- LEFT SIDE -->
            <div class="col-lg-5">

                <div class="contact-info h-100 p-4 p-md-5 rounded-4">

                    <span class="contact-small-title">
                        COME VISIT US
                    </span>

                    <h2 class="mt-3">
                        Let's Share a
                        <strong>Coffee.</strong>
                    </h2>

                    <p class="contact-description mt-3">
                        Whether you're meeting friends, enjoying some
                        quiet time or celebrating a special moment,
                        our doors are always open.
                    </p>


                    <!-- Address -->
                    <div class="d-flex gap-3 mt-4">

                        <div class="contact-icon flex-shrink-0">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold">Our Café</h6>

                            <p class="mb-0">
                                24 Coffee Street,<br>
                                Downtown, Lucknow, Uttar Pradesh
                            </p>
                        </div>

                    </div>


                    <!-- Phone -->
                    <div class="d-flex gap-3 mt-4">

                        <div class="contact-icon flex-shrink-0">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold">Call Us</h6>

                            <p class="mb-0">
                                +91 98765 43210
                            </p>
                        </div>

                    </div>


                    <!-- Email -->
                    <div class="d-flex gap-3 mt-4">

                        <div class="contact-icon flex-shrink-0">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold">Email</h6>

                            <p class="mb-0">
                                hello@cafebliss.com
                            </p>
                        </div>

                    </div>


                    <!-- Opening Hours -->
                    <div class="opening-hours mt-4 pt-4">

                        <h6 class="fw-bold">
                            Opening Hours
                        </h6>

                        <div class="d-flex justify-content-between mt-3">
                            <span>Monday - Friday</span>
                            <strong>8 AM - 10 PM</strong>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <span>Saturday - Sunday</span>
                            <strong>9 AM - 11 PM</strong>
                        </div>

                    </div>

                </div>

            </div>


            <!-- RIGHT SIDE -->
            <div class="col-lg-7">

                <div class="contact-form-card p-4 p-md-5 rounded-4">

                    <span class="form-label-top">
                        SEND A MESSAGE
                    </span>

                    <h2 class="mt-2 mb-4">
                        How Can We
                        <strong>Help?</strong>
                    </h2>


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

                    <form action="{{ route('contact.store') }}" method="POST">

                        @csrf

                        <div class="row g-4">


                            <!-- Name -->
                            <div class="col-md-6">

                                <label class="form-label" for="contact-name">
                                    Your Name
                                </label>

                                <input
                                    id="contact-name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    maxlength="255"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    placeholder="Enter your name"
                                    required>

                            </div>


                            <!-- Email -->
                            <div class="col-md-6">

                                <label class="form-label" for="contact-email">
                                    Email Address
                                </label>

                                <input
                                    id="contact-email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    maxlength="255"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Enter your email"
                                    required>

                            </div>


                            <!-- Phone -->
                            <div class="col-md-6">

                                <label class="form-label" for="contact-phone">
                                    Phone Number
                                </label>

                                <input
                                    id="contact-phone"
                                    type="tel"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    maxlength="30"
                                    class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                    placeholder="+91 XXXXX XXXXX">

                            </div>


                            <!-- Subject -->
                            <div class="col-md-6">

                                <label class="form-label" for="contact-subject">
                                    Subject
                                </label>

                                <select
                                    id="contact-subject"
                                    name="subject"
                                    class="form-select form-select-lg @error('subject') is-invalid @enderror"
                                    required>

                                    <option value="" @selected(old('subject') === null) disabled>
                                        Select subject
                                    </option>

                                    <option value="Table Booking" @selected(old('subject') === 'Table Booking')>Table Booking</option>
                                    <option value="Menu & Food" @selected(old('subject') === 'Menu & Food')>Menu & Food</option>
                                    <option value="Private Event" @selected(old('subject') === 'Private Event')>Private Event</option>
                                    <option value="Feedback" @selected(old('subject') === 'Feedback')>Feedback</option>
                                    <option value="General Enquiry" @selected(old('subject') === 'General Enquiry')>General Enquiry</option>

                                </select>

                            </div>


                            <!-- Message -->
                            <div class="col-12">

                                <label class="form-label" for="contact-message">
                                    Your Message
                                </label>

                                <textarea
                                    id="contact-message"
                                    name="message"
                                    class="form-control @error('message') is-invalid @enderror"
                                    rows="6"
                                    placeholder="Write your message..."
                                    maxlength="5000"
                                    required>{{ old('message') }}</textarea>

                            </div>


                            <!-- Button -->
                            <div class="col-12">

                                <button
                                    type="submit"
                                    class="btn contact-btn btn-lg w-100">

                                    Send Message
                                    <i class="bi bi-arrow-right ms-2"></i>

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- Bottom CTA -->
<section class="contact-bottom py-5">

    <div class="container text-center py-5">

        <span>
            YOUR TABLE IS WAITING
        </span>

        <h2 class="display-5 mt-3">
            See You At
            <strong>Café Bliss.</strong>
        </h2>

        <a href="{{ url('/table') }}"
           class="btn btn-light px-4 py-3 mt-3">

            Book A Table
            <i class="bi bi-arrow-right ms-2"></i>

        </a>

    </div>

</section>

@endsection

