@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Create Event Highlight</h1>
<form action="{{ route('admin.event-highlights.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Icon (FontAwesome class, e.g., fas fa-calendar)</label>
        <input type="text" name="icon" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Order</label>
        <input type="number" name="order" class="form-control" value="0">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_active" class="form-check-input" value="1" checked>
        <label class="form-check-label">Active</label>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('admin.event-highlights.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
