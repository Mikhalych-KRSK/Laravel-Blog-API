<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(["namespace" => "App\Http\Controllers\Main"], function () {
    Route::get("/", IndexController::class)->name("main.index");
});

Route::group(["namespace" => "App\Http\Controllers"], function () {
    Route::get("/login", AuthController::class, "showLoginForm")->name("login");
    Route::get("/register", AuthController::class, "showRegisterForm")->name("register");
    Route::post("/register_process", AuthController::class, "register")->name("register_process");

});

Route::group(["namespace" => "App\Http\Controllers\Category", "prefix" => "categories"], function () {
    Route::get("/", IndexController::class)->name("category.index");
    Route::get("/create", CreateController::class)->name("category.create");
    Route::post("/", StoreController::class)->name("category.create.store");
    Route::get("/{category}", ShowController::class)->name("category.create.show");
    Route::get("/{category}/edit", EditController::class)->name("category.create.edit");
    Route::patch("/{category}", UpdateController::class)->name("category.create.update");
    Route::delete("/", DeleteController::class)->name("category.create.delete");
});

Route::group(["namespace" => "App\Http\Controllers\Post", "prefix" => "posts"], function () {
    Route::get("/", IndexController::class)->name("post.index");
    Route::get("/create", CreateController::class)->name("post.create");
    Route::post("/", StoreController::class)->name("post.create.store");
    Route::get("/{post}", ShowController::class)->name("post.create.show");
    Route::get("/{post}/edit", EditController::class)->name("post.create.edit");
    Route::patch("/{post}", UpdateController::class)->name("post.create.update");
    Route::delete("/", DeleteController::class)->name("post.create.delete");

    Route::group(["namespace" => "App\Http\Controllers\Post", "prefix" => "{post}/comments"], function () {
        Route::post("/", StoreController::class)->name("post.comment.store");

    });

    Route::group(["namespace" => "App\Http\Controllers\Post", "prefix" => "{post}/like"], function () {
        Route::post("/", StoreController::class)->name("post.like.store");

    });
    
});

?>