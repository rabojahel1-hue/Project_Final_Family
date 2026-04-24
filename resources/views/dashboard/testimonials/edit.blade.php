@extends('dashboard.layout.admin')

@section('content')
    <div class="row pt-4">
        <div class="col-md-10 offset-md-1">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-warning card-outline shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit mr-2"></i>Edit Testimonial: {{ $testimonial->client_name }}
                    </h3>
                </div>

                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            {{-- Client Name --}}
                            <div class="col-md-6 form-group">
                                <label for="client_name">Client Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white"><i
                                                class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="client_name" id="client_name"
                                        class="form-control @error('client_name') is-invalid @enderror"
                                        value="{{ old('client_name', $testimonial->client_name) }}" required>
                                </div>
                            </div>

                            {{-- Client Position --}}
                            <div class="col-md-6 form-group">
                                <label for="client_position">Position / Role</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white"><i
                                                class="fas fa-briefcase"></i></span>
                                    </div>
                                    <input type="text" name="client_position" id="client_position"
                                        class="form-control @error('client_position') is-invalid @enderror"
                                        value="{{ old('client_position', $testimonial->client_position) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Client Image --}}
                            <div class="col-md-12 form-group">
                                <label for="client_image">Update Client Photo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white"><i
                                                class="fas fa-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="client_image" id="client_image"
                                            class="custom-file-input @error('client_image') is-invalid @enderror"
                                            accept="image/*">
                                        <label class="custom-file-label" for="client_image">Choose new photo to replace
                                            current one...</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Content --}}
                            <div class="col-md-12 form-group">
                                <label for="content">Testimonial Content <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white"><i
                                                class="fas fa-quote-left"></i></span>
                                    </div>
                                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="4"
                                        required>{{ old('content', $testimonial->content) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Rating --}}
                            <div class="col-md-6 form-group">
                                <label for="rating">Rating <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white"><i
                                                class="fas fa-star"></i></span>
                                    </div>
                                    <select name="rating" id="rating"
                                        class="form-control @error('rating') is-invalid @enderror" required>
                                        @for ($i = 5; $i >= 1; $i--)
                                            <option value="{{ $i }}"
                                                {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                                {{ str_repeat('★', $i) . str_repeat('☆', 5 - $i) }} ({{ $i }}/5)
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 form-group">
                                <label for="is_active">Status</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white"><i
                                                class="fas fa-globe"></i></span>
                                    </div>
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="1"
                                            {{ old('is_active', $testimonial->is_active) == 1 ? 'selected' : '' }}>✅ Active
                                        </option>
                                        <option value="0"
                                            {{ old('is_active', $testimonial->is_active) == 0 ? 'selected' : '' }}>❌
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-right">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-warning px-4 text-white">
                            <i class="fas fa-sync-alt mr-1"></i> Update Testimonial
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
@endsection
