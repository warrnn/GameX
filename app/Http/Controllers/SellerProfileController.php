<?php

namespace App\Http\Controllers;

use App\Models\Sellers;
use Illuminate\Http\Request;

class SellerProfileController extends Controller
{
    public function sellerChangeData(Request $request)
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

        Sellers::where('id', $this->getUserSellerId($request))->update([
            'domicile' => $domicile,
            'address' => $address,
            'phone' => $phone
        ]);

        return redirect()->route('seller.profile')->with('success', 'Your Seller Data Updated Successfully');
    }

    public function getUserSellerId(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $seller_id = Sellers::where('user_id', $user_id)->first();

        return $seller_id->id;
    }
}
