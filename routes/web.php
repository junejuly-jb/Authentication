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
    return view('welcome');
});

Auth::routes();


// Route::get('/userdashboard', 'HomeController@index')->name('userdashboard');

Route::group(['middleware' => ['auth','admin']], function () {
    
    Route::get('/admindashboard', function () {
        return view('admindashboard');
    });
});

Route::group(['middleware' => ['auth','user']], function () {
    
   Route::get('/userdashboard', function () {
        return view('userdashboard');
        
   });

});

