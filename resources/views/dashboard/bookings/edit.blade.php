@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-warning card-outline shadow">
                    <div class="card-header bg-white">
                        <h3 class="card-title font-weight-bold text-dark">
                            <i class="fas fa-edit mr-2"></i> Update Bookings Info
                        </h3>
                    </div>

                    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h6 class="text-muted font-weight-bold"><i class="fas fa-user mr-2"></i> PATIENT
                                        INFORMATION</h6>
                                    <hr>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Patient Name</label>
                                    <input type="text" name="patient_name" class="form-control"
                                        value="{{ old('patient_name', $booking->patient_name) }}" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="patient_phone" class="form-control" maxlength="10" minlength="10"
                                        value="{{ old('patient_phone', $booking->patient_phone) }}" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control font-weight-bold">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>
                                            Confirmed</option>
                                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h6 class="text-muted font-weight-bold"><i class="fas fa-stethoscope mr-2"></i> MEDICAL
                                        ASSIGNMENT</h6>
                                    <hr>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Doctor</label>
                                    <select name="doctor_id" class="form-control select2bs4" required>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}"
                                                {{ $booking->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                {{ $doctor->user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Service</label>
                                    <select name="service_id" class="form-control select2bs4" required>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ $booking->service_id == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }} (${{ $service->price }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h6 class="text-muted font-weight-bold"><i class="fas fa-clock mr-2"></i> SCHEDULE &
                                        NOTES</h6>
                                    <hr>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Date</label>
                                    <input type="date" name="booking_date" class="form-control"
                                        value="{{ old('booking_date', \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d')) }}"
                                        required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Time</label>
                                    <input type="time" name="booking_time" class="form-control"
                                        value="{{ old('booking_time', \Carbon\Carbon::parse($booking->booking_time)->format('H:i')) }}"
                                        required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Notes</label>
                                    <textarea name="notes" class="form-control" rows="3">{{ old('notes', $booking->notes) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light text-right">
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button type="submit" class="btn btn-warning px-5 font-weight-bold">
                                <i class="fas fa-save mr-1"></i> Update Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
