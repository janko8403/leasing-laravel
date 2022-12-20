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

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return ["Cache is cleared", "Config is cleared"];
});

// Route::get('/', function () {
//     return redirect('/register-step-one');
// });

Route::get('/', function () {
    return redirect('/start');
});

Auth::routes();
  

// Admin cms page
Route::group(['prefix'=>'admin', 'middleware' => 'roles', 'roles' => ['Admin']], function() {
	Route::get('/dashboard', 'Admin\AdminController@dashboard');
	Route::get('/users', 'Admin\AdminController@users');
	Route::get('/unactiveusers', 'Admin\AdminController@unactiveusers');
    Route::get('/add-user', 'Admin\AdminController@add_user');
    Route::post('/create-user', 'Admin\AdminController@create_user');
    Route::get('/activate-user/{id}', 'Admin\AdminController@activate_user');
	Route::delete('/delete-user/{id}', 'Admin\AdminController@delete_user');
	Route::get('/delete-all', 'Admin\AdminController@delete_all_chat');

	Route::get('/import-user', 'Admin\AdminController@import_user_view');
	Route::post('/import', 'Admin\AdminController@import_user');
});

Route::get('start', 'User\UserController@view_user');
Route::post('register-form', 'User\UserController@register_user');

Route::get('thx', 'User\UserController@thx');