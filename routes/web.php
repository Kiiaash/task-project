<?php

use App\Http\Controllers\AdminModifierController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManagmentController;
use Illuminate\Http\Request;
use App\Http\Controllers\forgetpassController;
use App\Http\Middleware\loginCheck;

Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(loginCheck::class);
Route::resource('tasks', TaskController::class);
Route::resource('adminmod', AdminModifierController::class);


Route::get('/managment', function () {
    return view('admin.main.admin_main');
})->name('managment')->middleware('auth');

Route::controller(ManagmentController::class)->group(function () {
    Route::get('/managment_login','takelogin')->name('login.take')->middleware(loginCheck::class);
    Route::post('/check','login')->name('login.check');
    Route::get('/loggingout','logout')->name('logout.dashboard');
});

Route::controller(forgetpassController::class)->group(function () {
    Route::get('/forgetpass', 'showTheForm')->name('forget.pass');
    Route::post('/reset', 'reset')->name('reset.pass');
    Route::get('/passresetform/{token}', 'showresetpassform')->name('resetpass.show');
    Route::post('/passupdate', 'passwordUpdater')->name('update.pass');
});


Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function (Request $request) {
        $path = $request->path();
        return view('admin.sections.index', compact('path'));
    })->name('dashboard');

    Route::get('/tasks', function (Request $request) {
        $path = $request->path();
        return view('admin.sections.posts.index', compact('path'));
    })->name('tasks');

    Route::get('/edit', function (Request $request) {
        $path = $request->path();
        return view('admin.sections.editor.index.blade', compact('path'));
    })->name('edit');
});
