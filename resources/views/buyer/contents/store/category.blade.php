@extends('buyer.base')

@section('content')
<script src="{{ asset('js/buyer/category.js') }}"></script>

<section>
    <section class="h-screen relative">
        @php
        $videos = [
        'action' => 'action.mp4',
        'sports' => 'sport.mp4',
        'racing' => 'racing.mp4',
        'sci-fi' => 'scifi.mp4',
        'horror' => 'horror.mp4',
        'survival' => 'survival.mp4',
        ];
        @endphp
        <video src="{{ asset('assets/videos/' . $videos[$category_name]) }}" class="w-full relative h-screen object-cover" autoplay muted loop></video>
        <div class="flex bg-black/40 absolute inset-0 w-full h-full">
            <div class="m-auto text-6xl font-bold text-white drop-shadow-lg pb-20">
                <h1 class="glitch">{{ strtoupper($category_name) }}</h1>
            </div>
        </div>
    </section>
    <section class="h-auto pt-8 mx-16">
        <!-- Category Games List -->
        <div class="h-auto flex flex-wrap justify-around gap-8 mt-8 pb-32">
            @foreach ($games as $game)
            <a href="{{ route('buyer.detail', $game->id) }}" class="drop-shadow-lg" data-aos="fade-up">
                <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
                    <img src="{{ asset('storage/' . $game->portrait_image_path) }}" alt="{{ $game->name }}" class="rounded-lg h-52 sm:h-[17.1rem]">
                    <div class="flex flex-col w-full">
                        <p class="text-lg font-bold text-white truncate max-w-48">{{ $game->name }}</p>
                        @if (!$game->discount)
                        <p class="text-white">IDR {{ number_format($game->price, 0, ',', '.') }}</p>
                        @else
                        <p class="line-through text-strike">IDR {{ number_format($game->price, 0, ',', '.') }}</p>
                        <div class="flex items-center">
                            <p class="text-white">
                                IDR {{ number_format(($game->price - ($game->price * $game->discount / 100)), 0, ',', '.') }}
                            </p>
                            <p class="ms-auto bg-accent p-1 rounded-lg text-xs text-white">{{ $game->discount }}%</p>
                        </div>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
            @if($games->isEmpty())
            <h1 class="text-2xl text-accent py-52">No {{ $category_name }} games found.</h1>
            @endif
        </div>
    </section>
</section>
@endsection