@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Create Story</h1>
<form action="{{ route('admin.stories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3" required></textarea></div>
    <div class="mb-3"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="5"></textarea></div>
    <div class="mb-3"><label class="form-label">Image</label><input type="file" name="image" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Author</label><input type="text" name="author" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Published Date</label><input type="date" name="published_date" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="0"></div>
    <div class="mb-3 form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" checked><label class="form-check-label">Active</label></div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
