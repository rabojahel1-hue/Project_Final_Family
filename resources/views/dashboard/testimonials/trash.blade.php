@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Trashed</b> Testimonials</h3>
                <div class="d-flex" style="gap: 10px;">
                    <form action="{{ route('admin.testimonials.restoreAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-undo-alt mr-1"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('admin.testimonials.forceDeleteAll') }}" method="POST" onsubmit="return confirm('Delete all testimonials forever?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt mr-1"></i> Delete All
                        </button>
                    </form>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 25%">Client</th>
                            <th style="width: 30%">Content</th>
                            <th style="width: 10%">Rating</th>
                            <th style="width: 15%">Deleted At</th>
                            <th style="width: 15%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="align-middle">#{{ $testimonial->id }}</td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $testimonial->client_image ?? 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->client_name) }}"
                                         class="img-circle elevation-2 mr-2" width="40" height="40" style="object-fit: cover;">
                                    <div>
                                        <strong>{{ $testimonial->client_name }}</strong><br>
                                        <small class="text-muted">{{ $testimonial->client_position ?? 'Client' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                {{ Str::limit($testimonial->content, 60) }}
                            </td>
                            <td class="align-middle text-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </td>
                            <td class="align-middle">
                                <span class="badge badge-danger">
                                    {{ $testimonial->deleted_at ? $testimonial->deleted_at->format('M d, Y h:i A') : 'N/A' }}
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <form action="{{ route('admin.testimonials.restore', $testimonial->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <button class="btn btn-sm btn-info" title="Restore">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.testimonials.forceDelete', $testimonial->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Permanent Delete">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-5">
                                    <i class="fas fa-trash-alt fa-3x text-muted mb-3 d-block"></i>
                                    <h5 class="text-muted">No testimonials in trash</h5>
                                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary mt-2">
                                        <i class="fas fa-arrow-left mr-1"></i> Back to Testimonials
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
