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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createDailyReport', ['uses'=>'DailyReportController@create']);
Route::post('/create', ['uses'=>'DailyReportController@store']);

Route::get('/DailyReport', ['uses'=>'DailyReportController@index']);
Route::get('/Report', ['uses'=>'DailyReportController@report']);

//insert data
// Route::get('insert','StudInsertController@insertform');
// Route::post('create','StudInsertController@insert');
