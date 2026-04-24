@extends('dashboard.layout.admin')

@section('title', 'View Message')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Read Message</h3>
                        <div class="card-tools">
                            <span
                                class="badge badge-light text-muted">{{ $contactMessage->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="mailbox-read-info p-4 border-bottom">
                            <h4 class="mb-2">{{ $contactMessage->subject }}</h4>
                            <h6 class="text-muted">
                                <span class="text-dark font-weight-bold">From:</span> {{ $contactMessage->email }}
                                <span
                                    class="float-right badge {{ $contactMessage->is_read ? 'badge-success' : 'badge-warning' }}">
                                    {{ $contactMessage->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </h6>
                        </div>

                        <div class="mailbox-read-message p-4"
                            style="min-height: 200px; background-color: #fdfdfd; line-height: 1.6;">
                            {!! nl2br(e($contactMessage->message)) !!}
                        </div>
                    </div>

                    <div class="card-footer bg-white border-top">
                        <div class="float-right">
                            <form action="{{ route('admin.contact_messages.destroy', $contactMessage->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Move this message to trash?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>

                        <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Inbox
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .mailbox-read-info h4 {
            font-size: 1.5rem;
            color: #333;
        }

        .mailbox-read-message {
            font-size: 1.1rem;
            color: #555;
            border: 1px solid #eee;
            border-radius: 4px;
        }
    </style>
@endsection
