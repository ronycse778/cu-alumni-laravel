@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Edit News</h1>
<form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="{{ $news->title }}" required></div>
    <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3" required>{{ $news->description }}</textarea></div>
    <div class="mb-3"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="5">{{ $news->content }}</textarea></div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        @if($news->image)<div class="mb-2"><img src="{{ asset('storage/' . $news->image) }}" width="150"></div>@endif
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3"><label class="form-label">Published Date</label><input type="date" name="published_date" class="form-control" value="{{ $news->published_date->format('Y-m-d') }}" required></div>
    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="{{ $news->order }}"></div>
    <div class="mb-3 form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $news->is_active ? 'checked' : '' }}><label class="form-check-label">Active</label></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
