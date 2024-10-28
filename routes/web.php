<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userCrud;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\commentController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\user;

Route::get('/', function () {
    return view('welcome');
});


// register 
Route::match(['post','get'],'register',[UserController::class,'register'])->name('register');

// login 
Route::match(['post','get'],'login',[UserController::class,'login'])->name('login');



Route::middleware(['auth'])->group(function () { 
    // dashboard 
    Route::get('home',[UserController::class,'dashboard'])->name('dashboard');
    
    // profile 
    Route::match(['post','get'],'home/profile',[UserController::class,'profile'])->name('profile'); 
    Route::get('userProfile',[UserController::class,'userProfile'])->name('userProfile'); 
    Route::match(['post','get'],'home/singleUpdate/{id}',[UserController::class,'singleUpdate'])->name('singleUpdate'); 
    
    // logout 
    Route::get('logout',[UserController::class,'logout'])->name('logout');
    
    // userCrud  
    Route::get('home/profile/userCrud',[userCrud::class,'userCrud'])->name('userCrud');
    Route::get('home/profile/userCrud/userView/{id}',[userCrud::class,'userView'])->name('userView');
    Route::get('userDelete/{id}',[userCrud::class,'userDelete'])->name('userDelete');

    // post 
    Route::resource('home/post', PostController::class);
    
    // search 
    Route::get('search',[UserController::class,'search'])->name('search');
    
    // comment 
    Route::match(['post','get'],'home/comment',[commentController::class,'comment'])->name('comment');
    Route::get('home/comment',[commentController::class,'viewComment'])->name('comment');

    // mail 
    Route::post('/contact/send', [EmailController::class, 'sendEmail'])->name('contact.send');
});


// crud user 
Route::get('user',[UserController::class,'user'])->name('user');



