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

    $start = new DateTime( '2019-02-01' );
    $end = new DateTime( '2019-02-10' );

    $interval = new DateInterval('P1D');
    $end = $end->modify( '+1 day' ); // Seems to be needed
    $range = new DatePeriod($start, $interval ,$end);

    foreach($range as $d){
        echo $d->format('N'). "<br>";
        echo $d->format("Y-m-d") . "<br>";
    }
});