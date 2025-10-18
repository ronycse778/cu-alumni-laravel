@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h1 class="mb-4">News & Press Release</h1>
    <div class="row">
        @foreach($news as $item)
        <div class="col-md-6 mb-4">
            <div class="card">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="text-muted small">{{ $item->published_date->format('d M Y') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $news->links() }}
</div>
@endsection
