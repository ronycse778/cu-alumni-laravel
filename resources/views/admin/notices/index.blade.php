@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2">Notices</h1>
    <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">Add New</a>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead><tr><th>ID</th><th>Title</th><th>Notice Date</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($notices as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->notice_date->format('Y-m-d') }}</td>
                <td><span class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">{{ $item->is_active ? 'Active' : 'Inactive' }}</span></td>
                <td>
                    <a href="{{ route('admin.notices.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.notices.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $notices->links() }}
@endsection
