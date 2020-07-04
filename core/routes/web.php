<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['namespace' => 'Backend\User', 'as' => 'user.', 'middleware' => ['auth:web', 'preventBackHistory']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile-update', 'ProfileController@updateProfile')->name('profile.update');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin\Authentication', 'as' => 'admin.', 'middleware' => ['preventBackHistory', 'adminauth']], function () {
    Route::get('login', 'AdminLoginController@showLoginForm')->name('login.page');
    Route::post('login', 'AdminLoginController@login')->name('login');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin', 'as' => 'admin.', 'middleware' => ['auth:admin', 'adminauth', 'preventBackHistory']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'Authentication\AdminLoginController@logout')->name('logout');
});
