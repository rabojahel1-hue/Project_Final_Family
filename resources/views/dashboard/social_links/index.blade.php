@extends('dashboard.layout.admin')

@section('content')
    <div class="container-fluid pt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Social Media Links</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary btn-sm shadow-sm">
                        <i class="fas fa-plus"></i> Add New Link
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Platform</th>
                            <th>URL</th>
                            <th>Linked To (Doctor)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($links as $link)
                            <tr id="row-{{ $link->id }}">
                                <td><span class="badge bg-success text-white px-2">{{ $link->platform }}</span></td>
                                <td><a href="{{ $link->url }}" target="_blank"
                                        class="text-info text-sm">{{ Str::limit($link->url, 40) }}</a></td>
                                <td>
                                    {{-- جلب الاسم من علاقة linkable --}}
                                    <i class="fas fa-user-md text-muted mr-1"></i>
                                    {{ $link->linkable->user->name ?? 'N/A' }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.social-links.edit', $link->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('admin.social-links.destroy', $link->id) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $links->links() }}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function deleteLink(id) {
            if (!confirm('Are you sure?')) return;
            fetch('/admin/social-links/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => document.getElementById('row-' + id).remove());
        }
    </script>
@endsection
