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
                    <h3 class="card-title"><i class="fas fa-edit mr-2"></i>Edit Service: {{ $service->name }}</h3>
                </div>

                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <label>Service Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $service->name) }}" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Price ($)</label>
                                <input type="number" step="0.01" name="price" class="form-control"
                                    value="{{ old('price', $service->price) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Duration (Minutes)</label>
                                <div class="input-group">
                                    <input type="number" name="duration" class="form-control"
                                        value="{{ old('duration', $service->duration) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="status">Service Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor_id">Assigned Doctor</label>
                            <select name="doctor_id" class="form-control" id="doctor_id" required>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"
                                        {{ old('doctor_id', $service->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $service->description) }}</textarea>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-right">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-default mr-2">Cancel</a>
                        <button type="submit" class="btn btn-info px-4">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
