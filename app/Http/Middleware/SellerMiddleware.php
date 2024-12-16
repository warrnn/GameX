<?php

namespace App\Http\Middleware;

use App\Models\Sellers;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isSellerActive = Sellers::where('user_id', $request->session()->get('user_id'))->first()->status == 'ACTIVE';

        if ($this->getUserSellerId($request) && $isSellerActive) {
            return $next($request);
        } else { 
            return redirect()->back()->with('info', 'Please wait for admin approval');
        }

        return redirect()->back();
    }

    public function getUserSellerId(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $seller_id = Sellers::where('user_id', $user_id)->first();

        return $seller_id->id;
    }
}
