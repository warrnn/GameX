<?php

namespace App\Http\Controllers;

use App\Models\Buyers;
use App\Models\Games;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Ramsey\Uuid\Uuid;

class TransactionController extends Controller
{
    public function process(Request $request)
    {

        try {
            $request->validate(
                [
                    'name' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                    'game_id' => 'required|exists:games,id'
                ]
            );
        } catch (\Throwable $th) {
            Log::error('Error validate', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', $th->getMessage());
        }

        $game = Games::select('games.*', 'sellers.id as seller_id')
                ->join('sell_details', 'sell_details.game_id', '=', 'games.id')
                ->join('sellers', 'sellers.id', '=', 'sell_details.seller_id')
                ->where('games.id', $request->game_id)
                ->first();

        $user_id = $request->session()->get('user_id');

        $buyer = Buyers::create(
            [
                'id' => Uuid::uuid4()->toString(),
                'address' => $request->address,
                'phone' => $request->phone,
                'domicile' => $request->city,
                'user_id' => $user_id        
            ]
        );

        $transaction = Transactions::create(
            [
                'id' => Uuid::uuid4()->toString(),
                'transaction_date' => now(),
                'shipping_number' => uniqid(),
                'status' => 'PROCESS',
                'buyer_id' => $buyer->id,
                'seller_id' => $game->seller_id,
                'game_id' => $request->game_id,
            ]
        );

        Config::$serverKey = config('midtrans.serverKey');
        Config::$clientKey = config('midtrans.clientKey');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$is3ds = config('midtrans.is3ds');

        // Parameter transaksi harcode
        $transactionDetails = [
            'order_id' => $transaction->id, 
            'gross_amount' => $game->price, 
        ];


        $customerDetails = [
            'first_name' => $request->name,
            'phone' => $request->phone,
            'billing_address' => [
                'address' => $request->address,
                'city' => $request->city,
            ],
            
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            Log::info('Snap Token:', ['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Error getting Snap Token:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to get payment token.');
        }

        $page_title = 'GameX | Payment';
        return view('buyer.contents.store.midtrans', compact('snapToken', 'page_title'));
    }
}