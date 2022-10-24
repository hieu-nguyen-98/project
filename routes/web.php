<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('setting', [SettingController::class,'index'])->name('setting.index');
    Route::put('setting-update/{id}', [SettingController::class,'update'])->name('setting.update');

    Route::resource('category', CategoryController::class);
});