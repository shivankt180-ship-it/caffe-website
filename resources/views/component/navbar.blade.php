
<nav class="cafe-navbar">

    <div class="cafe-navbar-inner">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="cafe-logo">

            <span class="cafe-logo-mark">
                <i class="fa-solid fa-mug-hot"></i>
            </span>

            <span class="cafe-logo-text">
                <small>THE</small>
                <strong>CAFÉ BLISS</strong>
            </span>

        </a>


        {{-- Desktop Navigation --}}
        <div class="cafe-navigation">

            <a href="{{ url('/') }}" class="cafe-nav-link active">
                Home
            </a>

            <a href="{{ url('/menu') }}" class="cafe-nav-link">
                Menu
            </a>

            <a href="{{ url('table') }}" class="cafe-nav-link">
                Table Booking
            </a>

            <a href="{{ url('/blog') }}" class="cafe-nav-link">
                Blog
            </a>

            <a href="{{ url('/contact') }}" class="cafe-nav-link">
                Contact
            </a>

        </div>


        {{-- Right Side --}}
        <div class="cafe-nav-actions">

            <a href="{{ url('/login') }}" class="cafe-login">
                Login
            </a>

            <a href="{{ url('/register') }}" class="cafe-register">
                Register
            </a>

        </div>


        {{-- Mobile Button --}}
        <button class="cafe-menu-button" id="cafeMenuButton" type="button">

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>


    {{-- Mobile Navigation --}}
    <div class="cafe-mobile-menu" id="cafeMobileMenu">

        <a href="{{ url('/') }}" class="mobile-nav-link active">
            Home
        </a>

        <a href="{{ url('/menu') }}" class="mobile-nav-link">
            Menu
        </a>

        <a href="{{ url('/table-booking') }}" class="mobile-nav-link">
            Table Booking
        </a>

        <a href="{{ url('/blog') }}" class="mobile-nav-link">
            Blog
        </a>

        <a href="{{ url('/contact') }}" class="mobile-nav-link">
            Contact
        </a>

        <div class="mobile-actions">

            <a href="{{ url('/login') }}" class="mobile-login">
                Login
            </a>

            <a href="{{ url('/register') }}" class="mobile-register">
                Register
            </a>

        </div>

    </div>

</nav>

