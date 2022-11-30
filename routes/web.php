<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\IndexController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\ActivityController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::middleware(['auth','admin'])->group(function(){

    Route::get('/dashboard', [IndexController::class,'index'])->name('dashboard');

    Route::get('setting', [SettingController::class,'index'])->name('setting.index');
    Route::put('setting-update/{id}', [SettingController::class,'update'])->name('setting.update');

    Route::get('/activity-log', [IndexController::class,'ListActivity'])->name('activity');
    
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('product/attribute/{id}',[ProductController::class,'attribute'])->name('product.attribute');
    Route::resource('attributes-product', AttributeController::class);
});

