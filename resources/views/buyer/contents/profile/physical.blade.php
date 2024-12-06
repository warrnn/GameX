@php
$status = [
    'On Process' => 'text-blue-500', 
    'Completed' => 'text-green-500', 
    'In Delivery' => 'text-yellow-500', 
    'Cancelled' => 'text-red-500'
];
@endphp
@for ($i = 1; $i <= 10; $i++)
    <div class="flex flex-col hover:scale-[0.98] transition">
        <h1 class="text-lg font-bold">Grand Theft Auto VI</h1>
        @php
            $randomStatus = array_rand($status);
        @endphp
        <p class="{{ $status[$randomStatus] }}">{{ $randomStatus }}</p>
    </div>
@endfor
