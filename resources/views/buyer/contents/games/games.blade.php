@extends('buyer.base')

@section('content')
<script src="{{asset('js/search.js')}}"></script>
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

<section class="h-auto mx-8 md:mx-16 mt-8 pb-20">
    <section class="flex flex-col-reverse md:flex-row items-center justify-end gap-4">
        <!-- Dropdown -->
        <select class="block w-full p-2 ps-8 text-xs text-white border border-gray-700 rounded-full bg-neutral focus:ring-accent focus:outline-none max-w-xs">
            <option disabled selected>Select Category</option>
            @for ($i = 0; $i < 10; $i++)
                <option>Category {{ $i + 1 }}</option>
                @endfor
        </select>

        <!-- Search Form -->
        <form class="max-w-xs max-h-xs w-full">
            <label for="small-search" class="mb-1 text-xs font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="small-search" class="block w-full p-2 ps-8 text-xs text-accent border border-gray-700 rounded-full bg-neutral focus:ring-accent focus:outline-none" placeholder="Search Game" required />
            </div>
        </form>
    </section>

    <section class="mt-8">
        <div class="h-auto flex flex-wrap justify-around gap-8 mt-8">
            @foreach ($games_owned as $game)
            <a href="{{ route('buyer.play') }}" class="drop-shadow-lg" data-aos="fade-up">
                <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
                    <img src="{{ asset('storage/' . $game->portrait_image_path) }}" alt="{{ $game->name }}" class="rounded-lg h-64 sm:h-[17.1rem]">
                    <div class="flex flex-col w-full text-center">
                        <p class="text-lg font-bold text-white truncate max-w-48">{{ $game->name }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            @if ($games_owned->isEmpty())
            <div class="flex flex-col lg:flex-row items-center justify-center h-auto">
                <div class="lg:ms-20">
                    <img class="glitch h-52 lg:h-full" src="{{ asset('assets/logo/logo_light.png') }}" alt="logo light">
                </div>

                <div class="lg:ms-20 lg:me-20">
                    <h1 class="text-white font-semibold text-2xl lg:text-5xl text-center lg:text-start">You don't own any game, Let's buy some games.</h1>
                </div>
            </div>
            @endif
        </div>
    </section>
</section>
@endsection