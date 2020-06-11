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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//Projects
Route::get('/', 'ProjectsController@index')->name('projects');
Route::get('projects/{id}', 'ProjectsController@show');
Route::get('projects/{id}/updates', 'ProjectsController@showUpdates');
Route::get('projects/{id}/comments', 'ProjectsController@showComments');
Route::get('projects/{id}/faq', 'ProjectsController@showFaqs');

//Donate and Pay
Route::get('donate/{id}', 'DonatesController@create');
Route::post('donate/{id}', 'DonatesController@new')->name('donates.new');
Route::get('/ecpay', function (){
	return view('donates.ecpay');
})->name('ecpay');
Route::view('/thankyou','donates.thankyou');
//Updates
Route::get('updates/{id}', 'UpdateController@show');
//Members
Route::get('member/donations', 'MembersController@Donates')->middleware('verified');
Route::get('member/projects', 'MembersController@Projects')->middleware('verified');
Route::post('/dashboard', 'MembersController@Update')->middleware('verified');
Route::get('/dashboard', 'MembersController@index')->name('dashboard')->middleware('verified');
//Other
Route::post('/callback', 'DonatesController@callback');
Route::get('form', function(){
    return view('auth.form');
});

//Footer
Route::view('/terms','footer.terms');
Route::view('/policy','footer.policy');
Route::view('/about','footer.about');