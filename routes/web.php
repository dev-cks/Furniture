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

define('SESS_UID',                  'SESS_CMS_ADMIN_UID');
define('SESS_USERNAME',             'SESS_CMS_ADMIN_USERNAME');




Auth::routes();


Route::post('/save', 'HomeController@save');
Route::get('/load', 'HomeController@load');
Route::get('/login', 'HomeController@login');
Route::get('/sign-in', 'HomeController@signIn');
Route::get('/', 'HomeController@welcome');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index');
    Route::get('/preview', 'HomeController@preview');
    Route::get('/price', 'HomeController@price');
    Route::get('/publish', 'HomeController@publish');
    Route::post('ajax/price/save', 'HomeController@savePrice');
    Route::post('ajax/price/restore', 'HomeController@restorePrice');
    Route::get('ajax/material/get-info', 'HomeController@getMaterialInfo');
    Route::post('ajax/material/add', 'HomeController@addMaterial');
    Route::post('ajax/material/edit', 'HomeController@editMaterial');
    Route::get('ajax/material/default', 'HomeController@specialMaterial');
    Route::post('ajax/material/remove', 'HomeController@removeMaterial');
    Route::post('ajax/material/restore', 'HomeController@restoreMaterial');
    Route::get('/material', 'HomeController@material');
    Route::get('/material-property', 'HomeController@getMaterial');

    Route::get('/shipping', 'HomeController@shipping');
    Route::post('ajax/shipping/restore', 'HomeController@shippingRestore');
    Route::post('ajax/shipping/save', 'HomeController@shippingSave');
    Route::get('/ship-property', 'HomeController@getShipping');


});
