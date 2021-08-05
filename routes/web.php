<?php

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
    return redirect('subscription');
});

//auth route for both
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/user-dashbroad', 'App\Http\Controllers\DashboardController@user_dashbroad')->name('dashboard.mysubscription');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() {

    Route::get('/users', 'App\Http\Controllers\DashboardController@myprofile')->name('admin.users');

});


require __DIR__.'/auth.php';
