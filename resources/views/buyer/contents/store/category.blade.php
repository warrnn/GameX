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
        <video src="{{ asset('assets/videos/' . $videos[$data['category_name']]) }}" class="w-full relative h-screen object-cover" autoplay muted loop></video>
        <div class="flex bg-black/40 absolute inset-0 w-full h-full">
            <div class="m-auto text-6xl font-bold text-white drop-shadow-lg pb-20">
                <h1 class="glitch">{{ strtoupper($data['category_name']) }}</h1>
            </div>
        </div>
    </section>
    <section class="h-auto pt-8">
        <!-- Category Games List -->
        <div class="h-auto flex flex-wrap justify-around gap-8 justify-center mt-8 pb-32">
            @php($delay = 100)
            @for ($i = 0; $i < 30; $i++)
                <a href="{{ route('buyer.detail', 'lorem') }}" class="drop-shadow-lg" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                <div class="flex flex-col space-y-2 hover:scale-[0.98] transition">
                    <img src="{{ asset('assets/images/potrait_dummy.jpeg') }}" alt="Potrait Dummy" class="rounded-lg h-52 sm:h-[17.1rem]">
                    <div class="flex flex-col w-full">
                        <p class="text-lg font-bold text-white truncate max-w-48">Horizon: Zero Dawn</p>
                        <p class="text-strike">IDR 100.000</p>
                    </div>
                </div>
                </a>
                @if ($delay == 600)
                @php($delay = 100)
                @else
                @php($delay += 100)
                @endif
                @endfor
        </section>
    </section>
</section>
@endsection