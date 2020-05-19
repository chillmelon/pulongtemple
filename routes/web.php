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

//Management
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//Projects
Route::get('/', 'ProjectsController@index')->name('projects');
Route::resource('projects', 'ProjectsController');
//Donate and Pay
Route::get('donate/{id}', 'DonatesController@create');
Route::post('donate/{id}', 'DonatesController@new')->name('donates.new');
Route::get('/ecpay', function (){
	return view('donates.ecpay');
})->name('ecpay');
//Members
Route::get('/mydonates', 'MembersController@myDonates')->middleware('verified');
Route::get('/myprojects', 'MembersController@myProjects')->middleware('verified');
//Other
Route::view('/thankyou','thankyou');
Route::post('/callback', 'DonatesController@callback');
