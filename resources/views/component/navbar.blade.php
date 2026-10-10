
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

            <a href="{{ url('/gallery') }}" class="cafe-nav-link">
                Gallery
            </a>

            <a href="{{ url('/contact') }}" class="cafe-nav-link">
                Contact
            </a>

        </div>

        {{-- Desktop Authentication --}}
        <div class="cafe-nav-actions">

            @auth
                <span class="cafe-login">
                    Welcome, {{ auth()->user()->name }}
                </span>

                @if (auth()->user()->is_admin)
                    <a href="{{ route('dashboard') }}" class="cafe-login">Admin</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="cafe-register">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('home', ['auth' => 'login']) }}" class="cafe-login">
                    Login
                </a>

                <a href="{{ route('home', ['auth' => 'register']) }}" class="cafe-register">
                    Register
                </a>
            @endauth

        </div>

        {{-- Mobile Button --}}
        <button
            class="cafe-menu-button"
            id="cafeMenuButton"
            type="button"
            aria-label="Toggle navigation"
            aria-controls="cafeMobileMenu"
            aria-expanded="false"
        >
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

        <a href="{{ route('index') }}" class="mobile-nav-link">
            Table Booking
        </a>

        <a href="{{ url('/blog') }}" class="mobile-nav-link">
            Blog
        </a>

        <a href="{{ url('/gallery') }}" class="mobile-nav-link">
            Gallery
        </a>

        <a href="{{ url('/contact') }}" class="mobile-nav-link">
            Contact
        </a>

        {{-- Mobile Authentication --}}
        <div class="mobile-actions">

            @auth
                <span class="mobile-nav-link">
                    Welcome, {{ auth()->user()->name }}
                </span>

                @if (auth()->user()->is_admin)
                    <a href="{{ route('dashboard') }}" class="mobile-nav-link">Admin dashboard</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="mobile-nav-link">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('home', ['auth' => 'login']) }}" class="mobile-nav-link">
                    Login
                </a>

                <a href="{{ route('home', ['auth' => 'register']) }}" class="mobile-nav-link">
                    Register
                </a>
            @endauth

        </div>

    </div>

</nav>
