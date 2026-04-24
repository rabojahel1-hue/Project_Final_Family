@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Trashed</b> Team Members</h3>
                <div class="d-flex" style="gap: 10px;">
                    <form action="{{ route('admin.team.restoreAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-undo-alt"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('admin.team.forceDeleteAll') }}" method="POST" onsubmit="return confirm('Delete all team members forever?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete All
                        </button>
                    </form>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Member</th>
                            <th>Position</th>
                            <th>Deleted At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                        <tr>
                            <td class="align-middle">#{{ $member->id }}</td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $member->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($member->name) }}"
                                         class="img-circle elevation-2 mr-2" width="35" height="35" style="object-fit: cover;">
                                    <div>
                                        <strong>{{ $member->name }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{ $member->position }}</td>
                            <td class="align-middle">
                                <span class="badge badge-danger">
                                    {{ $member->deleted_at ? $member->deleted_at->format('M d, Y h:i A') : 'N/A' }}
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <form action="{{ route('admin.team.restore', $member->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <button class="btn btn-sm btn-info" title="Restore">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.team.forceDelete', $member->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Permanent Delete">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-5">
                                    <i class="fas fa-trash-alt fa-3x text-muted mb-3 d-block"></i>
                                    <h5 class="text-muted">No team members in trash</h5>
                                    <a href="{{ route('admin.team.index') }}" class="btn btn-primary mt-2">
                                        <i class="fas fa-arrow-left mr-1"></i> Back to Team
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $members->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
