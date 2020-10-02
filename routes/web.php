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

Auth::routes();
 

Route::get('/', 'HomeController@index');

Route::get('new_ticket', 'TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');
Route::get('tickets/{ticket_id}', 'TicketsController@show');
Route::get('my_tickets', 'TicketsController@userTickets');




Route::post('comment', 'CommentsController@postComment');
Route::post('user', "SubmitformController@user");
Route::post('category', "SubmitformController@category");
Route::post('description', "SubmitformController@description");
Route::post('department', "SubmitformController@department");
Route::post('sendticket', "TicketController@sendticket");
//Route::post('assignticket', "TicketController@assignticket");	

Route::view('/index', "index");
Route::view('/hh', "hh");
Route::view('/data', "data");
//Route::view('/unassigned', "unassigned");

Route::view('/createusers', "createusers");
Route::view('/editors', "editors");
Route::view('/IssueCategory', "IssueCategory");
Route::view('/IssueDescription', "IssueDescription");
Route::view('/department', "department");


Route::view('/ticket', "ticket");
Route::view('/logins', "login");

Route::get('/IssueDescription', "SubmitformController@index");

Route::post('/assignticket/{id}', "TicketController@assignticket");


Route::get('/createusers', "SubmitformController@usershow");

Route::get('/orderId/{orderId}', 'OrderController@ship');
Route::get('/json-heritagecompaintdetails', 'TicketController@heritagecompaintdetails');



Route::get('/json-regencies','TicketController@regencies');






Route::get('/ticket','TicketController@provinces');

Route::get('/viewtickets', "SubmitformController@ticketshow");

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

