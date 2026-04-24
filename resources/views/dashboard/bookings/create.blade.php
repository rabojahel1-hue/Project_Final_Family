@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card card-outline card-primary shadow-lg">
                    <div class="card-header bg-white">
                        <h3 class="card-title text-bold text-primary">
                            <i class="fas fa-calendar-plus mr-2"></i> New Appointment (Manual Entry)
                        </h3>
                    </div>

                    <form action="{{ route('admin.bookings.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h5 class="text-muted mb-3"><i class="fas fa-user mr-2"></i> Patient Information</h5>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Patient Name <span class="text-danger">*</span></label>
                                    <input type="text" name="patient_name"
                                        class="form-control @error('patient_name') is-invalid @enderror"
                                        placeholder="Enter Full Name" value="{{ old('patient_name') }}" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="patient_phone" class="form-control maxlength="10"
                                        minlength="10" @error('patient_phone') is-invalid @enderror"
                                        placeholder="e.g. 0591234567" value="{{ old('patient_phone') }}" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="patient_email"
                                        class="form-control @error('patient_email') is-invalid @enderror"
                                        placeholder="patient@example.com (Optional)" value="{{ old('patient_email') }}">
                                </div>
                            </div>
                            <hr class="my-4">

                            <div class="col-md-6 form-group">
                                <label>Assign Doctor <span class="text-danger">*</span></label>
                                <select name="doctor_id"
                                    class="form-control select2bs4 @error('doctor_id') is-invalid @enderror" required>
                                    <option value="" selected disabled>-- Select Doctor --</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->user->name }} ({{ $doctor->title }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <h5 class="text-muted mb-3"><i class="fas fa-stethoscope mr-2"></i> Appointment Details</h5>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Medical Service <span class="text-danger">*</span></label>
                                    <select name="service_id"
                                        class="form-control select2bs4 @error('service_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>-- Select Service --</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }} (${{ $service->price }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <label>Appointment Date <span class="text-danger">*</span></label>
                                    <input type="date" name="booking_date"
                                        class="form-control @error('booking_date') is-invalid @enderror"
                                        value="{{ old('booking_date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}"
                                        required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Preferred Time <span class="text-danger">*</span></label>
                                    <input type="time" name="booking_time"
                                        class="form-control @error('booking_time') is-invalid @enderror"
                                        value="{{ old('booking_time') }}" required>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label>Clinical Notes (Optional)</label>
                                <textarea name="notes" class="form-control" rows="3" placeholder="Enter any medical history or notes...">{{ old('notes') }}</textarea>
                            </div>
                        </div>

                        <div class="card-footer bg-light">
                            <button type="submit" class="btn btn-primary px-5 shadow-sm float-right">
                                <i class="fas fa-check-circle mr-1"></i> Confirm Appointment
                            </button>
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-default shadow-sm">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
