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

            <div class="card card-info card-outline shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit mr-2"></i>Edit Team Member: {{ $team->name }}</h3>
                </div>

                <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            {{-- Full Name --}}
                            <div class="col-md-6 form-group">
                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $team->name) }}" required>
                                </div>
                            </div>

                            {{-- Position Dropdown --}}
                            <div class="col-md-6 form-group">
                                <label for="position">Position / Specialization <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white"><i
                                                class="fas fa-stethoscope"></i></span>
                                    </div>
                                    <select name="position" id="position"
                                        class="form-control @error('position') is-invalid @enderror" required>
                                        @foreach (['Cardiologist', 'Pediatrician', 'Neurologist', 'Surgeon', 'Dentist', 'General Practitioner'] as $pos)
                                            <option value="{{ $pos }}"
                                                {{ old('position', $team->position) == $pos ? 'selected' : '' }}>
                                                {{ $pos }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="image">Profile Image</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white"><i
                                                class="fas fa-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="image"
                                            class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                                        <label class="custom-file-label" for="image">Choose new image to replace current
                                            one...</label>
                                    </div>
                                </div>

                                {{-- <div class="mt-3">
                                    <p class="mb-1 small text-muted">Current Image:</p>
                                    <img src="{{ $team->image ? asset($team->image) : 'https://ui-avatars.com/api/?name=' . urlencode($team->name) }}"
                                        alt="Current Image" class="img-thumbnail shadow-sm" width="100">
                                </div> --}}
                            </div>
                        </div>

                        {{-- Biography --}}
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="bio">Biography</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white"><i
                                                class="fas fa-book-open"></i></span>
                                    </div>
                                    <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="3"
                                        placeholder="Write a brief biography...">{{ old('bio', $team->bio) }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Social Media Links --}}
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Facebook URL</label>
                                <input type="url" name="facebook_url" class="form-control"
                                    value="{{ old('facebook_url', $team->facebook_url) }}">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Twitter URL</label>
                                <input type="url" name="twitter_url" class="form-control"
                                    value="{{ old('twitter_url', $team->twitter_url) }}">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>LinkedIn URL</label>
                                <input type="url" name="linkedin_url" class="form-control"
                                    value="{{ old('linkedin_url', $team->linkedin_url) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-right">
                        <a href="{{ route('admin.team.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-info px-4">Update Member</button>
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
