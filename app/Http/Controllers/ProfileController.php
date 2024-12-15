<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function changeName(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $user_id = $request->user_id;
        $name = $request->name;

        Users::where('id', $user_id)->update([
            'name' => $name
        ]);

        return redirect()->route('buyer.profile')->with('success', 'Name Updated Successfully');
    }
}
