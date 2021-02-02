<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-type, x-authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

//CITIES
Route::get('cities','CityController@index');
Route::get('citiesByDepartment','CityController@showByDepartment');
//DEPARTMENTS
Route::get('departments','DepartmentController@index');
//IDTYPES
Route::get('idTypes','IDTypeController@index');
//CLIENTS
Route::get('clients','ClientController@index');
Route::get('client','ClientController@showById');
Route::post('client','ClientController@store');
Route::post('updateClient','ClientController@update');
Route::post('deleteClient','ClientController@deleteById');
