@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Trashed</b> Doctors</h3>
                <div class="d-flex" style="gap: 10px;">
                    <form action="{{ route('admin.doctors.restoreAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-undo-alt mr-1"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('admin.doctors.forceDeleteAll') }}" method="POST" onsubmit="return confirm('Delete all doctors forever?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                            <i class="fas fa-user-times mr-1"></i> Delete All
                        </button>
                    </form>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary btn-sm shadow-sm">Back</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($doctors as $doctor)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . ($doctor->user->image ?? '')) }}"
                                     class="img-circle elevation-2" width="40" height="40"
                                     style="object-fit: cover" onerror="this.src='{{ asset('dashboard_assets/dist/img/avatar5.png') }}'">
                            </td>
                            <td>{{ $doctor->user->name ?? 'N/A' }}</td>
                            <td><span class="badge badge-info">{{ $doctor->title }}</span></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <form action="{{ route('admin.doctors.restore', $doctor->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-info text-white shadow-sm" title="Restore"><i class="fas fa-undo-alt"></i></button>
                                    </form>
                                    <form action="{{ route('admin.doctors.forceDelete', $doctor->id) }}" method="POST" onsubmit="return confirm('Delete permanently?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger shadow-sm" title="Force Delete"><i class="fas fa-times-circle"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center p-4 text-muted">No doctors in trash</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
