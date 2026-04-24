@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-12">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h3 class="card-title flex-grow-1"><b>Testimonials</b> Management</h3>
                <div class="d-flex" style="gap: 10px;">
                    <a href="{{ route('admin.testimonials.trash') }}" class="btn btn-warning btn-sm shadow-sm text-white">
                        <i class="fas fa-trash-alt mr-1"></i> Trash
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus-circle mr-1"></i> Add New Testimonial
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 20%">Client</th>
                            <th style="width: 35%">Content</th>
                            <th style="width: 10%">Rating</th>
                            <th style="width: 10%">Status</th>
                            <th style="width: 20%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="align-middle font-weight-bold">#{{ $testimonial->id }}</td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    @php
                                        $fallbackAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->client_name) . '&background=random&color=fff&size=128&bold=true';
                                    @endphp

                                    <img src="{{ $testimonial->client_image ? asset($testimonial->client_image) : $fallbackAvatar }}"
                                         class="img-circle elevation-2 mr-3"
                                         width="50" height="50"
                                         style="object-fit: cover; border: 2px solid #ffc107;"
                                         alt="{{ $testimonial->client_name }}"
                                         onerror="this.src='{{ $fallbackAvatar }}'">

                                    <div>
                                        <div class="font-weight-bold">{{ $testimonial->client_name }}</div>
                                        <small class="text-muted">{{ $testimonial->client_position ?? 'Client' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="text-muted small">
                                    <i class="fas fa-quote-left text-warning mr-1"></i>
                                    {{ Str::limit($testimonial->content, 80) }}
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center" style="gap: 2px; font-size: 0.8rem;">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-muted"></i>
                                        @endif
                                    @endfor
                                </div>
                                <small class="text-muted font-weight-bold">{{ $testimonial->rating }}/5</small>
                            </td>
                            <td class="align-middle text-center">
                                @if($testimonial->is_active)
                                    <span class="badge badge-success p-2 px-3 shadow-sm">
                                        <i class="fas fa-check-circle mr-1"></i> Published
                                    </span>
                                @else
                                    <span class="badge badge-secondary p-2 px-3 shadow-sm">
                                        <i class="fas fa-eye-slash mr-1"></i> Hidden
                                    </span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center" style="gap: 8px;">
                                    <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" class="btn btn-sm btn-success shadow-sm" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-info shadow-sm text-white" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-5">
                                    <i class="fas fa-star fa-3x text-muted mb-3 d-block"></i>
                                    <h5 class="text-muted">No testimonials found</h5>
                                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-warning mt-2 text-white">
                                        <i class="fas fa-plus-circle mr-1"></i> Add your first testimonial
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix bg-white">
                <div class="float-right">
                    {{ $testimonials->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
