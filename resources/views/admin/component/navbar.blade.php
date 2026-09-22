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
                       href="{{ url('/admin/reservatiion') }}">

                        <i class="bi bi-calendar2-check"></i>

                        Table Booking

                    </a>

                </li>


                <!-- Menu -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ url('/admin/menue/create') }}">

                        <i class="bi bi-cup-straw"></i>

                        Menu

                    </a>

                </li>


                <!-- Blog -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ url('/admin/bloga/create') }}">

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


                
                <!-- Admin Profile -->
                <li class="nav-item dropdown ms-lg-3">

                    <a
                        class="nav-link dropdown-toggle admin-profile"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                        <span class="profile-circle">
                            A
                        </span>

                        Admin

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
                            <a class="dropdown-item text-danger" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </a>
                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>