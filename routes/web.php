<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", [\App\Http\Controllers\AuthController::class, "show"]);
Route::post("/submit", [\App\Http\Controllers\AuthController::class, "create"])->name("submit");
Route::get("/verify", [\App\Http\Controllers\AuthController::class, "verify"])->name("verify");
Route::post("/verify", [\App\Http\Controllers\AuthController::class, "sverify"])->name("verify");