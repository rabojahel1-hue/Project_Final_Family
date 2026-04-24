@extends('dashboard.layout.admin')

@section('content')
    <div class="row pt-4">
        <div class="col-12">
            {{-- @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="icon fas fa-check"></i>
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title flex-grow-1">Medical Services List</h3>
                    <div class="card-tools d-flex" style="gap: 10px;">
                        <a href="{{ route('admin.services.trash') }}" class="btn btn-warning btn-sm shadow-sm">
                            <i class="fas fa-trash-alt"></i> Trash
                        </a>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-plus-circle"></i> Create New Service
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Doctor</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->duration }} Min</td>
                                    <td>${{ $service->price }}</td>
                                    <td>
                                        <span class="badge badge-info">
                                            {{ $service->doctor->user->name ?? 'No Doctor' }}
                                        </span>
                                    </td>
                                    <td>{{ Str::limit($service->description, 30) }}</td>
                                    <td>
                                        @if ($service->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.services.show', $service->id) }}"
                                            class="btn btn-default btn-sm">
                                            <i class="fas fa-eye"></i> Show
                                        </a>
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE') <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
