@extends('dashboard.layout.admin')

@section('title', 'Social Link')

@section('content')

<h3>Social Link Details</h3>

<div class="card">
    <div class="card-body">
        <p><strong>Platform:</strong> {{ $link->platform }}</p>
        <p><strong>URL:</strong> {{ $link->url }}</p>
        <p><strong>Type:</strong> {{ class_basename($link->linkable_type) }}</p>
        <p><strong>ID:</strong> {{ $link->linkable_id }}</p>
    </div>
</div>

@stop
