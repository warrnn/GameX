@foreach ($sales_game as $sale_game)
<a href="{{ route('buyer.detail', 'lorem') }}" class="drop-shadow-lg" data-aos="fade-up">
    <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
        <img src="{{ asset('storage/' . $sale_game->portrait_image_path) }}" alt="{{ $sale_game->name }}" class="rounded-lg h-52 sm:h-[17.1rem]">
        <div class="flex flex-col w-full">
            <p class="text-lg font-bold text-white truncate max-w-48">{{ $sale_game->name }}</p>
            <p class="line-through text-strike">IDR {{ number_format($sale_game->price, 0, ',', '.') }}</p>
            <div class="flex items-center">
                <p class="text-white">
                    IDR IDR {{ number_format(($sale_game->price - ($sale_game->price * $sale_game->discount / 100)), 0, ',', '.') }}
                </p>
                <p class="ms-auto bg-accent p-1 rounded-lg text-xs text-white">{{ $sale_game->discount }}%</p>
            </div>
        </div>
    </div>
</a>
@endforeach
@if($sales_game->isEmpty())
<h1 class="text-2xl text-accent py-32">Discounted Games Soon!</h1>
@endif