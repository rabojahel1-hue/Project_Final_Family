@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-bold text-primary">
                                <i class="fas fa-calendar-check mr-2"></i> Bookings Management
                            </h3>
                            <div>
                                <a href="{{ route('admin.bookings.trash') }}"
                                    class="btn btn-outline-danger btn-sm shadow-sm mr-2">
                                    <i class="fas fa-trash-restore mr-1"></i> Deleted Bookings
                                </a>
                                <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary btn-sm shadow-sm">
                                    <i class="fas fa-plus-circle mr-1"></i> Add New Booking
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0 text-center">
                                <thead class="bg-light text-secondary">
                                    <tr>
                                        <th>#ID</th>
                                        <th class="text-left">Patient Details</th>
                                        <th>Assigned Doctor</th>
                                        <th>Service Type</th>
                                        <th>Schedule</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                        <tr>
                                            <td class="align-middle">#{{ $booking->id }}</td>
                                            <td class="text-left align-middle">
                                                <div class="font-weight-bold text-dark">{{ $booking->patient_name }}</div>
                                                <small class="text-muted"><i class="fas fa-phone-alt fa-xs"></i>
                                                    {{ $booking->patient_phone }}</small>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-info-soft p-2">
                                                    <i class="fas fa-user-md mr-1"></i>
                                                    {{ $booking->doctor->user->name ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-secondary font-weight-bold">
                                                {{ $booking->service->name ?? 'N/A' }}
                                            </td>
                                            <td class="align-middle">
                                                <div class="text-dark font-weight-bold">{{ $booking->booking_date }}</div>
                                                <div class="badge badge-light border"><i
                                                        class="far fa-clock mr-1 text-primary"></i>
                                                    {{ $booking->booking_time }}</div>
                                            </td>
                                            <td class="align-middle">
                                                @if ($booking->status == 'pending')
                                                    <span class="badge badge-warning px-3 py-2">Pending</span>
                                                @elseif($booking->status == 'confirmed')
                                                    <span class="badge badge-success px-3 py-2">Confirmed</span>
                                                @elseif($booking->status == 'cancelled')
                                                    <span class="badge badge-danger px-3 py-2">Cancelled</span>
                                                @else
                                                    <span
                                                        class="badge badge-secondary px-3 py-2">{{ $booking->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                                        class="btn btn-sm btn-info shadow-sm" title="View Patient Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                                        class="btn btn-sm btn-warning shadow-sm ml-1" title="Edit Booking">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Move this booking to trash?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm ml-1"
                                                            title="Move to Trash">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="py-5">
                                                <i class="fas fa-search fa-3x text-light mb-3"></i>
                                                <h5 class="text-muted">No bookings found in the system.</h5>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if ($bookings->hasPages())
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-center">
                                {{ $bookings->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .badge-info-soft {
            background-color: #e3f2fd;
            color: #0d47a1;
            border: 1px solid #bbdefb;
        }

        .table td,
        .table th {
            vertical-align: middle !important;
        }
    </style>
@endsection
