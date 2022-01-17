<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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

Route::prefix('admin/login')->group(function () {
    Route::get('show',[App\Http\Controllers\Auth\AdminLoginController::class,'showLoginForm'] )->name('admin.auth.login');
    Route::post('', [App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.auth');
    Route::view('register', 'cms.auth.register')->name("admin.auth.register");
    Route::view('password/forget', 'cms.auth.forgot_password')->name("admin.auth.forgot_password");
    Route::view('password/recover', 'cms.auth.recover_password')->name("admin.auth.recover_password");
});

Route::prefix('admin/')->middleware(['auth:admin'])->group(function () {
    Route::view('', 'cms.dashboard')->name("admin.dashboard");
    Route::get('logout', [App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name("admin.logout");
    Route::view('lock', 'cms.auth.lock_screen')->name("admin.auth.lock_screen");
});
Route::prefix('adminView/')->middleware(['auth:admin'])->group(function(){

    Route::get('','AdminController@index')->name('cms.admin.index');
    Route::get('create','AdminController@create')->name('admin.create');
    Route::post('store','AdminController@store')->name('admin.store');
    Route::get('{id}','AdminController@edit')->name('admin.edit');
    Route::put('{id}\update','AdminController@update')->name('admin.update');
    Route::get('{id}\delete','AdminController@destroy')->name('admin.destroy');



});
Route::prefix('customerstore/')->middleware(['auth:admin'])->group(function(){

    Route::get('','CustomerController@index')->name('cms.customer.index');
    Route::get('create','CustomerController@create')->name('customer.create');
    Route::post('store','CustomerController@store')->name('customer.store');
    Route::get('{id}','CustomerController@edit')->name('customer.edit');
    Route::put('{id}\update','CustomerController@update')->name('customer.update');
    Route::get('{id}\delete','CustomerController@destroy')->name('customer.destroy');



});
Route::prefix('product/')->middleware(['auth:admin'])->group(function(){

    Route::get('','ProductController@index')->name('cms.product.index');
    Route::get('create','ProductController@create')->name('product.create');
    Route::post('store','ProductController@store')->name('product.store');
    Route::get('{id}','ProductController@edit')->name('product.edit');
    Route::put('{id}\update','ProductController@update')->name('product.update');
    Route::get('{id}\delete','ProductController@destroy')->name('product.destroy');



});

Route::prefix('customer/')->group(function () {
    Route::get('log', [App\Http\Controllers\Auth\CustomerLoginController::class,'showLoginForm'])->name('customer.auth.login');
    Route::post('login', [App\Http\Controllers\Auth\CustomerLoginController::class,'login'])->name('cutomer.auth');
    Route::view('register', 'website.auth.register')->name("customer.auth.register");
    // Route::view('password/forget', 'cms.auth.forgot_password')->name("admin.auth.forgot_password");
    // Route::view('password/recover', 'cms.auth.recover_password')->name("admin.auth.recover_password");
});

Route::prefix('customerlogin/')->middleware(['auth:customer'])->group(function () {
   Route::get('website', [App\Http\Controllers\WebSiteController::class,'showItemWithAuth'])->name("auth.customer.dashboard");
    Route::get('logout', [App\Http\Controllers\Auth\CustomerLoginController::class,'logout'])->name("customer.logout");
    Route::view('lock', 'cms.auth.lock_screen')->name("customer.auth.lock_screen");
});

Route::prefix('categoryView/')->middleware(['auth:admin'])->group(function(){

    Route::get('/',[App\Http\Controllers\CategoryController::class,'index'])->name('cms.category.index');
    Route::get('create',[App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
    Route::post('ajax/store',[App\Http\Controllers\CategoryController::class,'ajaxStore'])->name('category.ajax.store');
    Route::post('store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
    Route::get('{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::put('{id}/update',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
    Route::delete('destroy/{id}/delete',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category.destroy');



});



Route::get('','WebSiteController@showItem')->name('home.slider');
/* search route */
Route::get('search',[\App\Http\Controllers\Ajax\SearchController::class,'setResultSearch']);

