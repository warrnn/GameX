@extends('user.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/swiper/carousel.css') }}">
<script src="{{ asset('js/swiper/carousel.js') }}"></script>

<section class="mx-8 sm:mx-32">
    <!-- Search -->
    <section class="mt-8">
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

    <!-- Display -->
    <section class="h-auto pb-4 mt-4 grid grid-cols-6 place-items-center gap-8">
        <!-- Carousel -->
        <div class="swiper mySwiper w-full h-min rounded-lg col-span-6 lg:col-span-4">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < 5; $i++)
                    <div class="swiper-slide">
                    <img src="{{ asset('assets/images/landscape_dummy.jpg') }}" class="relative rounded-lg" alt="Landscape Dummy">
                    <div class="flex bg-gradient-to-t from-black/85 from-10% to-transparent to-100% absolute inset-0 w-full h-full">
                        <div class="mt-auto mb-8 ms-8 text-start">
                            <h1 class="font-bold text-lg min-[420px]:text-xl sm:text-2xl text-white">Horizon Zero Dawn</h1>
                            <p class="mb-4">IDR 729.000</p>
                            <a href="{{ route('user.detail', 'lorem') }}" class="px-4 py-2 bg-accent hover:bg-primary transition text-white rounded-lg mt-4">Buy Now</a>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        <div class="swiper-pagination"></div>
        </div>

        <!-- Potrait Game Display -->
        <div class="col-span-2 place-self-start self-center hidden lg:block">
            <ul class="space-y-4">
                @for ($i = 0; $i < 3; $i++)
                    <li>
                    <a href="{{ route('user.detail', 'lorem') }}" class="flex items-center hover:scale-[0.98] transition drop-shadow-lg">
                        <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="Potrait Dummy" class="h-24 xl:h-[9.2rem] object-cover rounded-lg">
                        <p class="ms-4 text-white">Horizon: Zero Dawn</p>
                    </a>
                    </li>
                    @endfor
            </ul>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="h-auto mt-8">
        <div class="flex w-full items-center">
            <h1 class="text-2xl font-bold text-white">Special Offers</h1>
            <a href="{{ route('user.offers') }}" class="ms-auto text-strike">
                <p class="text-strike hover:text-accent transition">See more</p>
            </a>
        </div>
        <div class="flex mt-6 flex-wrap justify-around gap-6 sm:gap-6">
            @for ($i = 0; $i < 6; $i++)
                <a href="{{ route('user.detail', 'lorem') }}" class="drop-shadow-lg" data-aos="fade-up" data-aos-delay="{{ $i * 200 }}">
                <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
                    <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="Potrait Dummy" class="rounded-lg h-64 sm:h-[17.1rem]">
                    <div class="flex flex-col w-full">
                        <p class="text-lg font-bold text-white truncate max-w-44">Horizon: Zero Dawn Horizon: Zero Dawn</p>
                        <p class="line-through text-strike">IDR 400.000</p>
                        <div class="flex items-center">
                            <p class="text-white">IDR 100.000</p>
                            <p class="ms-auto bg-accent p-1 rounded text-xs text-white">75%</p>
                        </div>
                    </div>
                </div>
                </a>
                @endfor
        </div>
    </section>

    <!-- Browse by Category -->
    <section class="h-auto pb-24 mt-20">
        <div class="flex w-full flex-col">
            <h1 class="text-2xl font-bold text-white">Browse by Categories</h1>
            <div class="grid grid-rows-6 grid-cols-2 sm:grid-rows-3 sm:grid-cols-4 lg:grid-rows-2 lg:grid-cols-6 gap-4 mt-6">
                <div class="col-span-2 drop-shadow-lg" data-aos="fade-down-right" data-aos-delay="200">
                    <a href="{{ route('user.category', 'action') }}">
                        <img src="{{ asset('assets/images/categories_action.png') }}" class="rounded-lg grayscale hover:grayscale-0 transition" alt="Action">
                    </a>
                </div>
                <div class="col-span-2 drop-shadow-lg" data-aos="fade-down" data-aos-delay="200">
                    <a href="{{ route('user.category', 'sports') }}">
                        <img src="{{ asset('assets/images/categories_sports.png') }}" class="rounded-lg grayscale hover:grayscale-0 transition" alt="Sport">
                    </a>
                </div>
                <div class="col-span-2 drop-shadow-lg" data-aos="fade-down-left" data-aos-delay="200">
                    <a href="{{ route('user.category', 'racing') }}">
                        <img src="{{ asset('assets/images/categories_racing.png') }}" class="rounded-lg grayscale hover:grayscale-0 transition" alt="Racing">
                    </a>
                </div>
                <div class="col-span-2 drop-shadow-lg" data-aos="fade-up-right" data-aos-delay="200">
                    <a href="{{ route('user.category', 'sci-fi') }}">
                        <img src="{{ asset('assets/images/categories_scifi.png') }}" class="rounded-lg grayscale hover:grayscale-0 transition" alt="Racing">
                    </a>
                </div>
                <div class="col-span-2 drop-shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('user.category', 'horror') }}">
                        <img src="{{ asset('assets/images/categories_horror.png') }}" class="rounded-lg grayscale hover:grayscale-0 transition" alt="Racing">
                    </a>
                </div>
                <div class="col-span-2 drop-shadow-lg" data-aos="fade-up-left" data-aos-delay="200">
                    <a href="{{ route('user.category', 'survival') }}#">
                        <img src="{{ asset('assets/images/categories_survival.png') }}" class="rounded-lg grayscale hover:grayscale-0 transition" alt="Racing">
                    </a>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection