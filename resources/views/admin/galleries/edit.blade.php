@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Edit Gallery Image</h1>
<form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="{{ $gallery->title }}" required></div>
    <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3">{{ $gallery->description }}</textarea></div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <div class="mb-2"><img src="{{ asset('storage/' . $gallery->image) }}" width="150"></div>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="{{ $gallery->order }}"></div>
    <div class="mb-3 form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $gallery->is_active ? 'checked' : '' }}><label class="form-check-label">Active</label></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
