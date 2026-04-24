@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title flex-grow-1">Doctors Management</h3>
                <div class="d-flex" style="gap: 10px;">
                    <a href="{{ route('admin.doctors.trash') }}" class="btn btn-warning btn-sm shadow-sm">
                        <i class="fas fa-trash-alt"></i> Trash
                    </a>
                    <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary btn-sm shadow-sm">
                        <i class="fas fa-plus"></i> Add New Doctor
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $doctor->user->image) }}" class="img-circle elevation-2"
                                        width="40" height="40" style="object-fit: cover"
                                        onerror="this.src='{{ asset('dashboard_assets/dist/img/avatar5.png') }}'">
                                </td>
                                <td>{{ $doctor->user->name }}</td>
                                <td><span class="badge badge-info">{{ $doctor->title }}</span></td>
                                <td>{{ $doctor->user->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.doctors.show', $doctor->id) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-sm btn-info"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
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
@endsection
