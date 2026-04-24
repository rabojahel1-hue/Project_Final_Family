@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Trashed</b> Services</h3>
                <div class="d-flex" style="gap: 10px;">
                    <form action="{{ route('admin.services.restoreAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-undo-alt mr-1"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('admin.services.forceDeleteAll') }}" method="POST" onsubmit="return confirm('Clear all services forever?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                            <i class="fas fa-trash-alt mr-1"></i> Delete All
                        </button>
                    </form>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm shadow-sm">Back</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0 text-nowrap">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Duration</th>
                            <th>Price</th>
                            <th>Providing Doctor</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->duration }} Min</td>
                            <td>${{ $service->price }}</td>
                            <td>
                                <span class="badge badge-secondary">
                                    {{ $service->doctor->user->name ?? 'No Doctor' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <form action="{{ route('admin.services.restore', $service->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-info text-white shadow-sm" title="Restore"><i class="fas fa-undo-alt"></i></button>
                                    </form>
                                    <form action="{{ route('admin.services.forceDelete', $service->id) }}" method="POST" onsubmit="return confirm('Delete permanently?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger shadow-sm" title="Force Delete"><i class="fas fa-times-circle"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-muted">No services in trash</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
