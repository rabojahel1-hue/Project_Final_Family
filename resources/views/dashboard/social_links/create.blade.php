@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-success shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-plus-circle"></i> Add New Social Link</h3>
                    </div>

                    <form action="{{ route('admin.social-links.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Platform Name</label>
                                <input type="text" name="platform" class="form-control" placeholder="e.g. Facebook"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Profile URL</label>
                                <input type="url" name="url" class="form-control" placeholder="https://..."
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Assign to Doctor</label>
                                <select name="doctor_id" class="form-control" required>
                                    <option value="" selected disabled>-- Select a Doctor --</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->user->name ?? 'Doctor Name Not Found' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Link</button>
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
