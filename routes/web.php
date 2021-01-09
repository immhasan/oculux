<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RoleController;

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProductController;

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

    Route::middleware('auth')->prefix('admin')->namespace('admin')->group(function(){

    Route::view("/",'admin.dashboard.dashboard')->name('admin');
    //Route::view("roles",'admin.role.list');
    //Route::view("users",'admin.user.list');
    Route::view("clients",'admin.client.list');
    Route::view("settings",'admin.setting.list');
    Route::view("products",'admin.product.list');
    Route::view("category",'admin.category.list');
    Route::view("sub_category",'admin.sub_category.list');
    Route::view("makes",'admin.make.list');
    Route::view("models",'admin.model.list');
    Route::view("newsletters",'admin.newsletter.list');
    Route::view("testimonials",'admin.testimonial.list');
    Route::view("messages",'admin.message.list');
    Route::view("contacts",'admin.contact.list');

////// USERS
        Route::get('users',[UserController::class,'index'])->name('users');
        Route::get('edit-user/{id}',[UserController::class,'edit'])->name('edit-user');
        Route::post('add-user',[UserController::class,'add'])->name('add-user');
        Route::post('delete-user',[UserController::class,'delete'])->name('delete-user');

////// ROLES
        Route::get('roles',[RoleController::class,'index'])->name('roles');
        Route::get('edit-role/{id}',[RoleController::class,'edit'])->name('edit-role');
        Route::post('add-role',[RoleController::class,'add'])->name('add-role');
        Route::post('delete-role',[RoleController::class,'delete'])->name('delete-role');

});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
