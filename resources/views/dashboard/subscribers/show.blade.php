@extends('dashboard.layout.admin')

@section('title', 'Subscriber Details')

@section('content_header')
    <h1>Subscriber Details</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $subscriber->id }}</p>
        <p><strong>Email:</strong> {{ $subscriber->email }}</p>
        <p><strong>User:</strong> {{ $subscriber->user?->name ?? 'Guest' }}</p>
        <p><strong>Created:</strong> {{ $subscriber->created_at }}</p>
    </div>
</div>

<a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">Back</a>

@stop
