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

Route::get('/', function(){
	return redirect()->route('login');
});

Auth::routes();

Route::prefix('dashboard')->middleware(['auth', 'disable.back'])->group(function() {
	
	// Dashboard
	Route::get('home', 'Dashboard\DashboardController@index')->name('home');
	Route::get('profile/{id}', 'Dashboard\DashboardController@profile')->name('profile.index');
	Route::get('profile/{id}/edit', 'Dashboard\DashboardController@edit')->name('profile.edit');
	Route::put('profile/{id}/update', 'Dashboard\DashboardController@update')->name('profile.update');

	// Users
	Route::get('users/pdf', 'Dashboard\UserController@userPDFview')->name('user.pdf');
	Route::get('all/users/pdf', 'Dashboard\UserController@AlluserPDF')->name('all.user.pdf');
	
	Route::post('users/pdf/report', 'Dashboard\UserController@userPDFreport')->name('user.pdf.report');
	Route::resource('users', 'Dashboard\UserController');

	// Assigns
    Route::get('roles/assigns', 'Dashboard\RoleController@assigns')->name('assigns.index');
	
	// Roles
	Route::resource('roles', 'Dashboard\RoleController');
	
});