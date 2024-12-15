<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    public function addDiscount(Request $request)
    {
        try {
            $request->validate([
                'game_id' => 'required',
                'discount' => 'required | numeric | min:10 | max:100',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $game_id = $request->game_id;
        $discount = $request->discount;

        if (Sales::where('game_id', $game_id)->exists()) {
            return redirect()->back()->with('error', 'Discount for this game Already Exists!');
        }

        Sales::create([
            'discount' => $discount,
            'game_id' => $game_id
        ]);

        return redirect()->route('seller.managePromotion')->with('success', 'Discount Added Successfully');
    }

    public function updateDiscount(Request $request)
    {
        try {
            $request->validate([
                'discount' => 'required | numeric | min:10 | max:100',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $sale_id = $request->sale_id;
        $discount = $request->discount;

        Sales::where('id', $sale_id)->update([
            'discount' => $discount
        ]);

        return redirect()->route('seller.managePromotion')->with('success', 'Discount Updated Successfully');
    }

    public function deleteDiscount(Request $request)
    {
        try {
            $sale_id = $request->sale_id;

            $deleted = Sales::where('id', $sale_id)->delete();

            if ($deleted) {
                return redirect()->route('seller.managePromotion')->with('success', 'Discount Deleted Successfully');
            } else {
                return redirect()->route('seller.managePromotion')->with('error', 'No discount found.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('seller.managePromotion')->with('error', $th->getMessage());
        }
    }
}
