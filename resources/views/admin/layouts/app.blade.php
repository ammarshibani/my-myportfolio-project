<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | @yield('title')</title>

    <!-- Font: Source Sans Pro (اختياري لإضافة أناقة للنصوص) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Custom CSS (لأي تعديلات أو تحسينات خاصة بالمشروع) -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <!-- Page-specific styles -->
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.partials.navbar')

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('admin.partials.footer')

</div>

<!-- jQuery -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 Bundle -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE Scripts -->
<script src="{{ asset('assets/vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/admin.js') }}"></script>

<!-- Page-specific scripts -->
@yield('scripts')
</body>
</html>
