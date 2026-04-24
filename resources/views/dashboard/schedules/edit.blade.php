@extends('dashboard.layout.admin')

@section('content')
<div class="container-fluid pt-4">
    <div class="card card-warning card-outline col-md-8 offset-md-2">
        <div class="card-header">
            <h3 class="card-title">Edit Schedule</h3>
        </div>
        <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Select Doctor</label>
                    <select name="doctor_id" class="form-control" required>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $schedule->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->user->name ?? ($doctor->name ?? 'Doctor #' . $doctor->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Day</label>
                    <select name="day_of_week" class="form-control">
                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                            <option value="{{ $day }}" {{ $schedule->day_of_week == $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Start Time</label>
                        <input type="time" name="start_time" class="form-control" value="{{ $schedule->start_time }}">
                    </div>
                    <div class="col-md-6">
                        <label>End Time</label>
                        <input type="time" name="end_time" class="form-control" value="{{ $schedule->end_time }}">
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-warning text-white">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
