@extends('index')
@section('content')
    @include('components.navbar-auth')
    @include('frontend.auth.section.hero')
    @include('frontend.auth.section.product')
    @include('components.footer')
@overwrite