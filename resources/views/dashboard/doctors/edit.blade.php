@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mx-3 mt-2">
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

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-3 mt-2">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info card-outline shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Edit Account</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group text-center">
                                <img id="preview"
                                     src="{{ $doctor->user->image ? asset('storage/' . $doctor->user->image) : asset('dashboard_assets/dist/img/avatar5.png') }}"
                                     class="img-circle elevation-2 mb-2" width="100" height="100"
                                     onerror="this.src='{{ asset('dashboard_assets/dist/img/avatar5.png') }}'">

                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageInput"
                                        onchange="previewImage(this)">
                                    <label class="custom-file-label" for="imageInput">Change Image</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $doctor->user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email', $doctor->user->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Password <small class="text-muted">(Leave blank to keep current)</small></label>
                                <input type="password" name="password" class="form-control" placeholder="******">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-success card-outline shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Professional Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ old('title', $doctor->title) }}" required>
                            </div>
                            <div class="form-group">
                                <label>Education</label>
                                <textarea name="education" class="form-control" rows="2">{{ old('education', $doctor->education) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card card-primary card-outline shadow-sm mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Social Links</h3>
                        </div>
                        <div class="card-body p-2">
                            <input type="url" name="facebook" class="form-control mb-2" placeholder="Facebook Link"
                                   value="{{ old('facebook', $doctor->facebook ?? '') }}">
                            <input type="url" name="twitter" class="form-control mb-2" placeholder="Twitter Link"
                                   value="{{ old('twitter', $doctor->twitter ?? '') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3 pb-5">
                <button type="submit" class="btn btn-info btn-lg px-5 shadow">Update Profile</button>
                <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary btn-lg px-5 shadow ml-2">Cancel</a>
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
