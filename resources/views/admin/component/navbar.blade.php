<nav class="navbar navbar-expand-lg admin-navbar">

    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand admin-brand" href="{{ url('/admin/dashboard') }}">

            <span class="brand-icon">
                <i class="bi bi-cup-hot-fill"></i>
            </span>

            <span>
                Café Bliss
                <small>ADMIN</small>
            </span>

        </a>


        <!-- Mobile Button -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#adminNavbar">

            <i class="bi bi-list"></i>

        </button>


        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="adminNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">


                <!-- Dashboard -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ url('/admin/dashboard') }}">

                        <i class="bi bi-grid-1x2-fill"></i>

                        Dashboard

                    </a>

                </li>


                <!-- Table Booking -->
                <li class="nav-item">

                    <a class="nav-link"
                              href="{{ route('admin.reservations.index') }}">

                        <i class="bi bi-calendar2-check"></i>

                        Table Booking

                    </a>

                </li>


                <!-- Menu -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('admin.menue.index') }}">

                        <i class="bi bi-cup-straw"></i>
                        Menu

                    </a>

                </li>


                <!-- Blog -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('admin.blogs.index') }}">

                        <i class="bi bi-file-text"></i>

                        Blog

                    </a>

                </li>




                <!-- gallery -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ url('/admin/gallery') }}">

                        <i class="bi bi-envelope"></i>

                        gallery

                    </a>

                </li>
                

                <!-- Contact -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ url('/admin/contacts') }}">

                        <i class="bi bi-envelope"></i>

                        Contact

                    </a>

                </li>







  <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="bi bi-image"></i>
                        back to site
                    </a>
                </li>














                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.site-media.edit') }}">
                        <i class="bi bi-image"></i>
                        Homepage Media
                    </a>
                </li>

                
                <!-- Admin Profile -->
                <li class="nav-item dropdown ms-lg-3">

                    <a
                        class="nav-link dropdown-toggle admin-profile"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                        <span class="profile-circle">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>

                        {{ auth()->user()->name }}

                    </a>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person"></i>
                                Profile
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>