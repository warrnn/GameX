<?php

namespace App\Http\Middleware;

use App\Models\Admins;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Admins::where('user_id', $request->session()->get('user_id'))->exists()) {
            return $next($request);
        }
        return redirect()->back()->with('error', 'You\'re not authorized to access admin page');
    }
}
