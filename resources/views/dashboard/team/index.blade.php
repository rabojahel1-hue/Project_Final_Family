@extends('dashboard.layout.admin')

@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header align-items-center d-flex justify-content-between">
                    <h3 class="card-title flex-grow-1"><b>Team</b> Members</h3>
                    <div class="d-flex" style="gap: 10px;">
                        <a href="{{ route('admin.team.trash') }}" class="btn btn-warning btn-sm shadow-sm">
                            <i class="fas fa-trash-alt mr-1"></i> Trash
                        </a>
                        <a href="{{ route('admin.team.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fas fa-plus-circle mr-1"></i> Add New Member
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 25%">Member</th>
                                <th style="width: 20%">Specialization</th>
                                <th style="width: 15%">Social Links</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 15%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $member)
                                <tr>
                                    <td class="align-middle font-weight-bold">#{{ $member->id }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            {{-- منطق الصورة: إذا لم توجد صورة نستخدم UI Avatars الاحترافي --}}
                                            @php
                                                $avatarUrl =
                                                    'https://ui-avatars.com/api/?name=' .
                                                    urlencode($member->name) .
                                                    '&background=random&color=fff&size=128&bold=true';
                                            @endphp

                                            <img src="{{ $member->image ? asset($member->image) : $avatarUrl }}"
                                                class="img-circle elevation-2 mr-3" width="45" height="45"
                                                style="object-fit: cover; border: 1px solid #ddd;" alt="{{ $member->name }}"
                                                onerror="this.src='{{ $avatarUrl }}'">

                                            <div>
                                                <div class="font-weight-bold">{{ $member->name }}</div>
                                                <small class="text-muted">{{ Str::limit($member->bio, 40) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge badge-info p-2 px-3 shadow-sm">{{ $member->position }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex" style="gap: 8px;">
                                            @if ($member->facebook_url)
                                                <a href="{{ $member->facebook_url }}" target="_blank"
                                                    class="btn btn-sm btn-primary btn-circle shadow-sm" title="Facebook">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-sm btn-secondary btn-circle disabled" disabled><i
                                                        class="fab fa-facebook-f"></i></button>
                                            @endif

                                            @if ($member->twitter_url)
                                                <a href="{{ $member->twitter_url }}" target="_blank"
                                                    class="btn btn-sm btn-info btn-circle shadow-sm" title="Twitter">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-sm btn-secondary btn-circle disabled" disabled><i
                                                        class="fab fa-twitter"></i></button>
                                            @endif

                                            @if ($member->linkedin_url)
                                                <a href="{{ $member->linkedin_url }}" target="_blank"
                                                    class="btn btn-sm btn-primary btn-circle shadow-sm" title="LinkedIn">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-sm btn-secondary btn-circle disabled" disabled><i
                                                        class="fab fa-linkedin-in"></i></button>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($member->is_active)
                                            <span class="badge badge-success p-2 px-3 shadow-sm">
                                                <i class="fas fa-check-circle mr-1"></i> Active
                                            </span>
                                        @else
                                            <span class="badge badge-danger p-2 px-3 shadow-sm">
                                                <i class="fas fa-ban mr-1"></i> Inactive
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center" style="gap: 8px;">
                                            <a href="{{ route('admin.team.show', $member->id) }}"
                                                class="btn btn-sm btn-success shadow-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.team.edit', $member->id) }}"
                                                class="btn btn-sm btn-info shadow-sm text-white" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this team member?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger shadow-sm"
                                                    title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">
                                        <i class="fas fa-users fa-3x text-muted mb-3 d-block"></i>
                                        <h5 class="text-muted">No team members found</h5>
                                        <a href="{{ route('admin.team.create') }}" class="btn btn-primary mt-2">
                                            <i class="fas fa-plus-circle mr-1"></i> Add your first team member
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix bg-white text-right">
                    <div class="d-inline-block">
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
    </style>
@endsection
