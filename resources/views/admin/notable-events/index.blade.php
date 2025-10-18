@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2">Notable Events</h1>
    <a href="{{ route('admin.notable-events.create') }}" class="btn btn-primary">Add New</a>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr><th>ID</th><th>Title</th><th>Image</th><th>Event Date</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($notableEvents as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>@if($item->image)<img src="{{ asset('storage/' . $item->image) }}" width="50">@endif</td>
                <td>{{ $item->event_date ? $item->event_date->format('Y-m-d') : '' }}</td>
                <td><span class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">{{ $item->is_active ? 'Active' : 'Inactive' }}</span></td>
                <td>
                    <a href="{{ route('admin.notable-events.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.notable-events.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $notableEvents->links() }}
@endsection
