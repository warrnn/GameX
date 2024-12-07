@extends('buyer.base')

@section('content')

<script src="{{ asset('js/buyer/play.js') }}"></script>

<section class="flex flex-col lg:flex-row items-center justify-center h-screen">
    <div class="lg:ms-20">
        <img class="glitch" src="{{ asset('assets/logo/logo_light.png') }}" alt="logo light">
    </div>

    <div class="lg:ms-20 lg:me-20">
        <h1 class="text-white font-semibold text-2xl lg:text-5xl text-center lg:text-start">GameX Desktop App still under development.</h1>
    </div>
</section>
@endsection