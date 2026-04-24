@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="card card-success card-outline col-md-8 offset-md-2">
            <div class="card-header">
                <h3 class="card-title">Add New Schedule</h3>
            </div>
            <form action="{{ route('admin.schedules.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Select Doctor</label>
                        <select name="doctor_id" class="form-control" required>
                            <option value="" selected disabled>-- Select a Doctor --</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">
                                    {{ $doctor->user->name ?? ($doctor->name ?? 'Doctor #' . $doctor->id) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Day of Week</label>
                        <select name="day_of_week" class="form-control">
                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="time" name="start_time" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Time</label>
                                <input type="time" name="end_time" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Save Schedule</button>
                </div>
            </form>
        </div>
    </div>
@endsection
