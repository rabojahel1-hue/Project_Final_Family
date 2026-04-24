@extends('dashboard.layout.admin')

@section('content')
<div class="container-fluid pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-widget widget-user shadow-lg">
                <div class="widget-user-header bg-primary text-white" style="height: 120px;">
                    <h3 class="widget-user-username">{{ $doctor->user->name }}</h3>
                    <h5 class="widget-user-desc">{{ $doctor->title }}</h5>
                </div>
                <div class="widget-user-image" style="top: 70px;">
                    <img class="img-circle elevation-2" src="{{ asset('storage/' . $doctor->user->image) }}"
                         alt="Doctor Avatar" style="width: 100px; height: 100px; object-fit: cover;"
                         onerror="this.src='{{ asset('dashboard_assets/dist/img/avatar5.png') }}'">
                </div>
                <div class="card-footer bg-white pt-5">
                    <div class="row">
                        <div class="col-sm-6 border-right text-center">
                            <h5 class="text-muted">Email</h5>
                            <p>{{ $doctor->user->email }}</p>
                        </div>
                        <div class="col-sm-6 text-center">
                            <h5 class="text-muted">Education</h5>
                            <p>{{ $doctor->education ?? 'No info available' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center py-2">
                        <h5 class="mb-3 text-muted">Social Media</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm mx-1"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-info btn-sm mx-1"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm mx-1"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">Back to List</a>
                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-info px-4">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
