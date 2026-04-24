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

            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus-circle mr-2"></i>Add New Medical Service</h3>
                </div>

                <form action="{{ route('admin.services.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <label for="name">Service Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="e.g. General Checkup" value="{{ old('name') }}" required>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="price">Price ($)</label>
                                <input type="number" step="0.01" name="price" class="form-control" id="price"
                                    placeholder="0.00" value="{{ old('price') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="duration">Duration (Minutes)</label>
                                <div class="input-group">
                                    <input type="number" name="duration" class="form-control" id="duration"
                                        placeholder="30" value="{{ old('duration') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Min</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="status">Service Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active (Visible to
                                        patients)</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive (Hidden)
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor_id">Assign to Doctor</label>
                            <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror"
                                id="doctor_id" required>
                                <option value="">-- Select a Doctor --</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"
                                        {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->user->name }} ({{ $doctor->title }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Service Description</label>
                            <textarea name="description" class="form-control" id="description" rows="4"
                                placeholder="Briefly describe the service...">{{ old('description') }}</textarea>
                        </div>
                    </div>


                    <div class="card-footer bg-white text-right">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-default mr-2">Cancel</a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fas fa-save mr-1"></i> Save Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
