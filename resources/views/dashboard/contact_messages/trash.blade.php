@extends('dashboard.layout.admin')
@section('content')
    <div class="container-fluid pt-4">
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Deleted Messages</h3>
                <div class="card-tools">
                    <form action="{{ route('admin.contact_messages.restoreAll') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-undo"></i> Restore All</button>
                    </form>
                    {{-- <form action="{{ route('admin.contact_messages.forceDeleteAll') }}" method="POST"
                        class="d-inline ml-1">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-fire"></i> Empty
                            Trash</button>
                    </form> --}}
                    <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-secondary btn-sm ml-1">Back</a>
                </div>
            </div>
            <div class="card-body p-0 text-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                            <tr>
                                <td>{{ $msg->email }}</td>
                                <td>{{ $msg->subject }}</td>
                                <td class="text-right">
                                    <form action="{{ route('admin.contact_messages.restore', $msg->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-xs">Restore</button>
                                    </form>
                                    <form action="{{ route('admin.contact_messages.forceDelete', $msg->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">Permanent Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Trash is empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
