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
                    <h3 class="card-title"><i class="fas fa-star mr-2"></i>Add New Testimonial</h3>
                    <div class="card-tools">
                        <span class="badge badge-warning">Client Review</span>
                    </div>
                </div>

                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                        value="{{ old('client_name') }}" placeholder="Enter client name" required>
                                </div>
                                @error('client_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                                        value="{{ old('client_position') }}" placeholder="e.g., CEO, Patient, Manager">
                                </div>
                                @error('client_position')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="client_image">Client Photo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white"><i
                                                class="fas fa-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        {{-- حقل رفع الملف --}}
                                        <input type="file" name="client_image" id="client_image"
                                            class="custom-file-input @error('client_image') is-invalid @enderror"
                                            accept="image/*">
                                        <label class="custom-file-label" for="client_image">Choose photo from your
                                            device...</label>
                                    </div>
                                </div>
                                <small class="text-muted">Recommended: Square image (JPG, PNG). Leave empty to use
                                    auto-avatar.</small>
                                @error('client_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                                        placeholder="Write the client's testimonial here..." required>{{ old('content') }}</textarea>
                                </div>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                                        <option value="5" {{ old('rating', 5) == 5 ? 'selected' : '' }}>★★★★★ (5/5) -
                                            Excellent</option>
                                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>★★★★☆ (4/5) -
                                            Very Good</option>
                                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>★★★☆☆ (3/5) -
                                            Good</option>
                                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>★★☆☆☆ (2/5) -
                                            Fair</option>
                                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>★☆☆☆☆ (1/5) -
                                            Poor</option>
                                    </select>
                                </div>
                                @error('rating')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 form-group">
                                <label for="is_active">Status</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white"><i
                                                class="fas fa-globe"></i></span>
                                    </div>
                                    <select name="is_active" id="is_active"
                                        class="form-control @error('is_active') is-invalid @enderror">
                                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>✅ Active -
                                            Show on website</option>
                                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>❌ Inactive -
                                            Hide from website</option>
                                    </select>
                                </div>
                                @error('is_active')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-right">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-default">
                            <i class="fas fa-times mr-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning px-4 text-white">
                            <i class="fas fa-save mr-1"></i> Save Testimonial
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
