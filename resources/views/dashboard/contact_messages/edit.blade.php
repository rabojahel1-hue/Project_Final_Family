@extends('dashboard.layout.admin')

@section('title', 'Edit Message')

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">Edit Message Details</h3>
                </div>

                <form action="{{ route('admin.contact_messages.update', $contactMessage->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $contactMessage->email }}" required>
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{ $contactMessage->subject }}" required>
                        </div>

                        <div class="form-group">
                            <label>Message Content</label>
                            <textarea name="message" class="form-control" rows="5" required>{{ $contactMessage->message }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_read" class="custom-control-input" id="isReadSwitch" {{ $contactMessage->is_read ? 'checked' : '' }}>
                                <label class="custom_control-label" for="isReadSwitch">Mark as Read</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning">Update Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
