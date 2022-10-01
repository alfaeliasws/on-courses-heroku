<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class EnsureUser
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
        if($request->user() == null)
        {
            return redirect('/')->with('message',"You are not authorized");
        }
        //check if admin
        else if(($request->user() && $request->user()->is_admin === 0) || ($request->user()->is_admin === 1))
        {
            return $next($request);
        }
        else
        {
            return redirect('/')->with('message',"You are not authorized");
        }
    }
}
