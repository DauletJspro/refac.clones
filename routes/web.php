<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::redirect('/', 'login');


Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::post('/home/ajax', [HomeController::class, 'ajax'])->name('home.ajax');
    Route::get('/home', 'HomeController@index')->name('home.index');

    // Route for profile
    Route::resource('profile', 'ProfileController')->only([
        'index', 'edit', 'update'
    ]);
        Route::get('/password/{profile}/edit', 'ProfileController@editPassword')
            ->name('profile.password.edit');
        Route::put('/password/{profile}', 'ProfileController@updatePassword')
            ->name('profile.password.update');


});



