@extends('dashboard.layout.admin')

@section('content')
<div class="row pt-4">
    <div class="col-md-8 offset-md-2">
        <div class="card card-warning card-outline shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Testimonial Details</h3>
            </div>

            <div class="card-body">
                <div class="text-center mb-4">
                    @if($testimonial->client_image)
                        <img src="{{ asset($testimonial->client_image) }}"
                             class="img-circle elevation-2"
                             width="120" height="120"
                             style="object-fit: cover; border: 3px solid #ffc107;">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->client_name) }}&background=random&size=128"
                             class="img-circle elevation-2"
                             width="120" height="120">
                    @endif

                    <h3 class="mt-3">{{ $testimonial->client_name }}</h3>
                    <p class="badge badge-info">{{ $testimonial->client_position ?? 'Client' }}</p>

                    <div class="mt-2 text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star text-muted"></i>
                            @endif
                        @endfor
                        <span class="text-dark">({{ $testimonial->rating }}/5)</span>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label><i class="fas fa-quote-left text-warning"></i> Client Message:</label>
                    <div class="p-3 bg-light rounded shadow-sm">
                        {{ $testimonial->content }}
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6">
                        <p><b>Status:</b>
                            @if($testimonial->is_active)
                                <span class="text-success">● Published</span>
                            @else
                                <span class="text-danger">● Hidden</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <small class="text-muted">Created: {{ $testimonial->created_at->format('Y-m-d') }}</small>
                    </div>
                </div>

                <div class="card-footer bg-transparent text-center mt-3">
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-info">Edit</a>

                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
