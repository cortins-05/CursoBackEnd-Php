<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::match(['get','post'],'/configuracion',[UserController::class,'config'])->name('config');
Route::post('/user/edit',[UserController::class,'update'])->name('user.update');
Route::get('/user/avatar/{filename}',[UserController::class,'getImage'])->name('user.avatar');
Route::get('/subir-imagen',[ImageController::class,'create'])->name('image.create');
Route::post('/image/save',[ImageController::class,'save'])->name('image.save');
Route::get('/image/file/{filename}',[ImageController::class,'getImage'])->name('image.file');
Route::get('/imagen/{id}',[ImageController::class,'detail'])->name('image.detail');
Route::post('comment/save',[CommentController::class,'save'])->name('comment.save');
Route::get('/comment/delete/{id}',[CommentController::class,'delete'])->name('comment.delete');