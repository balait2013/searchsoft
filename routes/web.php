<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/CompanyDetails', 'HomeController@CompanyDetails');
Route::post('/CompanyDetails', 'HomeController@UpdateCompany');
Route::get('/PersonalDetails', 'HomeController@PersonalDetails');
Route::post('/PersonalDetails', 'HomeController@UpdatePersonal');
/*-----Master-----*/
//Route::get('/dashboard', 'MasterController@dashboard');
Route::get('/suppliers', 'MasterController@supplier');
Route::get('/add-supplier', 'MasterController@add_supplier');
Route::post('/add-supplier', 'MasterController@post_add_supplier');
Route::get('/edit-supplier/{id}', 'MasterController@edit_supplier');
Route::post('/edit-supplier/{id}', 'MasterController@update_supplier');
Route::get('/view-supplier/{id}', 'MasterController@view_supplier');
Route::get('/delete-supplier/{id}', 'MasterController@delete_supplier');
/*-----Accounts-----*/
//Route::get('/dashboard', 'AccountController@dashboard');



/*-----Reports-----*/
//Route::get('/dashboard', 'ReportController@dashboard');
