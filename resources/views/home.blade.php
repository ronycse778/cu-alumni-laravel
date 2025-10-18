@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-5 fw-bold">Chittagong University Alumni Association</h1>
                <p class="lead">Reconnect with your network</p>
                
                @guest
                <div class="card mt-4" style="max-width: 400px;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email/ID" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="{{ route('register') }}" class="btn btn-outline-success btn-sm">Member Registration</a>
                        </div>
                    </div>
                </div>
                @endguest
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x300/4a90e2/ffffff?text=CU+Alumni" class="img-fluid rounded" alt="Hero">
            </div>
        </div>
    </div>
</div>

@if($eventHighlights->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title text-primary">Event Highlights</h2>
            <h3>সুমেলানী ২০২৫</h3>
        </div>
        <div class="row g-4">
            @foreach($eventHighlights as $event)
            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        @if($event->icon)
                        <i class="{{ $event->icon }} fa-3x mb-3 text-primary"></i>
                        @endif
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary">See More Event</button>
        </div>
    </div>
</section>
@endif

@if($notableEvents->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title text-primary">Notable Events</h2>
        </div>
        <div class="row g-4">
            @foreach($notableEvents as $event)
            <div class="col-md-4">
                <div class="card h-100">
                    @if($event->image)
                    <img src="{{ asset('uploads/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary">See More</button>
        </div>
    </div>
</section>
@endif

@if($stories->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <p class="text-muted">EXPLORE STORIES, IDEAS AND PERSPECTIVES FROM YOUR ALUMNI COMMUNITY</p>
            <h2 class="section-title text-primary">Stories</h2>
        </div>
        <div class="row g-4">
            @foreach($stories as $story)
            <div class="col-md-4">
                <div class="card h-100">
                    @if($story->image)
                    <img src="{{ asset('uploads/' . $story->image) }}" class="card-img-top" alt="{{ $story->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $story->title }}</h5>
                        <p class="card-text">{{ Str::limit($story->description, 120) }}</p>
                        @if($story->author)
                        <p class="text-muted small">By {{ $story->author }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary">Read More Stories</button>
        </div>
    </div>
</section>
@endif

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h5 class="text-muted">Your Network Around the Globe</h5>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h2 class="display-4 text-primary">{{ $settings['total_members'] ?? '30,000' }}</h2>
                    <p>Members</p>
                </div>
                <div class="col-md-4">
                    <h2 class="display-4 text-primary">{{ $settings['total_countries'] ?? '56' }}</h2>
                    <p>Countries</p>
                </div>
                <div class="col-md-4">
                    <h2 class="display-4 text-primary">{{ $settings['total_chapters'] ?? '54' }}</h2>
                    <p>Chapters</p>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Explore our network around the globe</button>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <h2 class="section-title text-primary">Programming With a Purpose</h2>
        <p class="lead">{{ $settings['programming_text'] ?? 'THREE DIRECTIONS: THE UNIVERSITY, THE STUDENT BODY AND CONNECT ALUMNI TO EACH OTHER AND BACK TO THE UNIVERSITY' }}</p>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-title text-primary">News & Press Release</h2>
                @foreach($news as $item)
                <div class="card mb-3">
                    <div class="row g-0">
                        @if($item->image)
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/' . $item->image) }}" class="img-fluid rounded-start" alt="{{ $item->title }}">
                        </div>
                        @endif
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                                <p class="card-text"><small class="text-muted">{{ $item->published_date->format('d M Y') }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="text-center">
                    <a href="/news" class="btn btn-primary">View More News</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <h2 class="section-title text-primary">Notice</h2>
                @foreach($notices as $notice)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="me-3 text-center" style="min-width: 60px;">
                                <div class="bg-primary text-white p-2 rounded">
                                    <div class="fw-bold">{{ $notice->notice_date->format('d') }}</div>
                                    <div class="small">{{ $notice->notice_date->format('M') }}</div>
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title">{{ $notice->title }}</h5>
                                <p class="card-text">{{ Str::limit($notice->description, 80) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="text-center">
                    <a href="/notices" class="btn btn-primary">View More Notice</a>
                </div>
            </div>
        </div>
    </div>
</section>

@if($galleries->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title text-primary">Image Gallery</h2>
        </div>
        <div class="row g-4">
            @foreach($galleries as $gallery)
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('uploads/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="/gallery" class="btn btn-primary">View More</a>
        </div>
    </div>
</section>
@endif
@endsection
