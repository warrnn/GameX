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

<section class="bg-neutral w-screen h-auto flex flex-col px-14 pb-20">
    <!-- <section class="mt-14 flex items-center justify-center space-x-2">
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
    </section> -->

    <section class="h-auto mt-12">
        <div class="flex items-center">
            <h1 class="text-3xl text-white font-semibold">The Communities</h1>
            <a href="{{ route('buyer.theComunities') }}" class="text-strike hover:text-accent transition ms-auto">See more</a>
        </div>
        <div class="flex flex-wrap justify-around gap-4">
            @foreach ($communities as $community)
            <a href="{{ route('buyer.detailCommunity', $community->id) }}" class="mt-5 w-fit hover:scale-[0.98] transition text-center">
                <img src="{{ asset('storage/' . $community->image_path) }}" alt="{{ $community->name }}" class="size-44 object-cover rounded-lg">
                <h1 class="text-white mt-5">{{ $community->name }}</h1>
                <p>{{ $community->member_count }} Members</p>
            </a>
            @endforeach
            @if($communities->isEmpty())
            <h1 class="text-strike mt-5 text-lg py-20">No Communities Found.</h1>
            @endif
        </div>


        <div class="flex items-center mt-16">
            <h1 class="text-3xl text-white font-semibold">My Communities</h1>
            <a href="{{  route('buyer.myComunities') }}" class="text-strike hover:text-accent transition ms-auto">See more</a>
        </div>
        <div class="flex flex-wrap justify-around gap-4">
            @foreach ($joined_communities as $community)
            <a href="{{ route('buyer.detailCommunity', $community->id) }}" class="mt-5 w-fit hover:scale-[0.98] transition text-center">
                <img src="{{ asset('storage/' . $community->image_path) }}" alt="{{ $community->name }}" class="size-44 object-cover rounded-lg">
                <h1 class="text-white mt-5">{{ $community->name }}</h1>
                <p>{{ $community->member_count }} Members</p>
            </a>
            @endforeach
            @if($joined_communities->isEmpty())
            <h1 class="text-strike mt-5 text-lg py-20">You're not in any Community yet.</h1>
            @endif
        </div>
    </section>

    <section class="h-auto mt-20">
        <h1 class="text-3xl text-white font-semibold text-center mb-8">Recent Post</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($posts as $post)
                <div class="flex flex-col space-y-2 bg-primary rounded-lg p-6 drop-shadow-lg" data-aos="fade-up">
                <h1 class="text-white font-bold text-2xl">{{ $post->user_name }}</h1>
                <h2 class="text-teritary font-semibold text-lg">{{ $post->community_name }}</h2>
                <p>{{ $post->content }}</p>
        </div>
        @endforeach
        </div>
    </section>
</section>
@endsection