@extends('user.base')

@section('content')
    <div class="bg-neutral w-screen h-screen flex flex-col px-14">
        <section class="mt-8 items-center justify-center flex w-full">
            <div class="flex items-center space-x-2 mx-auto w-full max-w-lg">
                <form class="w-full">
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
                            placeholder="Search Game" required />
                        <button type="submit"
                            class="text-white absolute end-2 bottom-1 bg-accent hover:bg-primary transition focus:ring-2 focus:outline-none focus:ring-accent font-medium rounded-full text-xs px-3 py-1">Search</button>
                    </div>
                </form>

                <button
                    class="text-white bg-teritary hover:bg-primary transition font-medium rounded-full text-xs px-4 py-2 w-full justify-center flex">
                    Create Community
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
            </div>
        </section>

        <h1 class="mt-10 text-2xl text-white font-semibold">Popular Community</h1>
        <div class="mt-5 w-fit">
            <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="potrait dummy"
                class="size-44 object-cover rounded-lg">
            <h1 class="text-white text-center mt-5">Horizon Zero Dawn</h1>
        </div>

        <h1 class="mt-16 text-2xl text-white font-semibold">My Community</h1>
        <div class="mt-5 w-fit">
            <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="potrait dummy"
                class="size-44 object-cover rounded-lg">
            <h1 class="text-white text-center mt-5">Horizon Zero Dawn</h1>
        </div>
    </div>
@endsection
