
@extends('admin.layouts.admin')
@section('content')
<div class="container-fluid py-4">

    <!-- Top Header -->
    <div class="d-flex justify-content-between align-items-center mb-4"><div>
            <h2 class="fw-bold mb-1">Welcome Back, Admin!</h2>
            <p class="text-muted mb-0">
                Here's what's happening with your café today.
            </p>
        </div>

        <div class="text-end d-none d-md-block">
            <small class="text-muted">
                <i class="bi bi-calendar3"></i>
                Monday, 21 September 2026
            </small>
        </div>

    </div>


    <!-- Statistics -->
    <div class="row g-4 mb-4">

        <!-- Orders -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="stat-icon">
                    <i class="bi bi-cup-hot"></i>
                </div>

                <p class="text-muted mb-1">Total Orders</p>

                <h3 class="fw-bold mb-2">124</h3>

                <small class="text-success">
                    <i class="bi bi-arrow-up"></i>
                    12% from last week
                </small>

            </div>

        </div>


        <!-- Reservations -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="stat-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>

                <p class="text-muted mb-1">Reservations</p>

                <h3 class="fw-bold mb-2">36</h3>

                <small class="text-success">
                    <i class="bi bi-arrow-up"></i>
                    8% from last week
                </small>

            </div>

        </div>


        <!-- Customers -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="stat-icon">
                    <i class="bi bi-people"></i>
                </div>

                <p class="text-muted mb-1">Total Customers</p>

                <h3 class="fw-bold mb-2">2,480</h3>

                <small class="text-success">
                    <i class="bi bi-arrow-up"></i>
                    15% from last week
                </small>

            </div>

        </div>


        <!-- Revenue -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-card">

                <div class="stat-icon">
                    <i class="bi bi-currency-rupee"></i>
                </div>

                <p class="text-muted mb-1">Total Revenue</p>

                <h3 class="fw-bold mb-2">
                    ₹48,320
                </h3>

                <small class="text-success">
                    <i class="bi bi-arrow-up"></i>
                    20% from last week
                </small>

            </div>

        </div>

    </div>


    <!-- Sales + Popular Items -->
    <div class="row g-4 mb-4">

        <!-- Sales Overview -->
        <div class="col-lg-8">

            <div class="dashboard-card h-100">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h5 class="fw-bold mb-1">
                            Sales Overview
                        </h5>

                        <small class="text-muted">
                            Last 7 days revenue
                        </small>
                    </div>

                    <select class="form-select form-select-sm dashboard-select">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option>This Year</option>
                    </select>

                </div>


                <!-- Simple Bootstrap Progress Visualization -->

                <div class="sales-bars">

                    <div class="sale-column">
                        <div class="sale-bar" style="height: 45%;"></div>
                        <small>22</small>
                    </div>

                    <div class="sale-column">
                        <div class="sale-bar" style="height: 70%;"></div>
                        <small>23</small>
                    </div>

                    <div class="sale-column">
                        <div class="sale-bar" style="height: 50%;"></div>
                        <small>24</small>
                    </div>

                    <div class="sale-column">
                        <div class="sale-bar" style="height: 75%;"></div>
                        <small>25</small>
                    </div>

                    <div class="sale-column">
                        <div class="sale-bar" style="height: 82%;"></div>
                        <small>26</small>
                    </div>

                    <div class="sale-column">
                        <div class="sale-bar" style="height: 88%;"></div>
                        <small>27</small>
                    </div>

                    <div class="sale-column">
                        <div class="sale-bar active" style="height: 100%;"></div>
                        <small>28</small>
                    </div>

                </div>

            </div>

        </div>


        <!-- Popular Items -->
        <div class="col-lg-4">

            <div class="dashboard-card h-100">

                <h5 class="fw-bold mb-4">
                    Popular Items
                </h5>


                <!-- Item -->
                <div class="popular-item">

                    <div class="food-placeholder">
                        <i class="bi bi-cup-hot"></i>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="mb-1">Cappuccino</h6>
                        <small class="text-muted">
                            124 orders
                        </small>
                    </div>

                    <strong>₹120</strong>

                </div>


                <div class="popular-item">

                    <div class="food-placeholder">
                        <i class="bi bi-cup"></i>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="mb-1">Cold Coffee</h6>
                        <small class="text-muted">
                            98 orders
                        </small>
                    </div>

                    <strong>₹150</strong>

                </div>


                <div class="popular-item">

                    <div class="food-placeholder">
                        <i class="bi bi-cup-straw"></i>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="mb-1">Masala Chai</h6>
                        <small class="text-muted">
                            87 orders
                        </small>
                    </div>

                    <strong>₹80</strong>

                </div>


                <div class="popular-item">

                    <div class="food-placeholder">
                        <i class="bi bi-egg-fried"></i>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="mb-1">Cheese Sandwich</h6>
                        <small class="text-muted">
                            64 orders
                        </small>
                    </div>

                    <strong>₹180</strong>

                </div>


                <div class="popular-item border-0">

                    <div class="food-placeholder">
                        <i class="bi bi-cake2"></i>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="mb-1">Chocolate Cake</h6>
                        <small class="text-muted">
                            52 orders
                        </small>
                    </div>

                    <strong>₹140</strong>

                </div>

            </div>

        </div>

    </div>


    <!-- Orders + Reservations -->
    <div class="row g-4 mb-4">

        <!-- Recent Orders -->
        <div class="col-lg-7">

            <div class="dashboard-card">

                <div class="d-flex justify-content-between mb-3">

                    <h5 class="fw-bold">
                        Recent Orders
                    </h5>

                    <a href="#" class="view-link">
                        View All →
                    </a>

                </div>


                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>#1024</td>
                                <td>Rohan Sharma</td>
                                <td>2 Items</td>
                                <td>₹320</td>
                                <td>
                                    <span class="status delivered">
                                        Delivered
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>#1023</td>
                                <td>Priya Singh</td>
                                <td>3 Items</td>
                                <td>₹450</td>
                                <td>
                                    <span class="status preparing">
                                        Preparing
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>#1022</td>
                                <td>Aman Verma</td>
                                <td>1 Item</td>
                                <td>₹180</td>
                                <td>
                                    <span class="status delivered">
                                        Delivered
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>#1021</td>
                                <td>Neha Gupta</td>
                                <td>2 Items</td>
                                <td>₹360</td>
                                <td>
                                    <span class="status hold">
                                        On Hold
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <!-- Reservations -->
        <div class="col-lg-5">

            <div class="dashboard-card">

                <div class="d-flex justify-content-between mb-3">

                    <h5 class="fw-bold">
                        Upcoming Reservations
                    </h5>

                    <a href="#" class="view-link">
                        View All →
                    </a>

                </div>


                <div class="reservation-item">

                    <div>
                        <strong>Ankit Raj</strong>
                        <small>4 Guests</small>
                    </div>

                    <span>12:00 PM</span>

                    <span class="status delivered">
                        Confirmed
                    </span>

                </div>


                <div class="reservation-item">

                    <div>
                        <strong>Sneha Patel</strong>
                        <small>2 Guests</small>
                    </div>

                    <span>01:30 PM</span>

                    <span class="status delivered">
                        Confirmed
                    </span>

                </div>


                <div class="reservation-item">

                    <div>
                        <strong>Rohit Mehta</strong>
                        <small>6 Guests</small>
                    </div>

                    <span>03:00 PM</span>

                    <span class="status preparing">
                        Pending
                    </span>

                </div>


                <div class="reservation-item">

                    <div>
                        <strong>Kavya Sharma</strong>
                        <small>3 Guests</small>
                    </div>

                    <span>05:00 PM</span>

                    <span class="status delivered">
                        Confirmed
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- Bottom Section -->
    <div class="row g-4">

        <div class="col-lg-8">

            <div class="dashboard-card">

                <div class="d-flex justify-content-between mb-3">

                    <h5 class="fw-bold">
                        Recent Blog Posts
                    </h5>

                    <a href="#" class="view-link">
                        View All →
                    </a>

                </div>


                <div class="row g-3">

                    <div class="col-md-4">

                        <div class="blog-admin-card">

                            <div class="blog-image">
                                <i class="bi bi-cup-hot"></i>
                            </div>

                            <h6 class="fw-bold mt-3">
                                The Art of Perfect Coffee
                            </h6>

                            <small class="text-muted">
                                Sep 18, 2026
                            </small>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="blog-admin-card">

                            <div class="blog-image">
                                <i class="bi bi-cookie"></i>
                            </div>

                            <h6 class="fw-bold mt-3">
                                Our Special Menu
                            </h6>

                            <small class="text-muted">
                                Sep 15, 2026
                            </small>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="blog-admin-card">

                            <div class="blog-image">
                                <i class="bi bi-shop"></i>
                            </div>

                            <h6 class="fw-bold mt-3">
                                A Day At Café Bliss
                            </h6>

                            <small class="text-muted">
                                Sep 12, 2026
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Quick Stats -->
        <div class="col-lg-4">

            <div class="dashboard-card">

                <h5 class="fw-bold mb-4">
                    Quick Stats
                </h5>

                <div class="quick-stat">
                    <span>
                        <i class="bi bi-cup-hot"></i>
                        Menu Items
                    </span>
                    <strong>24</strong>
                </div>

                <div class="quick-stat">
                    <span>
                        <i class="bi bi-file-text"></i>
                        Blog Posts
                    </span>
                    <strong>12</strong>
                </div>

                <div class="quick-stat">
                    <span>
                        <i class="bi bi-images"></i>
                        Gallery Images
                    </span>
                    <strong>38</strong>
                </div>

                <div class="quick-stat border-0">
                    <span>
                        <i class="bi bi-calendar-event"></i>
                        Pending Reservations
                    </span>
                    <strong>6</strong>
                </div>

            </div>

        </div>

    </div>

</div>




@endsection
