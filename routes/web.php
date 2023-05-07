<?php

use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Userpanel\UserDashboardController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function(){

    // Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=> 'admin','as'=>'admin.'], function(){

        /**
        * Admin Dashboard
        */

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('home');
        // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



    });

    /**
    * User Dashboard
    */
     Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    //  Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard.index');
});
