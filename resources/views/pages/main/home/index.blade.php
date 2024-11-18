@extends('layouts.main.index')

@section('subtitle', 'Tingkatkan Penampilanmu Disini')

@section('content')
    <div class="container mt-5">
        <div class="mb-5">
            @include('pages.main.home.widgets.index-carousel-heroes')
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-carousel-brands')
        </div>
    </div>
@endsection