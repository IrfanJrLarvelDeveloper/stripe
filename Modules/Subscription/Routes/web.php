<?php

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

Route::prefix('subscription')->group(function () {
//For Admin
    Route::get('/', 'SubscriptionController@index');
    Route::group(['middleware' => ['auth', 'role:admin']], function () {


        Route::get('/index', 'SubscriptionController@subscription');
        Route::get('/create', 'SubscriptionController@create');
        Route::post('/store', 'SubscriptionController@store')->name('store');
        Route::get('/create_user_subscription/{id}', 'SubscriptionController@create_user_subscription')->name('create_user_subscription');
        Route::post('/store_user_subscription', 'SubscriptionController@store_user_subscription')->name('store_user_subscription');
        Route::get('/users', 'SubscriptionController@user_subscription');
    });
//    For User
    Route::group(['middleware' => ['auth', 'role:user']], function () {

        Route::post('/user_get_subscription', 'SubscriptionController@user_get_subscription')->name('user_get_subscription');

        Route::post('/request_for_custom_plan/', 'SubscriptionController@request_for_custom_plan')->name('request_for_custom_plan');

        Route::get('stripe/{id}', 'SubscriptionController@stripe')->name('stripe');
        Route::post('stripe', 'SubscriptionController@stripePost')->name('stripe.post');

    });
});
