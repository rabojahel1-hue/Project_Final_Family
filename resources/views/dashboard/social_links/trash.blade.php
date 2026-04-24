@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Trashed</b> Social Links</h3>
                <div class="d-flex" style="gap: 10px;">
                    <form action="{{ route('admin.social-links.restoreAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-undo-alt mr-1"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('admin.social-links.forceDeleteAll') }}" method="POST" onsubmit="return confirm('Clear all social links forever?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                            <i class="fas fa-trash-alt mr-1"></i> Delete All Forever
                        </button>
                    </form>
                    <a href="{{ route('admin.social-links.index') }}" class="btn btn-secondary btn-sm shadow-sm">Back</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0 text-nowrap">
                    <thead>
                        <tr>
                            <th>Platform</th>
                            <th>URL</th>
                            <th>Doctor Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($links as $link)
                        <tr>
                            <td><span class="badge bg-info">{{ $link->platform }}</span></td>
                            <td><a href="{{ $link->url }}" target="_blank" class="text-sm">{{ Str::limit($link->url, 40) }}</a></td>
                            <td>
                                <span class="badge badge-secondary">
                                    {{ $link->linkable->user->name ?? 'No Doctor' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <form action="{{ route('admin.social-links.restore', $link->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-info text-white shadow-sm" title="Restore"><i class="fas fa-undo-alt"></i></button>
                                    </form>
                                    <form action="{{ route('admin.social-links.forceDelete', $link->id) }}" method="POST" onsubmit="return confirm('Delete permanently?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger shadow-sm" title="Force Delete"><i class="fas fa-times-circle"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center p-4 text-muted">No social links in trash</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
