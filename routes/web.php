<?php

use App\Http\Controllers\SocialLoginController;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/auth/google',[SocialLoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback',[SocialLoginController::class,'authenticatedByGoogle']);

Route::get('/auth/facebook',[SocialLoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('auth/facebook/callback',[SocialLoginController::class,'authenticatedByFacebook']);
