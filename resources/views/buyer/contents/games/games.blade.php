@extends('buyer.base')

@section('content')
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
                <button type="submit" class="text-white absolute end-2 bottom-1 bg-accent hover:bg-primary transition focus:ring-2 focus:outline-none focus:ring-accent font-medium rounded-full text-xs px-3 py-1">Search</button>
            </div>
        </form>
    </section>

    <section class="mt-8">
        <div class="h-auto flex flex-wrap justify-around gap-8 mt-8">
            @for ($i = 0; $i < 30; $i++)
                <a href="{{ route('buyer.detail', 'lorem') }}" class="drop-shadow-lg" data-aos="fade-up">
                <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
                    <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="Potrait Dummy" class="rounded-lg h-64 sm:h-[17.1rem]">
                    <div class="flex flex-col w-full text-center">
                        <p class="text-lg font-bold text-white truncate max-w-48">Horizon: Zero Dawn</p>
                    </div>
                </div>
                </a>
                @endfor
        </div>
    </section>
</section>
@endsection