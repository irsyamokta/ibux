@extends('index')
@section('content')
    @include('components.navbar-auth')
    @if (!$orders)
        @include('frontend.auth.payment.empty')
    @elseif ($orders->status_payment == 'paid')
        @include('frontend.auth.payment.empty')
    @else
        @include('frontend.auth.payment.snap')
    @endif
@endsection