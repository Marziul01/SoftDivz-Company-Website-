<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HiringsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\TestimonialsController;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/services',[PagesController::class,'services'])->name('services');
Route::get('/projects',[PagesController::class,'projects'])->name('projects');
Route::get('/pricing',[PagesController::class,'pricing'])->name('pricing');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');
Route::get('/hire_us',[PagesController::class,'hire'])->name('hire');
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
        Route::resource('services', ServicesController::class);
        Route::resource('clients', ClientsController::class);
        Route::resource('testimonials', TestimonialsController::class);
        Route::resource('pricings', PricingController::class);
        Route::get('/plans',[HiringsController::class,'index'])->name('admin.plans');
        Route::get('/hire',[HiringsController::class,'index'])->name('admin.hire');
        Route::get('/siteSettings',[SiteSettingsController::class,'siteSettings'])->name('siteSettings');
        Route::post('/saveSettings',[SiteSettingsController::class,'saveSettings'])->name('saveSettings');
        Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
        Route::post('/saveProfile',[ProfileController::class,'saveProfile'])->name('saveProfile');
    });

});
