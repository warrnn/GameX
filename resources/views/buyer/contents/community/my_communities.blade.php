@extends('buyer.base')

@section('content')
@if(session('success'))
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
@endif

<section class="bg-neutral w-screen h-auto flex flex-col px-14 pb-32">
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
    </section>

    <section class="h-auto mt-12">
        <div class="flex items-center justify-center mb-4">
            <h1 class="text-3xl text-white font-semibold">My Communities</h1>
        </div>
        <div class="flex flex-wrap justify-around gap-4">
            @foreach ($joined_communities as $community)
            <a href="{{ route('buyer.detailCommunity', $community->id) }}" class="mt-5 w-fit hover:scale-[0.98] transition text-center" data-aos="fade-up">
                <img src="{{ asset('storage/' . $community->image_path) }}" alt="{{ $community->name }}" class="size-44 object-cover rounded-lg">
                <h1 class="text-white mt-5">{{ $community->name }}</h1>
                <p>{{ $community->member_count }} Members</p>
            </a>
            @endforeach
            @if($joined_communities->isEmpty())
            <h1 class="text-strike mt-5 text-lg py-64">You're not in any Community yet.</h1>
            @endif
        </div>
    </section>
</section>
@endsection