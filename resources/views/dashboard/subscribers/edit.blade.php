@extends('dashboard.layout.admin')

@section('title', 'Edit Subscriber')

@section('content_header')
    <h1>Edit Subscriber</h1>
@stop

@section('content')

<form action="{{ route('admin.subscribers.update', $subscriber->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ $subscriber->email }}" class="form-control" required>
    </div>

    <button class="btn btn-primary mt-2">Update</button>
</form>

@stop
