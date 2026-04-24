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

            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user-plus mr-2"></i>Add New Team Member</h3>
                </div>

                <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            {{-- Full Name --}}
                            <div class="col-md-6 form-group">
                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white"><i
                                                class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="Enter full name" required>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="position">Position / Specialization <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white"><i
                                                class="fas fa-stethoscope"></i></span>
                                    </div>
                                    <select name="position" id="position"
                                        class="form-control @error('position') is-invalid @enderror" required>
                                        <option value="" selected disabled>-- Select Position --</option>
                                        <option value="Cardiologist"
                                            {{ old('position') == 'Cardiologist' ? 'selected' : '' }}>Cardiologist</option>
                                        <option value="Pediatrician"
                                            {{ old('position') == 'Pediatrician' ? 'selected' : '' }}>Pediatrician</option>
                                        <option value="Neurologist"
                                            {{ old('position') == 'Neurologist' ? 'selected' : '' }}>Neurologist</option>
                                        <option value="Surgeon" {{ old('position') == 'Surgeon' ? 'selected' : '' }}>Surgeon
                                        </option>
                                        <option value="Dentist" {{ old('position') == 'Dentist' ? 'selected' : '' }}>Dentist
                                        </option>
                                        <option value="General Practitioner"
                                            {{ old('position') == 'General Practitioner' ? 'selected' : '' }}>General
                                            Practitioner</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="image">Profile Image <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white"><i
                                                class="fas fa-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="image"
                                            class="custom-file-input @error('image') is-invalid @enderror" accept="image/*"
                                            required>
                                        <label class="custom-file-label" for="image">Choose image from your
                                            computer...</label>
                                    </div>
                                </div>
                                <small class="text-muted">Recommended size: 500x500px (JPG, PNG)</small>
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
                                        placeholder="Write a brief biography...">{{ old('bio') }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Social Media Links --}}
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Facebook URL</label>
                                <input type="url" name="facebook_url" class="form-control"
                                    value="{{ old('facebook_url') }}" placeholder="https://facebook.com/...">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Twitter URL</label>
                                <input type="url" name="twitter_url" class="form-control"
                                    value="{{ old('twitter_url') }}" placeholder="https://twitter.com/...">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>LinkedIn URL</label>
                                <input type="url" name="linkedin_url" class="form-control"
                                    value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/...">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-right">
                        <a href="{{ route('admin.team.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">Save Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("image").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
@endsection
