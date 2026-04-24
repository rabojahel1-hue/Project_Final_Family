@extends('dashboard.layout.admin')

@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header align-items-center d-flex justify-content-between">
                    <h3 class="card-title flex-grow-1"><b>System</b> Users</h3>

                    <a href="{{ route('admin.users.trash') }}" class="btn btn-warning mr-2">
                        <i class="fas fa-trash-alt"></i> View Trash
                    </a>

                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus-circle mr-1"></i> Add User
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light text-center">
                            <tr>
                                <th style="width: 20%">Name</th>
                                <th style="width: 25%">Email</th>
                                <th style="width: 15%">Role</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 25%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="align-middle font-weight-bold text-dark">{{ $user->name }}</td>
                                    <td class="align-middle text-secondary">{{ $user->email }}</td>

                                    {{-- Role Centered with Solid Colors --}}
                                    <td class="text-center align-middle">
                                        @if ($user->role == 'admin')
                                            <span class="badge badge-danger p-2 px-3 shadow-sm"
                                                style="min-width: 85px;">Admin</span>
                                        @elseif($user->role == 'doctor')
                                            <span class="badge badge-info p-2 px-3 shadow-sm"
                                                style="min-width: 85px;">Doctor</span>
                                        @elseif($user->role == 'assistant')
                                            <span class="badge badge-warning text-dark p-2 px-3 shadow-sm"
                                                style="min-width: 85px;">Assistant</span>
                                        @else
                                            <span class="badge badge-secondary p-2 px-3 shadow-sm"
                                                style="min-width: 85px;">Patient</span>
                                        @endif
                                    </td>

                                    {{-- Status Centered with Solid Colors --}}
                                    <td class="text-center align-middle">
                                        <span
                                            class="badge {{ $user->status ? 'badge-success' : 'badge-danger' }} p-2 px-3 shadow-sm"
                                            style="min-width: 85px;">
                                            <i class="fas {{ $user->status ? 'fa-check-circle' : 'fa-ban' }} mr-1"></i>
                                            {{ $user->status ? 'Active' : 'Blocked' }}
                                        </span>
                                    </td>

                                    {{-- Actions Centered with Solid Buttons --}}
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center align-items-center" style="gap: 8px;">
                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                                class="btn btn-sm btn-primary shadow-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-sm btn-info shadow-sm text-white" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger shadow-sm"
                                                    title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
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
