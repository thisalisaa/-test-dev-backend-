<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pet Management Dashboard</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('frontend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/css/vendor.bundle.base.css') }}">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('frontend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <span class="menu-title">Pet Dashboard</span>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <!-- DASHBOARD -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <i class="icon-grid menu-icon text-warning"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <!-- PET MANAGEMENT -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pets') }}">
                            <i class="icon-head menu-icon text-warning"></i>
                            <span class="menu-title">Pet Management</span>
                        </a>
                    </li>

                    <!-- SMART CHECKER -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/smart-checker') }}">
                            <i class="icon-search menu-icon text-warning"></i>
                            <span class="menu-title">Smart Checker</span>
                        </a>
                    </li>

                    <!-- JSON FORMATTER -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/json-formatter') }}">
                            <i class="icon-paper menu-icon text-warning"></i>
                            <span class="menu-title">JSON Formatter</span>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- End Sidebar -->

            <!-- Main Content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                    @yield('scripts')
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('frontend/vendors/js/vendor.bundle.base.js') }}"></script>

    <!-- Plugin js for this page -->
    <script src="{{ asset('frontend/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('frontend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('frontend/js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js -->

    <!-- inject:js -->
    <script src="{{ asset('frontend/js/off-canvas.js') }}"></script>
    <script src="{{ asset('frontend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('frontend/js/template.js') }}"></script>
    <script src="{{ asset('frontend/js/settings.js') }}"></script>
    <script src="{{ asset('frontend/js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="{{ asset('frontend/js/dashboard.js') }}"></script>
    <script src="{{ asset('frontend/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js -->
</body>

</html>
