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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

//
Route::group(['middleware' => ['auth']], function() {
    Route::any('/home', 'HomeController@index')->name('home');
    Route::post('/send/sms', 'HomeController@SendSms')->name('send.sms');
});
