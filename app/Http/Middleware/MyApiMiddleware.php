<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class MyApiMiddleware
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
         if ($request->header('token') && $request->header('token') !=="") {
            $token = $request->header('token');
            $key = env('JWT_SECRET');
            
            try{
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $next($request);
            }catch(\Exception $e){
                return abort(401);
            }
        }else{
            return abort(401);
        }
    }
}
