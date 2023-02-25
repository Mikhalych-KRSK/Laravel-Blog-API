<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return "Логин";
    }

    public function login(Request $request)
    {
        $date = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth("web")->attempt($date)){
            return redirect(route("main.index"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден"]);
    }

    public function showRegisterForm()
    {
        return "Регистрация";
    }

    public function register(Request $request)
    {
        $date = $request->validate([
            "name" => ["required|min:3|max:20", "string"],
            "email" => ["required|min:6|max:24", "email", "string", "unique:users,email"],
            "password" => ["required|min:8|max:14", "confirmed"]
        ]);

        $user = User::create([
            "name" => $date["name"],
            "email" => $date["email"],
            "password" => bcrypt($date["password"])
        ]);

        if($user){
            auth("web")->login($user);
        }

        return redirect(route("main.index"));
    }

}
