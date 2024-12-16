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

        if ($request->session()->has('seller_id') && $isSellerActive) {
            return $next($request);
        }

        return redirect()->back();
    }
}
