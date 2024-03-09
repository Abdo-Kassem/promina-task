<?php

use App\Http\Controllers\UserDashboard\AlbumController;
use App\Http\Controllers\UserDashboard\Auth\LoginController;
use App\Http\Controllers\UserDashboard\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function() {

    Route::controller(RegisterController::class)->group(function() {

        Route::get('/register', 'register')->name('user.register');
        Route::post('/do-register', 'doRegister')->name('user.do_register');
    
    });
    
    Route::controller(LoginController::class)->group(function() {
    
        Route::get('/login', 'login')->name('user.login');
        Route::post('/do-login', 'doLogin')->name('user.do_login');
    
    });


    Route::middleware('auth')->group(function() {

        Route::view('/index', 'users-dashboard.index')->name('user.index');

        Route::resource('/albums', AlbumController::class);
        Route::get('remove/picture/{pictureId}', [AlbumController::class, 'removeSingleImage'])->name('albums.remove.picture');
        Route::post('album/move/{album}', [AlbumController::class, 'movePictures'])->name('albums.destroy.move');

    });

});
