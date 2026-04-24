@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Edit Social Link</h3>
                    </div>

                    <form action="{{ route('admin.social-links.update', $link->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Platform Name</label>
                                <input type="text" name="platform" class="form-control" value="{{ $link->platform }}"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Profile URL</label>
                                <input type="url" name="url" class="form-control" value="{{ $link->url }}"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Assign Doctor</label>
                                <select name="linkable_id" class="form-control select2bs4" required>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ $link->linkable_id == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->user->name ?? 'No Name' }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="linkable_type" value="App\Models\Doctor">
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('admin.social-links.index') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info px-4">Update Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@stop
