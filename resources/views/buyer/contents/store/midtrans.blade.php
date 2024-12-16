@extends('buyer.base')

@section('content')
<section class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-6 w-80 text-center">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Complete Transaction</h2>
        <button id="pay-button" class="bg-blue-500 hover:bg-blue-600 font-medium py-2 px-4 rounded">
            Pay Now
        </button>
    </div>
</section>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert('Payment successful!');
                window.location.href = "/profile";
            },
            onPending: function(result) {
                alert('Waiting for payment!');
            },
            onError: function(result) {
                alert('Payment failed!');
            },
            onClose: function() {
                alert('You closed the payment popup!');
            }
        });
    };
</script>
@endsection
