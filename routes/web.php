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

Auth::routes([
 'register' => false, // Registration Routes...
 // 'verify' => false, // Email Verification Routes...
 // 'reset' => false, // Password Reset Routes...
]);


Route::get('/', 'HomeController@index')->name('home');

Route::get('/user', 'UsersController@index')->name('user.index');
//
Route::get('user/{user}', 'UsersController@getRoles');
//
Route::post('/user', 'UsersController@edit')->name('user.edit');



Route::get('/ver/{$depa}', 'AcomController@ver')->name('ver.ver');






Route::group([ 'middleware' => ['auth'], 'as' => 'admin.' ], function(){
  // Route::get('role', 'RoleController@index')->name('role.index');
  Route::resource('/role', 'RoleController')->except('');
  Route::resource('/period', 'PeriodController')->except('');
  Route::resource('/personal', 'PersonalController')->except('');
  Route::resource('/career', 'CareerController')->except('');
  Route::resource('/profession', 'ProfessionController')->except('');
  Route::resource('/departament', 'DepartamentController')->except('');
  Route::get('/asignation', 'DepartamentController@asignation')->name('departament.asignation');
  Route::post('/asignation', 'DepartamentController@relacion')->name('departament.relacion');
  Route::post('/desasignation', 'DepartamentController@desasignation')->name('departament.desasignation');

  Route::resource('/student', 'StudentController')->except('');
  Route::resource('/acom', 'AcomController')->except('');
  Route::post('/agregar', 'ActivityController@create')->name('activity.agregar');
  Route::resource('/activity', 'ActivityController')->except('');
  Route::resource('/group', 'GroupController')->except('');

});