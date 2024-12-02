@extends('user.base')

@section('content')
<section class="mx-20">
    <!-- Heading & Search -->
    <div class="flex flex-col md:flex-row w-full mt-12 items-center">
        <h1 class="text-2xl font-bold text-white">Special Offers</h1>
        <form class="max-w-xs max-h-xs mx-auto mt-6 md:mt-0 md:ms-auto md:me-0 w-full">
            <label for="small-search" class="mb-1 text-xs font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="small-search" class="block w-full p-2 ps-8 text-xs text-accent border border-gray-700 rounded-full bg-neutral focus:ring-accent focus:outline-none" placeholder="Search Game" required />
                <button type="submit" class="text-white absolute end-2 bottom-1 bg-accent hover:bg-primary transition focus:ring-2 focus:outline-none focus:ring-accent font-medium rounded-full text-xs px-3 py-1">Search</button>
            </div>
        </form>
    </div>

    <!-- Discounted Games List -->
    <section class="h-auto flex flex-wrap justify-betwwen gap-8 justify-center mt-8 pb-32">
        @php($delay = 100)
        @for ($i = 0; $i < 30; $i++)
            <a href="{{ route('user.detail', 'lorem') }}" class="drop-shadow-lg" data-aos="fade-up" data-aos-delay="{{ $delay }}">
            <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
                <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="Potrait Dummy" class="rounded-lg h-52 sm:h-[17.1rem]">
                <div class="flex flex-col w-full">
                    <p class="text-lg font-bold text-white truncate max-w-48">Horizon: Zero Dawn</p>
                    <p class="line-through text-strike">IDR 400.000</p>
                    <div class="flex items-center">
                        <p class="text-white">IDR 100.000</p>
                        <p class="ms-auto bg-accent p-1 rounded-lg text-xs text-white">75%</p>
                    </div>
                </div>
            </div>
            </a>
            @if ($delay == 600)
            @php($delay = 100)
            @else
            @php($delay += 100)
            @endif
            @endfor
    </section>
</section>
@endsection