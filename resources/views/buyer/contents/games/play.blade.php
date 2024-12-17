@extends('buyer.base')

@section('content')
<!-- @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session('error') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif -->

<section class="flex flex-col lg:flex-row items-center justify-center h-screen">
    <div class="lg:ms-20">
        <img class="glitch h-52 lg:h-full" src="{{ asset('assets/logo/logo_light.png') }}" alt="logo light">
    </div>

    <div class="lg:ms-20 lg:me-20">
        <h1 class="text-white font-semibold text-2xl lg:text-5xl text-center lg:text-start">GameX Desktop App still under development.</h1>
    </div>
</section>
@endsection
