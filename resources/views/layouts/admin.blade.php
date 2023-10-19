<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Webkit | Responsive Bootstrap 4 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/remixicon/fonts/remixicon.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css') }}">
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        @include('components.admin-sidebar')

        @include('components.admin-header')

        <div class="content-page">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper End-->

    @include('components.admin-footer')

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('admin/assets/js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('admin/assets/js/table-treeview.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('admin/assets/js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/assets/js/chart-custom.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/assets/js/slider.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.5.0/toastify.js" integrity="sha512-0M1OKuNQKhBhA/vqxH7OaS1LZlDwSrSbL3QzcmrlNbkWV0U4ewn8SWfVuRS5nLGV9IXsuNnkdqzyXOYXc0Eo9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/moment.min.js') }}"></script>

    <script>
        toast('🦄 Wow so easy!', {
            position: "top-right",
            autoClose: 5000,
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
            theme: "light",
            });
    </script>
</body>

</html>
