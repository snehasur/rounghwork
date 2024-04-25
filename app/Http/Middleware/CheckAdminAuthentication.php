<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('admin_id')) {
            // User is authenticated, continue with the request
            return $next($request);
        }else{
           // return $next($request);
            return redirect()->route('loginAdmin')->with('error','Only Admin can access.');

        }


    }
}
