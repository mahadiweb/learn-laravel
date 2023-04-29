<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) { // For guard: Auth::guard('web')->check()

            $permission = unserialize(auth::user()->role);
            if (!empty($permission)) {
                if (in_array($role, $permission)) {
                    return $next($request);
                }else{
                    return abort(401); //For api
                    //return redirect()->back();
                };
            }else{
                return abort(401); //For api
                //return redirect()->back();
            }

        }else{
            return redirect()->route('login');
        }
        
    }
}
