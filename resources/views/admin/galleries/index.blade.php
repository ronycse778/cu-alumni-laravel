@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2">Gallery</h1>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Add New</a>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead><tr><th>ID</th><th>Title</th><th>Image</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($galleries as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td><img src="{{ asset('storage/' . $item->image) }}" width="50"></td>
                <td><span class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">{{ $item->is_active ? 'Active' : 'Inactive' }}</span></td>
                <td>
                    <a href="{{ route('admin.galleries.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $galleries->links() }}
@endsection
