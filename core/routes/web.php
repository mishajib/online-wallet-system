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

Route::get('home', "HomeController@index")->name('home')->middleware(['auth:web', 'preventBackHistory']);

//User Routes
Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['namespace' => 'Backend\User', 'as' => 'user.', 'middleware' => ['auth:web', 'verified', 'preventBackHistory']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile-update', 'ProfileController@updateProfile')->name('profile.update');
    Route::put('profile-image-update', 'ProfileController@updateProfileImage')->name('profile.image.update');
    Route::put('password-update', 'ProfileController@updatePassword')->name('password.update');
    Route::get('transfer/money', 'TransferController@index')->name('transfer');
    Route::post('transfer/money', 'TransferController@transfer')->name('transfer.money');
    Route::get('referred/users', 'DashboardController@refUsers')->name('referred.user');
});
//End User Routes

//Admin Routes
Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin\Authentication', 'as' => 'admin.', 'middleware' => ['preventBackHistory', 'adminauth']], function () {
    Route::get('login', 'AdminLoginController@showLoginForm')->name('login.page');
    Route::post('login', 'AdminLoginController@login')->name('login');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin', 'as' => 'admin.', 'middleware' => ['auth:admin', 'adminauth', 'preventBackHistory']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'Authentication\AdminLoginController@logout')->name('logout');
    Route::get('user/all', 'UserController@index')->name('user.index');
    Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('user/{id}/update', 'UserController@update')->name('user.update');
    Route::get('user/{id}/show', 'UserController@show')->name('user.show');
    Route::put('user/{id}/update/password', 'UserController@updatePassword')->name('user.update.password');
    Route::get('user/transaction/all', 'TransactionController@index')->name('user.transaction.all');
    Route::get('{user}/transaction', 'TransactionController@userTransaction')->name('user.specific.transaction');
    Route::get('user/manage/balance', 'TransactionController@manageBalance')->name('user.balance.manage.page');
    Route::post('user/balance/operation', 'TransactionController@balanceOperation')->name('user.balance.operation');
    Route::get('site/setting', 'SettingController@index')->name('site.setting');
    Route::put('site/{id}/setting/update', 'SettingController@update')->name('site.setting.update');
    Route::get('interest/all', 'InterestController@index')->name('interest.all');
    Route::get('interest/create', 'InterestController@create')->name('interest.create');
    Route::put('interest/give/{id}', 'InterestController@give')->name('interest.give');
    Route::get('interest/{id}/edit', 'InterestController@edit')->name('interest.edit');
    Route::post('interest/store', 'InterestController@store')->name('interest.store');
    Route::put('interest/{id}/update', 'InterestController@update')->name('interest.update');
    Route::delete('interest/{id}/destroy', 'InterestController@destroy')->name('interest.destroy');
});
//End Admin Routes
