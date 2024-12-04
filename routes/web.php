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

    Route::get('/dashboard',function(){
        return view('admin.sections.index');
    })->name('dashboard');

    Route::get('/tasks',function(){
        return view('admin.sections.posts.index');
    })->name('tasks');

    Route::get('/edit',function(){
        return view('admin.sections.editor.index.blade');
    })->name('edit');
    

});