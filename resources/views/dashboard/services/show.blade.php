@extends('dashboard.layout.admin')

@section('content')
    <div class="row pt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <i class="fas fa-hand-holding-medical fa-3x text-primary"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $service->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Price</b> <a class="float-right">${{ $service->price }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Duration</b> <a class="float-right">{{ $service->duration }} Minutes</a>
                        </li>

                        <li class="list-group-item">
                            <b>Status</b>
                            <span class="float-right">
                                @if ($service->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </span>
                        </li>

                        <li class="list-group-item">
                            <b>Created At</b> <a class="float-right">{{ $service->created_at->format('Y-m-d') }}</a>
                        </li>
                    </ul>
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-user-md"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Providing Doctor</span>
                            <span class="info-box-number">{{ $service->doctor->user->name }}</span>
                        </div>
                    </div>

                    <strong><i class="fas fa-book mr-1"></i> Description</strong>
                    <p class="text-muted">
                        {{ $service->description ?? 'No description provided for this service.' }}
                    </p>

                    <hr>

                    <div class="text-center">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary"><b>Back to List</b></a>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-info"><b>Edit
                                Service</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
