<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Family Doctor | Login</title>
    <link rel="stylesheet" href="{{ asset('dashboard_assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        body { background-color: #f4f6f9 !important; }
        .login-box { width: 440px; } /* حجم مريح */
        .card { border-radius: 20px; border: none; }
        .card-header { background: #007bff; color: white; border-radius: 20px 20px 0 0 !important; padding: 20px; }
        .form-control { height: 50px; border-radius: 10px; border: 1px solid #ddd; }
        .btn-primary { height: 50px; border-radius: 10px; font-size: 1.1rem; background: #007bff; border: none; transition: 0.3s; }
        .btn-primary:hover { background: #0056b3; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        .alert-custom { border-radius: 10px; border-left: 5px solid #dc3545; background: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h3 class="mb-0"><b>Family</b> Doctor</h3>
        </div>
        <div class="card-body p-4">
            <p class="login-box-msg text-muted">Welcome back! Please login.</p>
            @if(session('error'))
                <div class="alert-custom small">
                    <i class="fas fa-times-circle mr-2"></i> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <div class="form-group mb-4">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white border-left-0"><span class="fas fa-envelope text-primary"></span></div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-white border-left-0"><span class="fas fa-lock text-primary"></span></div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block shadow">
                    Login Now <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="text-center mt-3 text-secondary">
        <small>© 2026 Family Doctor Clinic</small>
    </div>
</div>
</body>
</html>
