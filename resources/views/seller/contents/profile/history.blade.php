<div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
    <table id="historyTable" class="text-white stripe hover row-border order-column">
        <tbody>
            @foreach ($transactions_history as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->game_name }}</td>
                <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') }}</td>
                <td>{{ $transaction->buyer_name }}</td>
                <td>
                    @if ($transaction->status == 'PROCESS')
                    <p class="text-blue-500">
                        {{ $transaction->status }}
                    </p>
                    @elseif ($transaction->status == 'DELIVERY')
                    <p class="text-yellow-500">
                        {{ $transaction->status }}
                    </p>
                    @elseif ($transaction->status == 'SUCCESS')
                    <p class="text-green-500">
                        {{ $transaction->status }}
                    </p>
                    @elseif ($transaction->status == 'FAILED')
                    <p class="text-red-500">
                        {{ $transaction->status }}
                    </p>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>