@extends('dashboard.layout.admin')

@section('content')
<div class="container-fluid pt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark font-weight-bold">Bookings Details</h3>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-user-injured mr-2"></i> Patient Card</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-muted small text-uppercase">Full Name</label>
                            <p class="h5 font-weight-bold text-dark">{{ $booking->patient_name }}</p>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small text-uppercase">Phone Number</label>
                            <p class="h5 text-primary">{{ $booking->patient_phone }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-muted small text-uppercase">Medical Service</label>
                            <p class="h6 font-weight-bold">{{ $booking->service->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small text-uppercase">Assigned Doctor</label>
                            <p class="h6 text-info font-weight-bold">Dr. {{ $booking->doctor->user->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0 text-dark"><i class="fas fa-sticky-note mr-2"></i> Clinical Notes / Remarks</h5>
                </div>
                <div class="card-body bg-white">
                    <blockquote class="blockquote mb-0" style="font-size: 1rem; border-left: 5px solid #007bff; padding-left: 15px;">
                        <p>{{ $booking->notes ?? 'No additional medical notes provided for this appointment.' }}</p>
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box shadow-sm mb-4">
                <span class="info-box-icon {{ $booking->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                    <i class="fas fa-info-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text text-uppercase small font-weight-bold">Booking Status</span>
                    <span class="info-box-number h5">{{ ucfirst($booking->status) }}</span>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <i class="far fa-calendar-alt text-primary mr-2"></i>
                                <span class="font-weight-bold">Bookings Date</span>
                            </div>
                            <span class="badge badge-pill badge-light border px-3 py-2 h6 mb-0">{{ $booking->booking_date }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <i class="far fa-clock text-primary mr-2"></i>
                                <span class="font-weight-bold">Time Slot</span>
                            </div>
                            <span class="badge badge-pill badge-light border px-3 py-2 h6 mb-0">{{ $booking->booking_time }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-4">
                <button onclick="window.print()" class="btn btn-dark btn-block shadow-sm">
                    <i class="fas fa-print mr-2"></i> Print Medical Receipt
                </button>
                <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning btn-block shadow-sm mt-2">
                    <i class="fas fa-edit mr-2"></i> Edit This Bookings
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling for Printing */
    @media print {
        .btn, .main-footer, .sidebar, .navbar {
            display: none !important;
        }
        .content-wrapper {
            margin: 0 !important;
            padding: 0 !important;
        }
        .card {
            border: 1px solid #ddd !important;
            box-shadow: none !important;
        }
    }
</style>
@endsection
