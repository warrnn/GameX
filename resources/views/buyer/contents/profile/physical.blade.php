@php
$status = [
'On Process' => 'text-blue-500',
'Completed' => 'text-green-500',
'In Delivery' => 'text-yellow-500',
'Cancelled' => 'text-red-500'
];
@endphp

@for ($i = 0; $i < 2; $i++)
    @php
        $randomStatus = array_rand($status);
    @endphp
    <div tabindex="0" class="collapse bg-primary text-white">
        <div class="collapse-title text-xl font-medium">
            <h3>Grand Theft Auto VI</h3>
            <p class="{{ $status[$randomStatus] }}">{{ $randomStatus }}</p>
        </div>
        <div class="collapse-content mx-4 space-y-4">
            <div>
                <h4 class="font-semibold text-lg mb-1">Seller</h4>
                <p>Name : Jeco</p>
                <p>Domicile : Malang</p>
                <p>Address : Jl. Suhat Blok ABC No.124</p>
            </div>
            <div>
                <h4 class="font-semibold text-lg mb-1">Buyer</h4>
                <p>Name : Andreas</p>
                <p>Domicile : Surabaya</p>
                <p>Address : Jl. Ahmad Yani No.116</p>
            </div>
            <div>
                <h4 class="font-semibold text-lg mb-1">Detail</h4>
                <p>Shipping Number : abcdefghijk123456</p>
                <p>Items : Grand Theft Auto VI</p>
                <p>Transaction Date : 10 January 2024</p>
            </div>
        </div>
    </div>
    @endfor