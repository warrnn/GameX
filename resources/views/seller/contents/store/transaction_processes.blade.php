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

<section class="h-screen mx-8 lg:mx-20 mt-14">
    <div class="flex">
        <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Transaction Processes</h1>
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
        <table id="sellerTransactionTable" class="text-white stripe hover row-border order-column">
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $transaction->landscape_image_path) }}" class="w-32 h-20 rounded-lg" alt="{{ $transaction->game_name }}">
                            <h1 class="text-white font-bold">{{ $transaction->game_name }}</h1>
                        </div>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') }} </td>
                    <td>{{ $transaction->buyer_name }}</td>
                    <td>
                        @if ($transaction->base == 'DIGITAL' && $transaction->shipping_number == null)
                        No Shipping Number for Digital Game.
                        @elseif ($transaction->base == 'PHYSICAL' && $transaction->shipping_number == null)
                        <form action="{{ route('seller.updateTransactionDelivery', $transaction->id) }}" class="join " method="POST">
                            @csrf
                            @method('PUT')
                            <input class="input input-bordered join-item text-white" name="shipping_number" placeholder="Input Shipping Number" />
                            <button type="submit" class="btn join-item rounded-r-md bg-teritary text-white">Send</button>
                        </form>
                        @elseif ($transaction->base == 'PHYSICAL' && $transaction->shipping_number != null)
                        {{ $transaction->shipping_number }}
                        @endif
                    </td>
                    <td>
                        <div class="dropdown dropdown-left">
                            @if ($transaction->status == 'SUCCESS' && $transaction->shipping_number != null)
                            <div tabindex="0" role="button" class="btn m-1 text-white btn-success">{{ $transaction->status }}</div>
                            @elseif ($transaction->status == 'PROCESS')
                            <div tabindex="0" role="button" class="btn m-1 text-white btn-primary">{{ $transaction->status }}</div>
                            @elseif ($transaction->status == 'DELIVERY' && $transaction->shipping_number != null)
                            <div tabindex="0" role="button" class="btn m-1 text-white btn-warning">{{ $transaction->status }}</div>
                            @elseif ($transaction->status == 'FAILED')
                            <div tabindex="0" role="button" class="btn m-1 text-white btn-error">{{ $transaction->status }}</div>
                            @endif
                            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[100] w-52 p-2 shadow">
                                <li>
                                    <form action="{{ route('seller.updateTransactionStatus', [$transaction->id, 'SUCCESS']) }}" method="POST" class="flex">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" value="SUCCESS" class="btn btn-sm w-full btn-success text-white hover:text-black transition">
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('seller.updateTransactionStatus', [$transaction->id, 'FAILED']) }}" method="POST" class="flex">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" value="FAILED" class="btn btn-sm w-full btn-error text-white hover:text-black transition">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection