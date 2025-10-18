@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Edit Story</h1>
<form action="{{ route('admin.stories.update', $story) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="{{ $story->title }}" required></div>
    <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3" required>{{ $story->description }}</textarea></div>
    <div class="mb-3"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="5">{{ $story->content }}</textarea></div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        @if($story->image)<div class="mb-2"><img src="{{ asset('storage/' . $story->image) }}" width="150"></div>@endif
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3"><label class="form-label">Author</label><input type="text" name="author" class="form-control" value="{{ $story->author }}"></div>
    <div class="mb-3"><label class="form-label">Published Date</label><input type="date" name="published_date" class="form-control" value="{{ $story->published_date ? $story->published_date->format('Y-m-d') : '' }}"></div>
    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="{{ $story->order }}"></div>
    <div class="mb-3 form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $story->is_active ? 'checked' : '' }}><label class="form-check-label">Active</label></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
