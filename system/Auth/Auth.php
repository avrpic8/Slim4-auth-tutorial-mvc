<?php

namespace System\Auth;

use App\Models\User;
use System\Session\Session;


class Auth{

    public static function user(){

        if(!Session::get('user')){
            redirect('login');
        }

        $user = User::query()->find(Session::get('user'));
        if(empty($user)){
            Session::remove('user');
            redirect('login');
        } else{
            return $user;
        }
    }

    public static function check(){

        if(!Session::get('user')){
            redirect('login');
        }

        $user = User::query()->find(Session::get('user'));
        if(empty($user)){
            Session::remove('user');
            redirect('login');
        } else{
            return true;
        }
    }

    public static function checkLogin(){

        if(!Session::get('user')){
            return false;
        }

        $user = User::find(Session::get('user'));
        if(empty($user))
            return false;
        else
            return true;
    }

    public static function loginByEmail($email, $password): bool
    {
        $user = User::query()->where('email', $email)->first();
        if(empty($user)){
            error('login', 'کاربر وجود ندارد');
            return false;
        }

        if(password_verify($password, $user->password) and $user->is_active == 1){
            Session::set("user", $user->id);
            return true;
        }else{
            error('login', 'کلمه عبور اشتباه است');
            return false;
        }
    }

    public static function loginById($id){

        $user = User::query()->find($id);
        if(empty($user)){
            error('login', 'کاربر وجود ندارد');
            return false;
        }else{
            Session::set("user", $user->id);
            return true;
        }
    }

    public static function logOut(){

        Session::remove("user");
    }
}