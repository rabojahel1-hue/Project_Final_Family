<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Family Doctor | Admin Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('dashboard.layout.header')
        @include('dashboard.layout.sidebar')

        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid pt-3">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('dashboard.layout.footer')
    </div>

    <script src="{{ asset('dashboard_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // 1. Success Popup
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif

            // 2. Error/Exception Popup
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'System Error',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#3085d6'
                });
            @endif

            // 3. Validation Errors Popup (Middle of the screen)
            @if ($errors->any())
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Information',
                    html: '<ul style="text-align:left;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                    confirmButtonText: 'Understood',
                    confirmButtonColor: '#f39c12'
                });
            @endif
        });
    </script>

    @yield('scripts')
</body>
</html>
