<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\HouseController;
use \App\Http\Controllers\Admins\SeasonController;
use \App\Http\Controllers\Admins\ProbertyController;
use App\Http\Controllers\Admins\Dashboard;

app()->singleton('admin', function () {
    return 'Admins';
});
app()->singleton('language', function () {
    return ['en' => '226-united-states.svg'];
});
//, 'namespace' => app('admin')

Route::group(['prefix' => app('admin')], function () {

    Route::get('/login', [Dashboard::class,'login']);


    //============Auth===========///
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/', [Dashboard::class,'index']);

        Route::resource('/houses',HouseController::class);
        Route::post('/houses/multi_delete', [HouseController::class,'multi_delete']);

        Route::resource('/seasons',SeasonController::class);
        Route::post('/seasons/multi_delete', [SeasonController::class,'multi_delete']);


        Route::resource('/properties',ProbertyController::class);
        Route::post('/seasons/multi_delete', [ProbertyController::class,'multi_delete']);

    });


});


