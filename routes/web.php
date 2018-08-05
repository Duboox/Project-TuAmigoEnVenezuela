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

	// Clients
	Route::get('clients/pdf', 'Dashboard\ClientController@ClientControllerPDFview')->name('client.pdf');
	Route::get('all/clients/pdf', 'Dashboard\ClientController@AllClientControllerPDF')->name('all.client.pdf');
	
	Route::post('clients/pdf/report', 'Dashboard\ClientController@userPDFreport')->name('client.pdf.report');
	Route::resource('clients', 'Dashboard\ClientController');

	// Agents
	Route::get('agents/pdf', 'Dashboard\AgentController@agentPDFview')->name('agent.pdf');
	Route::get('all/agents/pdf', 'Dashboard\AgentController@AllagentPDF')->name('all.agent.pdf');
	
	Route::post('agents/pdf/report', 'Dashboard\AgentController@agentPDFreport')->name('agent.pdf.report');
	Route::resource('agents', 'Dashboard\AgentController');

	// Invoices
	Route::get('invoices/pdf', 'Dashboard\InvoiceController@invoicePDFview')->name('invoice.pdf');
	Route::get('all/invoices/pdf', 'Dashboard\InvoiceController@AllinvoicePDF')->name('all.invoice.pdf');
	
	Route::post('invoices/pdf/report', 'Dashboard\InvoiceController@invoicePDFreport')->name('invoice.pdf.report');
	Route::resource('invoices', 'Dashboard\InvoiceController');

	// Assigns
    Route::get('roles/assigns', 'Dashboard\RoleController@assigns')->name('assigns.index');
	
	// Roles
	Route::resource('roles', 'Dashboard\RoleController');
	
});