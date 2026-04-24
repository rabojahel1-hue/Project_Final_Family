@extends('dashboard.layout.admin')
@section('content')
<div class="row pt-4">
    <div class="col-md-6 offset-md-3">
        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{ $user->name }}</h3>
                <h5 class="widget-user-desc text-capitalize">{{ $user->role }}</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="https://ui-avatars.com/api/?name={{ $user->name }}&background=random" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Gender</h5>
                            <span class="description-text">{{ $user->gender ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Status</h5>
                            <span class="badge {{ $user->status ? 'badge-success' : 'badge-danger' }}">
                                {{ $user->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">Phone</h5>
                            <span class="description-text">{{ $user->phone ?? '-' }}</span>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
