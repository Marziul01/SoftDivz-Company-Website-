<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;


Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/registration',[HomeController::class,'registration'])->name('registration');
Route::post('/checkStatus',[HomeController::class,'checkStatus'])->name('checkStatus');



Route::group(['prefix' => 'admin'],function(){

    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');
        Route::resource('project', ProjectController::class);
    });

});
