<?php

use App\Http\Controllers\AdminModifierController;
use App\Http\Controllers\TaskController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManagmentController;
use Illuminate\Http\Request;
use App\Http\Controllers\forgetpassController;


Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tasks',TaskController::class);
Route::resource('adminmod',AdminModifierController::class);


Route::get('/managment',function(){
    return view('admin.main.admin_main');
})->name('managment')->middleware('auth');

Route::get('/managment_login',[ManagmentController::class, 'takelogin'])->name('login.take');

Route::post('/check',[ManagmentController::class,'login'])->name('login.check');

Route::get('/loggingout',[ManagmentController::class, 'logout'])->name('logout.dashboard');

Route::get('/forgetpass',[forgetpassController::class, 'showTheForm'])->name('forget.pass');
Route::post('/reset',[forgetpassController::class, 'reset'])->name('reset.pass');
Route::get('/passresetform/{token}',[forgetpassController::class, 'showresetpassform'])->name('resetpass.show');


Route::middleware(['auth'])->prefix('admin')->group(function(){

    Route::get('/dashboard',function(Request $request){
        $path = $request->path();
        return view('admin.sections.index',compact('path'));
    })->name('dashboard');

    Route::get('/tasks',function(Request $request){
        $path = $request->path();
        return view('admin.sections.posts.index',compact('path'));
    })->name('tasks');

    Route::get('/edit',function(Request $request){
        $path = $request->path();
        return view('admin.sections.editor.index.blade',compact('path'));
    })->name('edit');
    

});