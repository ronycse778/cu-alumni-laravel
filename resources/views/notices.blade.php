@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h1 class="mb-4">Notices</h1>
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
                    <p class="card-text">{{ $notice->description }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $notices->links() }}
</div>
@endsection
