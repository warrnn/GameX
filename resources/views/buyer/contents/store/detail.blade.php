@extends('buyer.base')

@section('content')
<section class="h-auto mx-8 sm:mx-16">
    <section class="h-auto pb-32 mt-12">
        <!-- Title -->
        <div>
            <h1 class="text-4xl font-bold text-white">{{ $game->name }}</h1>
        </div>
        <div class="h-auto grid lg:grid-cols-6 gap-6 mt-4">
            <!-- Landscape Game Display -->
            <div class="lg:col-span-4">
                <div>
                    <img src="{{ asset('storage/' . $game->landscape_image_path) }}" class="w-full h-full object-cover rounded-lg drop-shadow-lg" alt="{{ $game->name }}">
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-bold text-white">Category</h3>
                    <div class="mt-2 w-fit text-sm">
                        <p class="text-white bg-teritary px-2 py-1 rounded-lg">{{ $game->category_name }}</p>
                    </div>
                </div>
            </div>
            <!-- Buy Now Button & Information -->
            <div class="lg:col-span-2">
                <div>
                    <h2 class="text-2xl font-bold text-white">IDR {{ number_format($game->price, 0, ',', '.') }}</h2>
                </div>

                @if ($game->seller_user_id != session('user_id'))
                <div class="mt-1">
                    <a href="{{ route('buyer.payment', $game->id) }}" class="btn w-full mt-2 bg-accent text-white hover:bg-teritary transition">Buy Now</a>
                </div>
                @endif
                @if ($game->seller_user_id == session('user_id'))
                <div class="mt-1">
                    <a href="{{ route('seller.manageGame', $game->id) }}" class="btn w-full mt-2 bg-accent text-white hover:bg-teritary transition">Edit This Product</a>
                </div>
                @endif

                <div class="mt-4 space-y-2">
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Seller</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">{{ $game->seller_name }}</p>
                    </div>
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Publisher</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">{{ $game->publisher }}</p>
                    </div>
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Release Date</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">{{ \Carbon\Carbon::parse($game->release_date)->format('d F Y') }}</p>
                    </div>
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Base</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">{{ $game->base }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 lg:mt-4">
            <p class="text-strike">{{ $game->description }}</p>
        </div>
    </section>
</section>
@endsection