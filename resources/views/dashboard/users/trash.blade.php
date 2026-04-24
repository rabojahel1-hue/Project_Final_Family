@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Trashed</b> Users</h3>
                <div class="d-flex" style="gap: 10px;">
                    <form action="{{ route('admin.users.restoreAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-undo-alt"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('admin.users.forceDeleteAll') }}" method="POST" onsubmit="return confirm('Empty trash forever?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-bomb"></i> Delete All
                        </button>
                    </form>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">Back to Users</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="text-center align-middle">
                                <span class="badge badge-secondary">{{ $user->role }}</span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-info text-white" title="Restore"><i class="fas fa-trash-restore"></i></button>
                                    </form>
                                    <form action="{{ route('admin.users.forceDelete', $user->id) }}" method="POST" onsubmit="return confirm('Delete permanently?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Permanent Delete"><i class="fas fa-times-circle"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Trash is empty</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
