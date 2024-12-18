@extends('admin.base')

@section('content')
@if(session('success'))
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
@endif

<section class="h-screen mx-8 lg:mx-20 mt-14">
  <div class="flex">
    <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Transactions</h1>
  </div>
  <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
    <table id="adminTableTransaction" class="text-white stripe hover row-border order-column">
      <tbody>
        @foreach ($transactions as $transaction)
        <tr>
          <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') }}</td>
          <td>{{ $transaction->name }}</td>
          <td>{{ $transaction->buyer_name }}</td>
          <td>{{ $sellers->where('id', $transaction->seller_id)->first()->name }}</td>
          @if ($transaction->shipping_number)
          <td>{{ $transaction->shipping_number }}</td>
          @elseif (!$transaction->shipping_number && $transaction->base == 'DIGITAL')
          <td>No Shipping Number for Digital Game.</td>
          @elseif (!$transaction->shipping_number && $transaction->base == 'PHYSICAL')
          <td>Awaiting for Seller Input</td>
          @endif
          <td>
            @if ($transaction->status == 'SUCCESS')
            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
              {{ $transaction->status }}
            </button>
            @elseif ($transaction->status == 'PROCESS')
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
              {{ $transaction->status }}
            </button>
            @elseif ($transaction->status == 'DELIVERY')
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
              {{ $transaction->status }}
            </button>
            @elseif ($transaction->status == 'FAILED')
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
              {{ $transaction->status }}
            </button>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</section>
@endsection