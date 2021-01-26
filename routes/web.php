<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\studentController;

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


 Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'student'], function(){
    Route::get('/','studentController@index')->name('student.index');
    Route::get('/show/{id}','studentController@show')->name('student.show');
    Route::get('/all','studentController@all')->name('student.all');
    Route::post('/store','studentController@store')->name('student.store');
    Route::get('/delete/{id}','studentController@delete')->name('student.delete'); 
   
});


    