<?php $route = Request::path(); ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cosmetic Finance Group - Admin</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">

    <!-- Header scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
</head>

<body class="">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3 col-xl-2 sidebar position-fixed box-shadow" style="overflow-y: scroll;">
                <!-- Logo -->
                <div class="logo px-2 py-5">
                    <a href="/admin" class="simple-text">
                        <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                </div>
                <!-- Sidebar Nav -->
                <nav class="nav flex-column" style="margin-bottom: 40%;">
                    <a class="nav-link {{ $route == 'admin' ? 'active' : '' }}" href="/admin"><i
                            class="fa fa-dashboard fa-fw mr-2"></i>Dashboard</a>
                    <a class="nav-link {{ $route == 'admin/customers' ? 'active' : '' }}" href="/admin/customers"><i
                            class="fa fa-users fa-fw mr-2"></i>Customers</a>
                    <a class="nav-link {{ $route == 'admin/clinics' ? 'active' : '' }}" href="/admin/clinics"><i
                            class="fa fa-building fa-fw mr-2"></i>Clinics</a>
                    <a class="nav-link {{ $route == 'admin/categories' ? 'active' : '' }}" href="/admin/categories"><i
                            class="fa fa-circle fa-fw mr-2"></i>Categories</a>
                    <a class="nav-link {{ $route == 'admin/templates' ? 'active' : '' }}" href="/admin/templates"><i
                            class="fa fa-circle fa-fw mr-2"></i>Templates</a>
                    <a class="nav-link {{ $route == 'admin/services' ? 'active' : '' }}" href="/admin/services"><i
                            class="fa fa-circle fa-fw mr-2"></i>Services</a>
                    <a class="nav-link {{ $route == 'admin/orders' ? 'active' : '' }}" href="/admin/orders"><i
                            class="fa fa-dollar fa-fw mr-2"></i>Orders</a>
                    <a class="nav-link {{ $route == 'admin/enquiries' ? 'active' : '' }}" href="/admin/enquiries"><i
                            class="fa fa-question fa-fw mr-2"></i>Enquiries</a>
                    <a class="nav-link {{ $route == 'admin/waitlist' ? 'active' : '' }}" href="/admin/waitlist"><i
                            class="fa fa-question fa-fw mr-2"></i>Waiting List</a>
                    <a class="nav-link {{ $route == 'admin/finance-enquiries' ? 'active' : '' }}"
                        href="/admin/finance-enquiries"><i class="fa fa-question fa-fw mr-2"></i>Finance Enquiries</a>
                    <a class="nav-link {{ $route == 'admin/freeusers' ? 'active' : '' }}" href="/admin/freeusers"><i
                            class="fa fa-user fa-fw mr-2"></i>Free Users</a>
                    <a class="nav-link {{ $route == 'admin/faqs' ? 'active' : '' }}" href="/admin/faqs"><i
                            class="fa fa-question-circle-o fa-fw mr-2"></i>FAQs</a>
                    <a class="nav-link {{ $route == 'admin/notifications' ? 'active' : '' }}"
                        href="/admin/notifications"><i class="fa fa-comment-o fa-fw mr-2"></i>Notifications</a>

                </nav>
                <a class="nav-link absolute-bottom btn-secondary text-center" style="position: fixed;width: 14.3%;"
                    href="/">
                    <i class="fa fa-chevron-left mr-2"></i> Back to Website
                </a>
            </div>


            <!-- Main content -->
            <div class="col-9 col-xl-10 offset-3 offset-xl-2 main">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Footer scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $(".data-table").dataTable({
            order: [
                [0, "desc"]
            ],
            autoFill: {
                enable: true,
                columns: [1, 2, 3, 4]
            },
            pageLength: 50
        });
    })
</script>
