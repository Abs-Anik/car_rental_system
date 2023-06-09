<?php

use App\Http\Controllers\Adminpanel\AdminProfileController;
use App\Http\Controllers\Adminpanel\AdminRegistrationController;
use App\Http\Controllers\Adminpanel\DashboardController;
use App\Http\Controllers\Adminpanel\RoleController;
use App\Http\Controllers\Adminpanel\SettingController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\HomeController;
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

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Admin Panel

    Route::group(['middleware' => ['is_admin']], function () {
        
        Route::group(['prefix'=> 'admin','as'=>'admin.'], function(){

            /**
            * Admin Dashboard
            */
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            /**
             * Role & Permission
             */
            Route::resource('rolePermission',RoleController::class);

            /**
             * Admin Registration
             */
            Route::resource('registration',AdminRegistrationController::class);

            /**
             * Admin Profile
             */

             Route::get('/profile', [AdminProfileController::class, 'show'])->name('profile.view');
             Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
             Route::post('/profile/update/{id}', [AdminProfileController::class, 'update'])->name('profile.update');
     
             Route::get('/password/change',[AdminProfileController::class, 'userPasswordChangeView'])->name('password.change');
             Route::post('/password/change',[AdminProfileController::class, 'userPasswordChangeUpdate'])->name('password.update');

            /**
             * Setting
             */

             Route::get('/setting',[SettingController::class, 'index'])->name('setting.index');
             Route::post('/setting',[SettingController::class, 'store'])->name('setting.store');
             Route::post('/setting/{id}',[SettingController::class, 'update'])->name('setting.update');


        });

    });


    // User Panel


    Route::group(['middleware' => ['is_user']], function () {
    /**
    * User Dashboard
    */
     Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    });
});
