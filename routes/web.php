<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* Login Route */
Route::namespace('Admin')->group(function (){
    Route::get('/', 'LoginController@loginPage')->name('admin.login');
    Route::post('/admin/checklogin','LoginController@checklogin')->name('admin.checklogin');
});

/* Auth Route */

Route::namespace('Admin')->group(function(){
    Route::middleware('auth:administrator')->group(function(){
        Route::get('/admin/logout','LoginController@doLogout')->name('admin.logout');

        /* Admin Route */
        Route::prefix('admin')->group(function(){
            Route::get('/','AdminController@index');
            Route::get('setup','AdminController@show');
            Route::post('setup','AdminController@create');
            Route::get('delete/{id}','AdminController@delete');
            Route::get('edit/{id}','AdminController@edit')->where('id','[0-9]+');
            Route::post('edits/{id}','AdminController@update');
        });

        /* Category Route */
        Route::prefix('category')->group(function(){
            Route::get('/', 'CategoryController@index');
            Route::get('setup', 'CategoryController@show');
            Route::post('setup', 'CategoryController@create');
            Route::get('edit/{id}', 'CategoryController@edit')->where('id','[0-9]+');
            Route::post('edits/{id}', 'CategoryController@update');
            Route::get('delete/{id}', 'CategoryController@delete');
        });

        /*  CurrencyType Route */
       Route::prefix('currency')->group(function(){
           Route::get('/','CurrencyController@index');
           Route::get('setup','CurrencyController@show');
           Route::post('setup','CurrencyController@create');
           Route::get('edit/{id}','CurrencyController@edit')->where('id','[0-9]+');
           Route::post('edits/{id}','CurrencyController@update');
           Route::get('delete/{id}','CurrencyController@delete');
       });

       /* Feature Route */
        Route::prefix('feature')->group(function(){
            Route::get('/','FeatureController@index');
            Route::get('/setup','FeatureController@show');
            Route::post('/setup','FeatureController@create');
            Route::get('/edit/{id}','FeatureController@edit')->where('id','[0-9]+');
            Route::post('/edits/{id}','FeatureController@update');
            Route::get('delete/{id}','FeatureController@delete');
        });

        /* Payment Route */
        Route::prefix('payment')->group(function(){
            Route::get('/','PaymentTypeController@index');
            Route::get('setup','PaymentTypeController@show');
            Route::post('setup','PaymentTypeController@create');
            Route::get('edit/{id}','PaymentTypeController@edit')->where('id','[0-9]+');
            Route::post('edits/{id}','PaymentTypeController@update');
            Route::get('delete/{id}','PaymentTypeController@delete');
        });

        /* Property Type Route */
        Route::prefix('property_type')->group(function(){
            Route::get('/','PropertyTypeController@index');
            Route::get('setup','PropertyTypeController@show');
            Route::post('setup','PropertyTypeController@create');
            Route::get('edit/{id}','PropertyTypeController@edit')->where('id','[0-9]+');
            Route::post('edits/{id}','PropertyTypeController@update');
            Route::get('delete/{id}','PropertyTypeController@delete');
        });

        /* Property Image Route */
        Route::prefix('property_image')->group(function(){
            Route::get('/','PropertyImageController@index');
            Route::get('/setup','PropertyImageController@show');
            Route::post('setup','PropertyImageController@create');
            Route::get('/edit/{id}','PropertyImageController@edit')->where('id','[0-9]+');
            Route::post('/edits/{id}','PropertyImageController@update');
            Route::get('/delete/{id}','PropertyImageController@delete');
        });

        /* Property Route */
        Route::prefix('property')->group(function(){
            Route::get('/','PropertyController@index');
            Route::get('/setup','PropertyController@show');
            Route::post('/setup','PropertyController@create');
            Route::get('/edit/{id}','PropertyController@edit')->where('id','[0-9]+');
            Route::post('/edits/{id}','PropertyController@update');
            Route::get('/delete/{id}','PropertyController@delete');
        });

        /* Room Type */
        Route::prefix('room_type')->group(function(){
            Route::get('/','RoomTypeController@index');
            Route::get('/setup','RoomTypeController@show');
            Route::post('/setup','RoomTypeController@create');
            Route::get('/edit/{id}','RoomTypeController@edit')->where('id','[0-9]+');
            Route::post('/edits/{id}','RoomTypeController@update');
            Route::get('/delete/{id}','RoomTypeController@delete');
        });

        /* State Division Route */
        Route::prefix('state_division')->group(function(){
            Route::get('/','StateDivisionController@index');
            Route::get('setup','StateDivisionController@show');
            Route::post('setup','StateDivisionController@create');
            Route::get('edit/{id}','StateDivisionController@edit')->where('id','[0-9]+');
            Route::post('edits/{id}','StateDivisionController@update');
            Route::get('delete/{id}','StateDivisionController@delete');
        });

        /* Slider */
        Route::prefix('slider')->group(function(){
           Route::get('/','SliderController@index');
           Route::get('/setup','SliderController@show');
           Route::post('/setup','SliderController@create');
           Route::get('/edit/{id}','SliderController@edit')->where('id','[0-9]+');
           Route::post('/edits/{id}','SliderController@update');
           Route::get('/delete/{id}','SliderController@delete');
        });

        /* Street */
        Route::prefix('street')->group(function(){
            Route::get('/','StreetController@index');
            Route::get('/setup','StreetController@show');
            Route::post('/setup','StreetController@create');
            Route::get('/edit/{id}','StreetController@edit')->where('id','[0-9]+');
            Route::post('/edits/{id}','StreetController@update');
            Route::get('/delete/{id}','StreetController@delete');
        });

        /* Township Route */
        Route::prefix('township')->group(function(){
            Route::get('/','TownshipController@index');
            Route::get('setup','TownshipController@show');
            Route::post('setup','TownshipController@create');
            Route::get('edit/{id}','TownshipController@edit')->where('id','[0-9]+');
            Route::post('edits/{id}','TownshipController@update');
            Route::get('delete/{id}','TownshipController@delete');
        });

        /* User Route */
       Route::prefix('user')->group(function(){
           Route::get('/','UserController@index');
           Route::get('setup','UserController@show');
           Route::post('setup','UserController@create');
           Route::get('edit/{id}','UserController@edit')->where('id','[0-9]+');
           Route::post('edits/{id}','UserController@update');
           Route::get('delete/{id}','UserController@delete');
       });

        /* Notification Route */
        Route::get('/noti','NotificationController@index');
        Route::get('/addNoti','NotificationController@show');
        Route::post('/addNoti','NotificationController@create');
        Route::get('editNoti/{id}','NotificationController@edit');
        Route::post('editNoti/{id}','NotificationController@update');
        Route::get('deleteNoti/{id}','NotificationController@delete');

    });
});
