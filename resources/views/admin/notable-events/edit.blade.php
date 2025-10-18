@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Edit Notable Event</h1>
<form action="{{ route('admin.notable-events.update', $notableEvent) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="{{ $notableEvent->title }}" required></div>
    <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3">{{ $notableEvent->description }}</textarea></div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        @if($notableEvent->image)<div class="mb-2"><img src="{{ asset('storage/' . $notableEvent->image) }}" width="150"></div>@endif
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3"><label class="form-label">Event Date</label><input type="date" name="event_date" class="form-control" value="{{ $notableEvent->event_date ? $notableEvent->event_date->format('Y-m-d') : '' }}"></div>
    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="{{ $notableEvent->order }}"></div>
    <div class="mb-3 form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $notableEvent->is_active ? 'checked' : '' }}><label class="form-check-label">Active</label></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.notable-events.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
