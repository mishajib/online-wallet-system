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
Route::post('send/message', 'Backend\Admin\ContactController@sendMail')->name('send.message');

//User Routes
Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register/{user}', 'Auth\RegisterController@showRegistrationForm')->name('refer');

Route::group(['namespace' => 'Backend\User', 'as' => 'user.', 'middleware' => ['auth:web', 'verified', 'preventBackHistory']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile', 'ProfileController@index')->name('profile')->middleware('password.confirm');
    Route::put('profile-update', 'ProfileController@updateProfile')->name('profile.update');
    Route::put('profile-image-update', 'ProfileController@updateProfileImage')->name('profile.image.update');
    Route::put('password-update', 'ProfileController@updatePassword')->name('password.update');
    Route::get('transfer/money', 'TransferController@index')->name('transfer');
    Route::post('transfer/money', 'TransferController@transfer')->name('transfer.money');
    Route::get('referred/users', 'DashboardController@refUsers')->name('referred.user');
    Route::get('refer/friend', 'ProfileController@referPage')->name('refer.friend');
    Route::post('referral/link/send', 'ProfileController@sendLink')->name('referral.link.send');

    Route::get('refer/bonus/all', 'TransactionController@index')->name('refer.bonus');
    Route::get('transfer/bonus/all', 'TransactionController@transferBonus')->name('transfer.bonus');
    Route::get('user/transaction/search', 'TransactionController@searchTransaction')->name('search.transaction');
});
//End User Routes

//Admin Routes
Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin\Authentication', 'as' => 'admin.', 'middleware' => ['preventBackHistory', 'adminauth']], function () {
    Route::get('login', 'AdminLoginController@showLoginForm')->name('login.page');
    Route::post('login', 'AdminLoginController@login')->name('login');

    Route::get('password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::get('password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'AdminResetPasswordController@reset')->name('update.password');

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
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('profile-update', 'ProfileController@updateProfile')->name('profile.update');
    Route::put('profile-image-update', 'ProfileController@updateProfileImage')->name('profile.image.update');
    Route::put('password-update', 'ProfileController@updatePassword')->name('password.update');

    Route::get('referred/users', 'ReferController@index')->name('referred.users');
    Route::get('referral/users', 'ReferController@referralUsers')->name('referral.users');
    Route::get('referral/users/transactions', 'ReferController@referralTransactions')->name('referral.users.transactions');
    Route::get('referred/users/transactions', 'ReferController@referredTransactions')->name('referred.users.transactions');

    Route::get('ip/logs', 'TrackController@index')->name('user.track');

    Route::post('user/{id}', 'UserController@loginUsingId')->name('login.using.id');

    Route::get('contact/all', 'ContactController@index')->name('contact.index');
    Route::get('contact/message/{id}/show', 'ContactController@show')
        ->name('show.message');
    Route::get('contact/message/{id}/send', 'ContactController@replySendMail')
        ->name('send.reply.message');
    Route::post('contact/message/{id}/reply', 'ContactController@replyMail')
        ->name('reply.message');

    Route::post('user/{id}/activate', 'UserController@active')->name('user.activate');
    Route::post('user/{id}/deactivate', 'UserController@deactive')->name('user.deactivate');

    Route::get('user/search', 'UserController@userSearch')->name('user.search');
    Route::get('user/referral/search', 'ReferController@referralUserSearch')->name('user.search.referral');
    Route::get('user/referred/search', 'ReferController@referredUserSearch')->name('user.search.referred');
    Route::get('user/transaction/search', 'TransactionController@transactionSearch')->name('user.search.transaction');
    Route::get('contact/search', 'ContactController@contactSearch')->name('search.contact');

    Route::get('interest/transaction/all', 'InterestController@transactions')
        ->name('interest.transactions');


});
//End Admin Routes
