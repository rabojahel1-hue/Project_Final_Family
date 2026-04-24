@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-calendar-alt mr-2"></i> Doctors Schedules</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.schedules.create') }}" class="btn btn-success btn-sm" title="Add Schedule">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
            </div>
            <div class="card-body p-0 text-center">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Day</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $item)
                            <tr>
                                <td>
                                    <strong>
                                        {{ $item->doctor->user->name ?? ($item->doctor->name ?? 'No Name') }}
                                    </strong>
                                </td>
                                <td><span class="badge badge-info">{{ $item->day_of_week }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</td>
                                <td>
                                    <a href="{{ route('admin.schedules.show', $item->id) }}" class="btn btn-info btn-xs">
                                        <i class="fas fa-eye text-white"></i>
                                    </a>

                                    <a href="{{ route('admin.schedules.edit', $item->id) }}" class="btn btn-warning btn-xs">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>

                                    <form action="{{ route('admin.schedules.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Delete this schedule?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-muted">No schedules found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
