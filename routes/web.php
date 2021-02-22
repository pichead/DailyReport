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
    Route::get('/Tag', ['uses'=>'DailyReportController@showtag']);
    Route::get('/sentReport/report/{id}', ['uses'=>'DailyReportController@sentReport']);
    Route::get('/resentReport/{id}', ['uses'=>'DailyReportController@resent']);
    Route::get('/resentReport', ['uses'=>'DailyReportController@resentReport']);
    Route::get('/view/report/{id}', ['uses'=>'DailyReportController@reportview']);
    Route::put('/reportupdate/{id}', ['uses'=>'DailyReportController@update']);


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
Route::post('/report/find', ['uses'=>'DailyReportController@indexfind']);
Route::get('/rejectReport', ['uses'=>'DailyReportController@rejectReport']);
Route::get('/userreport', ['uses'=>'DailyReportController@userreport']);

Route::put('/report/{id}', ['uses'=>'DailyReportController@update']);
Route::put('/DarftUpdate/{id}', ['uses'=>'DailyReportController@DarftUpdate']);





// work
Route::get('/work', ['uses'=>'WorkController@index']);
Route::get('/work/create', ['uses'=>'WorkController@create']);
Route::post('/creatework', ['uses'=>'WorkController@store']);
Route::post('work/reporing/update', ['uses'=>'WorkController@storereporting']);
Route::put('/workupdate/{id}', ['uses'=>'WorkController@update']);
Route::get('/work/view/{id}', ['uses'=>'WorkController@show']);
Route::get('/work/edit/{id}', ['uses'=>'WorkController@edit']);
Route::get('/work/view/report/{id}', ['uses'=>'WorkController@reportview']);
// end work