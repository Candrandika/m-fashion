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
        <div class="mb-5">
            @include('pages.main.home.widgets.index-promise-experience')
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-service')
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-list-categories')
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-top-products')
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-promo-card')
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-subscibe-email')
        </div>
    </div>
@endsection