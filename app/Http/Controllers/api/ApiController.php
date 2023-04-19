<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use DB;

class ApiController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $login = DB::table('users')->where(['email'=>$email,'password'=>$password])->count();

        if ($login == 1) {
            $key = env('JWT_SECRET');
            $payload = [
                'name' => 'Mahdi',
                'email' => 'test@gmail.com',
                //'iss' => 'http://example.org',
                //'aud' => 'http://example.com',
                'iat' => time(),
                'exp' => time()+120
            ];
            $token = JWT::encode($payload, $key, 'HS256');

            return response()->json([
                "status"=>"Success",
                "token"=>$token
            ]);
        }else{
            return response()->json([
                "status"=>"Fail",
            ]);
        }
    }
}
