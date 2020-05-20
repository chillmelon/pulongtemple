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
//     return view('welcome');
// });
//Management
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/dashboard', 'MembersController@index')->name('home')->middleware('verified');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//Projects
Route::get('/', 'ProjectsController@index')->name('projects');
Route::resource('projects', 'ProjectsController');
Route::get('projects/{id}', 'ProjectsController@show');
Route::get('projects/{id}/updates', 'ProjectsController@showUpdates');
Route::get('projects/{id}/comments', 'ProjectsController@showComments');
Route::get('projects/{id}/faq', 'ProjectsController@faq');

//Donate and Pay
Route::get('donate/{id}', 'DonatesController@create')->middleware('verified');
Route::post('donate/{id}', 'DonatesController@new')->name('donates.new');
Route::get('/ecpay', function (){
	return view('donates.ecpay');
})->name('ecpay');
//Updates
Route::get('updates/{id}', 'UpdateController@show');
//Members
Route::get('/mydonations', 'MembersController@myDonates')->middleware('verified');
Route::get('/myprojects', 'MembersController@myProjects')->middleware('verified');
Route::get('/myprofile', 'MembersController@myProfile')->middleware('verified');
Route::get('/myprofile/edit', 'MembersController@edit')->middleware('verified');
//Other
Route::view('/thankyou','thankyou');
Route::post('/callback', 'DonatesController@callback');
Route::get('lkk', function(){
    return view('projects.project');
});