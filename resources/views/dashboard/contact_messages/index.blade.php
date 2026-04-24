@extends('dashboard.layout.admin')

@section('title', 'Inbox')

@section('content')
    <div class="container-fluid pt-4">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-envelope mr-2"></i> Messages Inbox</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.contact_messages.create') }}" class="btn btn-success btn-sm"
                        title="Add New Message">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('admin.contact_messages.trash') }}" class="btn btn-danger btn-sm" title="View Trash">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0 text-center">
                    <thead>
                        <tr>
                            <th style="width: 20%">From</th>
                            <th style="width: 30%">Subject</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 15%">Date</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                            <tr>
                                <td class="text-left pl-4 font-weight-bold">{{ $msg->email }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($msg->subject, 30) }}</td>
                                <td>
                                    @if ($msg->is_read)
                                        <span class="badge badge-light text-success border border-success"><i
                                                class="fas fa-check-double mr-1"></i> Read</span>
                                    @else
                                        <span class="badge badge-warning"><i class="fas fa-bell mr-1"></i> New</span>
                                    @endif
                                </td>
                                <td><small class="text-muted">{{ $msg->created_at->format('Y-m-d') }}</small></td>
                                <td>
                                    <a href="{{ route('admin.contact_messages.show', $msg->id) }}"
                                        class="btn btn-info btn-xs" title="View Details">
                                        <i class="fas fa-eye text-white"></i>
                                    </a>

                                    <a href="{{ route('admin.contact_messages.edit', $msg->id) }}"
                                        class="btn btn-warning btn-xs" title="Edit Message">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>

                                    <form action="{{ route('admin.contact_messages.destroy', $msg->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Move to trash?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" title="Move to Trash">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-5 text-muted">
                                    <i class="fas fa-inbox fa-3x mb-3"></i>
                                    <p>No messages found in your inbox.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($messages->hasPages())
                <div class="card-footer clearfix">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
