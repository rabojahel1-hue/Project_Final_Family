@extends('dashboard.layout.admin')

@section('content')
<div class="container-fluid pt-4">
    <div class="card card-info col-md-6 offset-md-3">
        <div class="card-header">
            <h3 class="card-title">Schedule Details</h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Doctor Name</b>
                    <span class="float-right text-primary">
                        {{ $schedule->doctor->user->name ?? ($schedule->doctor->name ?? 'N/A') }}
                    </span>
                </li>
                <li class="list-group-item">
                    <b>Day</b> <span class="float-right badge badge-info">{{ $schedule->day_of_week }}</span>
                </li>
                <li class="list-group-item">
                    <b>Working Hours</b>
                    <span class="float-right text-dark">
                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} -
                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                    </span>
                </li>
            </ul>
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary btn-block">Back to List</a>
        </div>
    </div>
</div>
@endsection
