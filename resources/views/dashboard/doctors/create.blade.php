@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mx-2">
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-circle mr-2"></i>Account & Identity</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group text-center">
                                <label>Doctor's Profile Image</label>
                                <div class="mb-3">
                                    <img id="preview" src="{{ asset('dashboard_assets/dist/img/avatar5.png') }}"
                                        class="img-circle elevation-2" width="100" height="100" style="object-fit: cover;">
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageInput"
                                        onchange="previewImage(this)">
                                    <label class="custom-file-label" for="imageInput">Choose image...</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="email@example.com" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="******" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-success card-outline shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-briefcase mr-2"></i>Professional Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Specialization (Title)</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. Senior Surgeon"
                                    value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Education / Degrees</label>
                                <textarea name="education" class="form-control" rows="2"
                                    placeholder="e.g. PhD in Cardiology">{{ old('education') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info card-outline shadow-sm mt-3">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-share-alt mr-2"></i>Social Media Links</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"><span class="input-group-text bg-primary text-white"><i
                                            class="fab fa-facebook-f"></i></span></div>
                                <input type="url" name="facebook" class="form-control" value="{{ old('facebook') }}"
                                    placeholder="https://facebook.com/...">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"><span class="input-group-text bg-info text-white"><i
                                            class="fab fa-twitter"></i></span></div>
                                <input type="url" name="twitter" class="form-control" value="{{ old('twitter') }}"
                                    placeholder="https://twitter.com/...">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend"><span class="input-group-text bg-danger text-white"><i
                                            class="fab fa-instagram"></i></span></div>
                                <input type="url" name="instagram" class="form-control" value="{{ old('instagram') }}"
                                    placeholder="https://instagram.com/...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-5">
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary btn-lg shadow px-5">Create Doctor Profile</button>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary btn-lg px-5 shadow ml-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);

                var fileName = input.files[0].name;
                $(input).next('.custom-file-label').html(fileName);
            }
        }
    </script>
@endsection
