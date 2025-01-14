@foreach ($owned_games as $game)
<a href="{{ route('buyer.play') }}" class="drop-shadow-lg" data-aos="fade-up">
    <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
        <img src="{{ asset('storage/' . $game->portrait_image_path) }}" alt="{{ $game->name }}" class="rounded-lg h-64 sm:h-[17.1rem]">
        <div class="flex flex-col w-full text-center">
            <p class="text-lg font-bold text-white truncate max-w-48">{{ $game->name }}</p>
        </div>
    </div>
</a>
@endforeach

@if ($owned_games->isEmpty())
<div class="flex flex-col lg:flex-row items-center justify-center h-auto">
    <div class="lg:ms-20">
        <img class="glitch h-52 lg:h-full" src="{{ asset('assets/logo/logo_light.png') }}" alt="logo light">
    </div>
    <div class="lg:ms-20 lg:me-20">
        <h1 class="text-white font-semibold text-2xl lg:text-5xl text-center lg:text-start">You don't own any game, Let's buy some games.</h1>
    </div>
</div>
@endif