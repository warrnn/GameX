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

<section class="h-auto mx-8 md:mx-20 mt-12 pb-32">
    <div class="flex border-b-2 border-strike pb-4 items-center">
        <h1 class="text-2xl md:text-4xl font-bold text-white me-6">Community Detail</h1>
        <p class="ms-auto text-strike hidden md:block">{{ $community->member_count }} Members</p>
        <button class="btn bg-teritary hover:bg-primary transition text-white ms-auto md:hidden" onclick="socials_modal.showModal()">Socials</button>
    </div>
    <div class="grid grid-cols-6">
        <div class="col-span-6 md:col-span-4 md:border-e-2 border-strike">
            <div class="flex flex-col md:flex-row items-center border-b-2 md:border-strike pb-8 mt-8">
                <img src="{{ asset('storage/' . $community->image_path) }}" class="h-32 object-cover rounded-lg drop-shadow-lg" alt="{{ $community->name }}">
                <h2 class="text-2xl md:text-3xl font-bold text-white ms-4 mt-6 md:mt-0">{{ $community->name }}</h2>
                @if (!$isJoined)
                <form action="{{ route('buyer.joinCommunity', $community->id) }}" method="POST" class="ms-auto me-8">
                    @csrf
                    <button type="submit" class="btn bg-green-500 text-black hover:bg-accent hover:text-black ms-auto mt-6 md:mt-0">Join</button>
                </form>
                @else
                <form action="{{ route('buyer.leaveCommunity', $community->id) }}" method="POST" class="ms-auto me-8">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn bg-red-500 text-white hover:bg-accent hover:text-black ms-auto mt-6 md:mt-0">Leave</button>
                </form>
                @endif
            </div>
            <div class="flex flex-col me-8">
                <div class="flex flex-col sm:flex-row w-full items-center">
                    <h2 class="text-3xl font-bold text-white my-6 text-center md:text-start">Community Posts</h2>
                    @if ($isJoined)
                    <button class="mx-auto mb-8 sm:mb-0 sm:me-0 sm:ms-auto btn bg-teritary text-white hover:bg-accent hover:text-black" onclick="add_post_modal.showModal()">Post +</button>
                    @include('buyer.includes.add_post_modal')
                    @endif
                </div>
                <div class="flex flex-col space-y-4">
                    @foreach ($posts as $post)
                    <div class="flex flex-col space-y-2 bg-primary rounded-lg p-6 drop-shadow-lg" data-aos="fade-up">
                        <h1 class="text-white font-bold text-xl">{{ $post->name }}</h1>
                        <p>{{ $post->content }}</p>
                    </div>
                    @endforeach
                    @if($posts->isEmpty())
                    <h1 class="text-strike mt-5 text-lg text-center py-20">No Post Found.</h1>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-2 flex flex-col mt-8 w-full hidden md:block">
            <div class="flex justify-center w-full mb-6">
                <h2 class="text-2xl font-bold text-white">Socials</h2>
            </div>
            <div class="flex flex-col mx-8 space-y-4">
                @foreach ($socials as $social)
                <div class="bg-primary rounded-lg drop-shadow-lg p-3">
                    <h1 class="text-white font-bold text-lg text-center">{{ $social->name }}</h1>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<dialog id="socials_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral pb-44">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4">✕</button>
        </form>
        <h3 class="text-lg font-bold text-center mb-6">Socials</h3>
        <div class="flex flex-col mx-8 space-y-4">
            @foreach ($socials as $social)
            <div class="bg-primary rounded-lg drop-shadow-lg p-3">
                <h1 class="text-white font-bold text-lg text-center">{{ $social->name }}</h1>
            </div>
            @endforeach
        </div>
    </div>
</dialog>
@endsection