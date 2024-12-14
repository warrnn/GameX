<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Throwable;

use function Laravel\Prompts\error;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $userExist = Users::where('email', $email)->first();

        if ($userExist) {
            return redirect()->back()->with('error', 'Email already exists on another account');
        } else {
            Users::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ]);
            return redirect()->route('buyer.store')->with('success', 'Account created');
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $email = $request->email;
        $password = $request->password;

        $userExist = Users::where('email', $email)->first();
        if ($userExist) {
            if (Hash::check($password, $userExist->password)) {
                $request->session()->put('user', $userExist);
                return redirect()->route('buyer.store')->with('success', 'Login successfully');
            }
            return redirect()->back()->with('error', 'Password is incorrect');
        }
        return redirect()->back()->with('error', 'Account not found, please register first');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('guest.index');
    }
}