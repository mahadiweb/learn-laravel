<?php

// namespace App\Helpers;
use Illuminate\Support\Facades\Auth;

// class RoleHelper
// {
// 	public static function roleHas($role){
// 		return $role;
// 	}
// }

///__For use class helper assign it into config/app.php file as alias__// Tutorial:https://medium.com/@razamoh/create-own-custom-helper-functions-classes-in-laravel-e8d2f50ff38 ///

if (!function_exists('helloLOL')) { //test function
	function helloLOL($e){
		return $e;
	}
}

if(!function_exists('roleHas')){
	function roleHas($role){
		if (Auth::check()) {

            $permission = unserialize(auth::user()->role);
            if (!empty($permission)) {
                if (in_array($role, $permission)) {
                    return true;
                }else{
                    return false;
                };
            }else{
                return false;
            }

        }else{
            return false;
        }
	}
}