<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tasks',TaskController::class);
Route::get('/dashboard',function(){
    return view('home');
})->name('dashboard')->middleware('auth');




Route::middleware(['auth'])->prefix('admin')->group(function(){

    Route::get('/admin',function(){
        return view('admin.sections.index');
    })->name('dashboard');

    Route::get('/posts',function(){
        return view('admin.sections.posts.index');
    });
    

});