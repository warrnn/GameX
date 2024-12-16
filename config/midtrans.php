<?php 



return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'isProduction' => false,
    'isSanitized' => true,
    'is3ds' => true
];