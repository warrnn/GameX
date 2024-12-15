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
        <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Manage Promotions</h1>
    </div>
    <div class="mt-4 flex">
        <button class="bg-teritary text-white px-3 py-2 rounded-lg mx-auto lg:mx-0" onclick="add_promo_modal.showModal()">
            Add Discount +
        </button>
        @include('seller.includes.add_promo_modal')
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
        <table id="promotionsTable" class="text-white stripe hover row-border order-column">
            <tbody>
                @foreach ($game_sales as $sale)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->discount }}%</td>
                    <td>{{ ($sale->price - ($sale->price * $sale->discount / 100)) }}</td>
                    <td class="flex space-x-4">
                        <button class="btn bg-teritary hover:bg-blue-500 transition text-white" onclick="edit_discount_modal.showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                        </button>
                        <form action="{{ route('seller.deleteDiscount', $sale->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-teritary hover:bg-red-500 transition text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                    @include('seller.includes.edit_promo_modal')
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection