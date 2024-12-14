<?php

namespace App\Http\Controllers;

use App\Models\Sellers;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class BuyerController extends Controller
{
    public function registAsSeller(Request $request)
    {
        try {
            $request->validate([
                'domicile' => 'required',
                'address' => 'required',
                'phone' => 'required | numeric'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $domicile = $request->domicile;
        $address = $request->address;
        $phone = $request->phone;

        $uuid = Uuid::uuid4()->toString();
        Sellers::create([
            'id' => $uuid,
            'domicile' => $domicile,
            'address' => $address,
            'phone' => $phone,
            'user_id' => $request->session()->get('user_id'),
            'status' => 'INACTIVE'
        ]);

        $request->session()->put('seller_id', $uuid);
        return redirect()->route('buyer.profile')->with('success', 'Seller Account created, please wait for admin approval');
    }
}
