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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['api', 'cors'] ,'prefix' =>'company'], function () {
Route::get('' , 'API\CompanyController@index');
Route::post('', 'API\CompanyController@store');
Route::get('/{id}' ,'API\CompanyController@show');
Route::post('/update/{id}' , 'API\CompanyController@update');
Route::delete('/{id}' ,'API\CompanyController@destroy');
});

Route::group(['middleware' => ['api', 'cors'] ,'prefix' =>'employee'], function () {
Route::get('' , 'API\EmployeeController@index');
Route::post('', 'API\EmployeeController@store');
Route::get('/{id}' ,'API\EmployeeController@show');
Route::post('/update/{id}' , 'API\EmployeeController@update');
Route::delete('/{id}' ,'API\EmployeeController@destroy');
});
