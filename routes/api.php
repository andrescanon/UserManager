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

JsonApi::register('default')->routes(function ($api) {
    $api->resource('users')->relationships(function ($relations) {
        $relations->hasOne('role');
        $relations->hasMany('addresses');
    });
    $api->resource('roles');
    $api->resource('addresses')->only('read', 'update', 'delete', 'create');
});

Route::name('api:resources:')->group(function () {

    Route::resource('api/resources/users', 'Api\\Resources\\UsersController')
        ->only('index', 'show', 'update', 'destroy');

});

Route::name('api:datatables:')->group(function () {

    Route::resource('api/datatables/users', 'Api\\Datatables\\UsersController')
        ->only('index');

    Route::get('api/datatables/users/{entity}/addresses', 'Api\\Datatables\\AddressesController@index')
        ->name('addresses.index');

});
