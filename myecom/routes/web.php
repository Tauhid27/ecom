<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/manage_category', [CategoryController::class, 'manage_category']);
    Route::get('admin/logout', function () {
              session()->forget('ADMIN_LOGIN');
               session()->forget('ADMIN_ID');
               session()->flash('error', 'logout sucessfully');
                return redirect('admin');
    });


    // //how to encript password
    // Route::get('admin/updatepassword', [AdminController::class, 'updatepassword']);
});
