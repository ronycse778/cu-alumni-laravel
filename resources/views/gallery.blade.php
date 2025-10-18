@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h1 class="mb-4">Image Gallery</h1>
    <div class="row">
        @foreach($galleries as $gallery)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    @if($gallery->description)
                    <p class="card-text">{{ $gallery->description }}</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $galleries->links() }}
</div>
@endsection
