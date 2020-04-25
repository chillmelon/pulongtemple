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

// Route::get('/', function () {
//     return view('/welcome');
// });

Route::get('/', 'ProjectsController@index')->name('projects');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::resource('projects', 'ProjectsController');
Route::view('/thankyou','thankyou');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('donate/{id}', 'DonatesController@create');
Route::post('donate/{id}', 'DonatesController@store')->name('donates.store');
Route::post('/pay', 'PaymentsController@test');
Route::get('/pay', 'PaymentsController@index');
