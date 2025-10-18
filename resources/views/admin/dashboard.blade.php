@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text display-4">{{ $stats['users'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Event Highlights</h5>
                <p class="card-text display-4">{{ $stats['event_highlights'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Notable Events</h5>
                <p class="card-text display-4">{{ $stats['notable_events'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Stories</h5>
                <p class="card-text display-4">{{ $stats['stories'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">News</h5>
                <p class="card-text display-4">{{ $stats['news'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-secondary">
            <div class="card-body">
                <h5 class="card-title">Notices</h5>
                <p class="card-text display-4">{{ $stats['notices'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h5 class="card-title">Gallery Images</h5>
                <p class="card-text display-4">{{ $stats['galleries'] }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Quick Links</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.event-highlights.create') }}" class="btn btn-primary me-2">Add Event Highlight</a>
                <a href="{{ route('admin.notable-events.create') }}" class="btn btn-success me-2">Add Notable Event</a>
                <a href="{{ route('admin.stories.create') }}" class="btn btn-info me-2">Add Story</a>
                <a href="{{ route('admin.news.create') }}" class="btn btn-warning me-2">Add News</a>
                <a href="{{ route('admin.notices.create') }}" class="btn btn-danger me-2">Add Notice</a>
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-secondary me-2">Add Gallery Image</a>
            </div>
        </div>
    </div>
</div>
@endsection
