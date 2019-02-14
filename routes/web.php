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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function(){

    $date = new \App\Dates();

    $start = '2019-02-04';
    $end = '2019-02-08';
    echo $date->getWeekDays($start, $end);
});