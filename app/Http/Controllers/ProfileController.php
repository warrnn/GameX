<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function changeData(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'oldpassword' => 'required|min:8',
                'newpassword' => 'required|min:8',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $user_id = $request->session()->get('user_id');
        $email = $request->email;
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;

        if (!Hash::check($oldpassword, Users::where('id', $user_id)->first()->password)) {
            return redirect()->back()->with('error', 'Old Password is incorrect');
        }

        Users::where('id', $user_id)->update([
            'email' => $email,
            'password' => Hash::make($newpassword)
        ]);

        return redirect()->route('buyer.profile')->with('success', 'Data Updated Successfully');
    }
}
