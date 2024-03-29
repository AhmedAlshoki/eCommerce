<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        if ($request->path() == "login" && $request->session()->has('user')) {
            return redirect('/products');
        }
        if ($request->path() == "AddProduct" && !$request->session()->has('user')) {

            return redirect('/login');
        }
        if ($request->path() == "profile" && !$request->session()->has('user')) {
            return redirect('/login');
        }
        return $next($request); 

    }
}
