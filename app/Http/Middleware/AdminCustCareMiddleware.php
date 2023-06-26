<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCustCareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('staff')->check() && auth('staff')->user()->role === 'Admin') {
            return $next($request);
        } else if(Auth::guard('staff')->check() && auth('staff')->user()->role === 'Customer Care'){
            return $next($request);
        }else{
            return redirect()->route('unauthorized');
        }
        
    }
}
