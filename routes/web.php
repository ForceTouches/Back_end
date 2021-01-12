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
    // return view('welcome');
    // date_default_timezone_set('Asia/Riyadh');
    // var_dump(date('H:i'));die();
    return redirect('login');
});
Route::get('/apps', 'DetectController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/competitionProblem', 'HomeController@competitionProblem');
Route::get('/problem_details/{id}', 'HomeController@problem_details');
Route::get('/users', 'UserController@index');
Route::get('/delete_user/{id}', 'UserController@destroy');
Route::get('/user_status/{id}/{status}', 'UserController@user_status');
Route::post('/store_user', 'UserController@store');
Route::post('/update_user/{id}', 'UserController@update');
Route::get('/users_details/{id}', 'UserController@users_details');
Route::get('/prizes', 'CompetitionController@index');
Route::get('prizes/details/{id}', 'CompetitionController@details');
Route::get('/change_status/{id}/{status}', 'CompetitionController@change_status');
Route::get('/star/{id}/{status}', 'CompetitionController@star');
Route::get('/delete_comp/{id}', 'CompetitionController@destroy');
Route::get('/ads', 'AdsController@index');
Route::post('/ads_store', 'AdsController@store');
Route::delete('/ads_destroy/{id}', 'AdsController@destroy');
Route::post('/ads_edit/{id}', 'AdsController@update');
Route::get('/settings', 'UserController@setting');