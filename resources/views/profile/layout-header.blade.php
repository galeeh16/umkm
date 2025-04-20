@extends('layouts.app-dashboard')

@section('content')
    <div class="card">
        <div class="position-relative">
            <img src="{{ asset('assets/img/backgrounds/18.jpg') }}" class="card-img-top" alt="..."
                style="max-height: 300px; object-fit: cover;">
        </div>
        <div class="card-body">
            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="image profile" class="rounded"
                style="width: 150px; height: 150px;">
        </div>
    </div>

    @yield('content-nav-header')

    <div class="card">
        <div class="card-body">
            @yield('content-profile')
        </div>
    </div>
@endsection

