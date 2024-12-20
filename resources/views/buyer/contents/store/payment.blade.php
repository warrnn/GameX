@extends('buyer.base')

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/payment/inputFile.css') }}">
<!-- <script src="{{ asset('js/payment/payment.js') }}"></script> -->

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success ') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session('error ') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif

<section class="h-auto py-16 mx-8 lg:mx-32">
    <div>
        <h1 class="text-4xl font-bold text-white text-center lg:text-start">{{ $game->name }}</h1>
    </div>
    <div class="h-auto grid grid-cols-1 lg:grid-cols-6 gap-6 mt-4">
        <!-- Landscape Game Display -->
        <div class="lg:col-span-4">
            <div>
                <img src="{{ asset('storage/' . $game->landscape_image_path) }}" class="w-full h-auto object-cover rounded-lg drop-shadow-lg" alt="Portrait Dummy">
            </div>
            <div class="mt-4 flex justify-center lg:justify-end">
                @if(!$game->discount)
                <h2 class="text-2xl font-bold text-white">IDR {{ number_format($game->price, 0, ',', '.') }}</h2>
                @else
                <div>
                    <h2 class="text-2xl font-bold text-white flex items-center">IDR {{ number_format($game->price - ($game->price * $game->discount / 100), 0, ',', '.') }} <span class="text-xs p-1 bg-accent rounded-lg ms-2 mb-1">{{ $game->discount }}%</span></h2>
                    <p class="text-strike line-through text-center lg:text-end">IDR {{ number_format($game->price, 0, ',', '.') }}</p>
                </div>
                @endif
            </div>
        </div>
        <!-- Buy Now Button & Information -->
        <div class="lg:col-span-2">
            <form action="{{ route('buyer.midtrans') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <input type="hidden" name="game_id" value="{{ $game->id }}">

                <div class="flex flex-col space-y-2">
                    <label for="name">Name</label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input name="name" type="text" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="Name" />
                    </label>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="city">City</label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M8.501 1.5a.5.5 0 0 0-1 0V2H6.5A1.5 1.5 0 0 0 5 3.5v.504a2 2 0 0 1 2 2V14h2V7.504a2.5 2.5 0 0 1 2-2.45V3.5A1.5 1.5 0 0 0 9.5 2h-.999zM12.5 14H10V7.504a1.5 1.5 0 0 1 1.5-1.5h1V6A1.5 1.5 0 0 1 14 7.5v5a1.5 1.5 0 0 1-1.5 1.5M4.843 5.135a.75.75 0 0 1 1.158.63L6 13.5a.5.5 0 0 1-.5.5h-2A1.5 1.5 0 0 1 2 12.5V7.793a1.5 1.5 0 0 1 .684-1.258z" />
                        </svg>
                        <input name="city" type="text" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="City" />
                    </label>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="address">Address</label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m12.707 2.293l9 9c.63.63.184 1.707-.707 1.707h-1v6a3 3 0 0 1-3 3h-1v-7a3 3 0 0 0-2.824-2.995L13 12h-2a3 3 0 0 0-3 3v7H7a3 3 0 0 1-3-3v-6H3c-.89 0-1.337-1.077-.707-1.707l9-9a1 1 0 0 1 1.414 0M13 14a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883-.993L11 14z" />
                        </svg>
                        <input name="address" type="text" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="Address" />
                    </label>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="phone">Phone</label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                        </svg>
                        <input name="phone" type="tel" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="Phone" />
                    </label>
                </div>

                <input type="submit" id="pay-button" value="Buy!" class="btn w-full bg-primary hover:bg-accent hover:text-black transition">
            </form>
        </div>
    </div>
</section>

@endsection