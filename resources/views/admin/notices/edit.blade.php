@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Edit Notice</h1>
<form action="{{ route('admin.notices.update', $notice) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="{{ $notice->title }}" required></div>
    <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3" required>{{ $notice->description }}</textarea></div>
    <div class="mb-3"><label class="form-label">Notice Date</label><input type="date" name="notice_date" class="form-control" value="{{ $notice->notice_date->format('Y-m-d') }}" required></div>
    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="{{ $notice->order }}"></div>
    <div class="mb-3 form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $notice->is_active ? 'checked' : '' }}><label class="form-check-label">Active</label></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
