@extends('index')
@section('content')
    @include('components.navbar-auth')
    @if ($orders->count() > 0)
        @include('frontend.auth.order.history')
    @else
        @include('components.empty')
    @endif
@endsection
