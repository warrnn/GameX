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
                        <td>{{$loop->iteration}}</td>
                        <td> {{$transaction['shipping_number']}} </td>
                        <td> {{$transaction['status']}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection