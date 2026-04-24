@extends('dashboard.layout.admin')

@section('content')
<div class="p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-info p-3 shadow-sm">
                <h3>{{ $usersCount }}</h3>
                <p>Users</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success p-3 shadow-sm">
                <h3>{{ $doctorsCount }}</h3>
                <p>Doctors</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-warning p-3 shadow-sm">
                <h3>{{ $servicesCount }}</h3>
                <p>Services</p>
            </div>
        </div>
    </div>
    <div class="card mt-4 p-5 text-center shadow">
        <h2>Welcome to Family Doctor System</h2>
        <p class="text-muted">Everything is running smoothly now.</p>
    </div>
</div>
@endsection
