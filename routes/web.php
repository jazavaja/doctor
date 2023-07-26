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
Route::get('/admin/proposal/create_one',[\App\Http\Controllers\AdminController::class,'createProposalOne']);

Route::get('/admin/thesis/create_group',[\App\Http\Controllers\AdminController::class,'createThesisGroup']);
Route::get('/admin/category/create_group',[\App\Http\Controllers\AdminController::class,'createCategoryGroup']);
Route::get('/admin/position/create_group',[\App\Http\Controllers\AdminController::class,'createPositionGroup']);
Route::get('/admin/system/create_group',[\App\Http\Controllers\AdminController::class,'createSystemGroup']);
Route::get('/admin/proposal/create_group',[\App\Http\Controllers\AdminController::class,'createProposalGroup']);
Route::get('/admin/plan/create_group',[\App\Http\Controllers\AdminController::class,'createPlanGroup']);

Route::get('/admin/thesis/list',[\App\Http\Controllers\AdminController::class,'getListThesis']);
Route::get('/admin/proposal/list',[\App\Http\Controllers\AdminController::class,'getListProposal']);
