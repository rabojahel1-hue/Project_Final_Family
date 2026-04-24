@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary card-outline shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-circle mr-2"></i>Team Member Details</h3>
                <div class="card-tools">
                    @if($team->is_active)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">Inactive</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ $team->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($team->name) }}"
                         class="img-circle elevation-2"
                         width="120" height="120"
                         style="object-fit: cover;"
                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($team->name) }}'">
                    <h3 class="mt-3">{{ $team->name }}</h3>
                    <p class="text-muted">{{ $team->position }}</p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-book-open mr-2"></i>Biography</h5>
                            </div>
                            <div class="card-body">
                                <p>{{ $team->bio ?? 'No biography provided.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($team->facebook_url || $team->twitter_url || $team->linkedin_url)
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-share-alt mr-2"></i>Social Media</h5>
                            </div>
                            <div class="card-body text-center">
                                @if($team->facebook_url)
                                    <a href="{{ $team->facebook_url }}" target="_blank" class="btn btn-primary mx-1">
                                        <i class="fab fa-facebook-f"></i> Facebook
                                    </a>
                                @endif
                                @if($team->twitter_url)
                                    <a href="{{ $team->twitter_url }}" target="_blank" class="btn btn-info mx-1">
                                        <i class="fab fa-twitter"></i> Twitter
                                    </a>
                                @endif
                                @if($team->linkedin_url)
                                    <a href="{{ $team->linkedin_url }}" target="_blank" class="btn btn-primary mx-1">
                                        <i class="fab fa-linkedin-in"></i> LinkedIn
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('admin.team.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left mr-1"></i> Back to Team
                        </a>
                        <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-info">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
