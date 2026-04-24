@extends('dashboard.layout.admin')

@section('title', 'Subscribers')

@section('content_header')
    <h1>Subscribers Management</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Active Subscribers</h3>

        <div class="card-tools">
            <a href="{{ route('admin.subscribers.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Add New Subscriber
            </a>
            <a href="{{ route('admin.subscribers.trash') }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> View Trash
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Subscribed Date</th>
                    <th style="width: 150px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->id }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>
                        @if($subscriber->user)
                            <span class="badge badge-info">{{ $subscriber->user->name }}</span>
                        @else
                            <span class="badge badge-secondary">Guest</span>
                        @endif
                    </td>
                    <td>{{ $subscriber->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" class="btn btn-warning btn-xs">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Move to trash?')">
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
                    <td colspan="5" class="text-center">No subscribers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($subscribers->hasPages())
    <div class="card-footer clearfix">
        {{ $subscribers->links() }}
    </div>
    @endif
</div>
@stop
