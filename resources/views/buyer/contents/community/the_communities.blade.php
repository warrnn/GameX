@extends('buyer.base')

@section('content')
<section class="bg-neutral w-screen h-auto flex flex-col px-14 pb-20">
    <section class="mt-14 flex flex-col md:flex-row items-center justify-center space-x-2">
        <form class="w-full max-w-md">
            <label for="small-search" class="mb-1 text-xs font-medium text-gray-900 sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="small-search"
                    class="block w-full p-2 ps-8 text-xs text-accent border border-gray-700 rounded-full bg-neutral focus:ring-accent focus:outline-none"
                    placeholder="Search Community" required />
                <button type="submit"
                    class="text-white absolute end-2 bottom-1 bg-accent hover:bg-primary transition focus:ring-2 focus:outline-none focus:ring-accent font-medium rounded-full text-xs px-3 py-1">Search</button>
            </div>
        </form>

        <div class="mt-4 md:mt-0">
            <button
                class="text-white bg-teritary hover:bg-primary transition font-medium rounded-full text-xs px-6 py-2 flex items-center justify-center" onclick="create_comm_modal.showModal()">
                Create Community
                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </button>
            @include('buyer.includes.create_comm_modal')
        </div>
    </section>

    <section class="h-auto mt-12">
        <div class="flex items-center justify-center mb-4">
            <h1 class="text-3xl text-white font-semibold">The Communities</h1>
        </div>
        <div class="flex flex-wrap justify-around gap-4">
            @php($delay = 100)
            @for ($i = 0; $i < 30; $i++)
                <a href="{{ route('buyer.detailCommunity', 'lorem') }}" class="mt-5 w-fit hover:scale-[0.98] transition text-center" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="potrait dummy" class="size-44 object-cover rounded-lg">
                <h1 class="text-white mt-5">Horizon Zero Dawn</h1>
                <p>100k Members</p>
                </a>
                @if ($delay == 700)
                @php($delay = 100)
                @else
                @php($delay += 100)
                @endif
                @endfor
        </div>
    </section>
</section>
@endsection