<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user || $user->level !== 'admin') {
            return redirect()->route('admin404')->with('error', 'Akses Tidak Diperbolehkan');
        }
        return $next($request);
    }
}