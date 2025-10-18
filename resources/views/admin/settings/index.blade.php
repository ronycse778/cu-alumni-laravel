@extends('layouts.admin')
@section('content')
<h1 class="h2 mb-4">Site Settings</h1>
<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Total Members</label>
        <input type="text" name="total_members" class="form-control" value="{{ $settings['total_members'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Total Countries</label>
        <input type="text" name="total_countries" class="form-control" value="{{ $settings['total_countries'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Total Chapters</label>
        <input type="text" name="total_chapters" class="form-control" value="{{ $settings['total_chapters'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Programming With Purpose Text</label>
        <textarea name="programming_text" class="form-control" rows="3">{{ $settings['programming_text'] ?? '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Settings</button>
</form>
@endsection
