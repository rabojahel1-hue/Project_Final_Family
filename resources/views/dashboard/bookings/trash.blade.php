@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Trashed</b> Bookings</h3>
                <div class="d-flex" style="gap: 10px;">
                    <form action="{{ route('admin.bookings.restoreAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-undo-alt mr-1"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('admin.bookings.forceDeleteAll') }}" method="POST" onsubmit="return confirm('Delete all bookings forever?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                            <i class="fas fa-trash-alt mr-1"></i> Delete All
                        </button>
                    </form>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary btn-sm shadow-sm">Back</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Date & Time</th>
                            <th>Deleted At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td class="align-middle">#{{ $booking->id }}</td>
                            <td class="align-middle">
                                <div class="font-weight-bold">{{ $booking->patient_name }}</div>
                                <small>{{ $booking->patient_email }}</small>
                            </td>
                            <td class="align-middle">
                                @if($booking->team)
                                    {{ $booking->team->name ?? 'N/A' }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="align-middle">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}<br>
                                <small>{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</small>
                            </td>
                            <td class="align-middle">
                                <span class="badge badge-danger">{{ $booking->deleted_at->format('M d, Y h:i A') }}</span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <form action="{{ route('admin.bookings.restore', $booking->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-info text-white shadow-sm" title="Restore">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.bookings.forceDelete', $booking->id) }}" method="POST" onsubmit="return confirm('Delete permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger shadow-sm" title="Force Delete">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-4 text-muted">
                                    <i class="fas fa-trash-alt fa-3x mb-3 text-muted d-block"></i>
                                    No bookings in trash
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
