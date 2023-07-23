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

Route::get('/', function () {
    return view('thesis');
});
Route::get('/thesis', function () {
    return view('thesis');
});
Route::get('/proposal', function () {
    return view('proposal');
});
Route::get('/plan', function () {
    return view('plan');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/thesis/create_one',[\App\Http\Controllers\AdminController::class,'createThesisOne']);
