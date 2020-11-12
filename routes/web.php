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


Auth::routes();


Route::get('/', 'HomeController@index');




//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/createDailyReport', ['uses'=>'DailyReportController@create']);
    Route::post('/create', ['uses'=>'DailyReportController@store']);
    Route::get('/ReportHistory', ['uses'=>'DailyReportController@show']);
    Route::get('/sentReport/report/{id}', ['uses'=>'DailyReportController@sentReport']);
    Route::get('/delReport/report/{id}', ['uses'=>'DailyReportController@delReport']);
    Route::get('/Draft', 'DailyReportController@draft');



    // test 
    Route::get('/test', function() {return view('DailyReport/testpage');});
    Route::get('/test2', ['uses'=>'DailyReportController@testindex']);
    
    Route::post('/createtest', ['uses'=>'DailyReportController@storetest']);
    Route::get('/files/{id}', ['uses'=>'DailyReportController@testshow']);
    Route::get('/files/download/1603336088.stock.pdf', ['uses'=>'DailyReportController@testdownload']);
    Route::post('file-upload', 'DailyReportController@fileUploadPost')->name('file.upload.post');
   

    
    // end test



});

//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
        
    });
});


Route::get('/DailyReport', ['uses'=>'DailyReportController@index']);

Route::put('/report/{id}', ['uses'=>'DailyReportController@update']);
Route::put('/DarftUpdate/{id}', ['uses'=>'DailyReportController@DarftUpdate']);

