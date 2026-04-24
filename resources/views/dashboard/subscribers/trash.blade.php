@extends('dashboard.layout.admin')

@section('content')
<div class="container-fluid pt-4">
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title">Deleted Subscribers List</h3>

            <div class="card-tools">
                <form action="{{ route('admin.subscribers.restoreAll') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-trash-restore"></i> Restore All
                    </button>
                </form>

                <form action="{{ route('admin.subscribers.forceDeleteAll') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete all permanently?')">
                        <i class="fas fa-fire"></i> Empty Trash
                    </button>
                </form>

                <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Deleted At</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscribers as $subscriber)
                    <tr>
                        <td>{{ $subscriber->id }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>{{ $subscriber->deleted_at->format('Y-m-d H:i') }}</td>
                        <td class="text-right">
                            <form action="{{ route('admin.subscribers.restore', $subscriber->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-xs">Restore</button>
                            </form>
                            <form action="{{ route('admin.subscribers.forceDelete', $subscriber->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">Trash is empty.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
