@extends('seller.base')

@section('content')
<!-- @if(session('success'))
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
@endif -->

<section class="h-auto mx-8 lg:mx-20 my-14">
    <div class="flex">
        <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Sell Games</h1>
    </div>
    <div class="mt-4 flex">
        <a href="{{ route('seller.manageGame') }}" class="bg-teritary text-white px-3 py-2 rounded-lg mx-auto lg:mx-0 hover:bg-accent transition">
            Add Product +
        </a>
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
        <table id="sellerTable" class="text-white stripe hover row-border order-column">
            <tbody>
                @foreach ($selled_games as $game)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->price }}</td>
                    <td>{{ $game->category_name }}</td>
                    <td>{{ $game->publisher }}</td>
                    <td>{{ $game->release_date }}</td>
                    <td>{{ $game->base }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $game->portrait_image_path) }}" alt="potrait image" class="w-16 h-16">
                    </td>
                    <td>
                        <img src="{{ asset('storage/' . $game->landscape_image_path) }}" alt="landscape image" class="w-16 h-16">
                    </td>
                    <td>
                        <form action="{{ route('seller.deleteGame', ['seller_id' => session('seller_id'), 'game_id' => $game->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-teritary hover:bg-red-500 transition text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection