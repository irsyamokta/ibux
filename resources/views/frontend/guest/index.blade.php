@extends('index')
@section('content')
    @include('components.navbar-guest')
    @include('frontend.guest.section.hero')
    @include('frontend.guest.section.product')
    @include('components.footer')
@endsection