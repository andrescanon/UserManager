<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes (AdminServiceProvider)
|---------------------------------------------------------------------
|
*/

Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
//Route::get('users', 'UsersController@index')->name('users.index');
Route::resource('users', 'UsersController')->except('store');

