<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class CheckStudentAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('student_id')) {
            // User is authenticated, continue with the request
            return $next($request);
        }else{
           // return $next($request);
            return redirect()->route('loginStudent')->with('error','Only Student can access.');

        }


    }
}
