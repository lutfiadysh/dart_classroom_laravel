<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/class', 'HomeController@index')->name('class.home');
	Route::get('/class/{id}','ClassController@show')->name('class');
	Route::get('/class/{id}/{id2}','ClassController@edit')->name('class.member');
	Route::get('home', 'ClassController@index')->name('home.index');
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');
	Route::get('addnewclass','ClassController@create')->name('addclass');
	Route::post('createclass','ClassController@store')->name('createclass');
	Route::get('contributor/{id}','MemberController@edit')->name('member.index');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

