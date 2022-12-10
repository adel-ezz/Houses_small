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
  return redirect('Admins');
});
app()->singleton('perfixDirection', function () {
    if (app()->getLocale() == 'ar') {
        return '.rtl';
    } else {
        return '';
    }
});


////// direction Function /////////////////////
app()->singleton('direction', function () {
    if (app('l') == 'ar') {
        return '-rtl';
    }
});


////// direction Function /////////////////////
///

app()->singleton('admin', function () {
    return 'Admins';
});
app()->singleton('language', function () {
    return ['ar' => '008-saudi-arabia.svg', 'en' => '226-united-states.svg'];
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
