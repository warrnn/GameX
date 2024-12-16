<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function process(Request $request){
        
        // $request->validate(
            
        // );

        // $transaction = Transactions::create(
        //     [
                
        //     ]
        // );

        Config::$serverKey = config('midtrans.serverKey');
        Config::$clientKey = config('midtrans.clientKey');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$is3ds = config('midtrans.is3ds');

         // Parameter transaksi harcode
         $transactionDetails = [
            'order_id' => 'namaGame',
            'gross_amount' => 700000, // -> harga game
        ];

        
        $customerDetails = [
            'first_name' => 'Sukri',
            'email' => 'sukri@gmail.com',
            'phone' => '0812341251234',
            // 'billing_address' => [ // -> optional
            //     'first_name' => 'Sukri',
            //     'address' => 'Jl. Siwalankerto',
            //     'city' => 'Surabaya'
            // ],
            // 'shipping_address' => [ // -> optional
            //     'first_name' => 'Sukri',
            //     'address' => 'Jl. Siwalankerto',
            //     'city' => 'Surabaya'
            // ]
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];

        $snapToken = Snap::getSnapToken($params);

        Log::info('Snap Token:', ['snapToken' => $snapToken]);

        $page_title = 'GameX | Payment';
        return view('buyer.contents.store.midtrans', compact('snapToken', 'page_title'));

    }
}