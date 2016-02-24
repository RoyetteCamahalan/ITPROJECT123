<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

//$router->resource('doctors','DoctorsController');
$router->resource('specializations','SpecializationsController');
Route::get('doctors', ['as' => 'doctors', 'uses' => 'DoctorsController@index']);
Route::get('doctors/{doc_id}', 'DoctorsController@show');
Route::post('doctors/store', 'DoctorsController@store');
Route::post('doctors/update', 'DoctorsController@update');


Route::get('institutions',['as' => 'institutions', 'uses' => 'InstitutionsController@index']);
Route::post('institutions/store', 'InstitutionsController@store');
Route::post('institutions/storemap', 'InstitutionsController@storemap');
Route::get('institutions/getdoctors/{id}', 'DoctorsController@getdoctors');

Route::get('employees', ['as' => 'Employee', 'uses' => 'EmployeesController@index']);
Route::post('employees/store', 'EmployeesController@store');

Route::get('products', ['as' => 'Product', 'uses' => 'ProductsController@index']);
Route::post('products/store', 'ProductsController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',	
]);
