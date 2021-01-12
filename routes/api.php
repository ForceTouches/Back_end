<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('SendPhoneCode', 'ApiController@SendPhoneCode');
Route::post('RegisterUser', 'ApiController@RegisterUser');
Route::post('LoginUser', 'ApiController@LoginUser');
Route::post('ForgetPassword', 'ApiController@ForgetPassword');
Route::post('ContactUs', 'ApiController@ContactUs');
Route::get('/GetAds', 'ApiController@GetAds');
Route::get('GetfirstCompetitions', 'ApiController@GetfirstCompetitions');
Route::get('GetCompetition', 'ApiController@GetCompetition');
Route::get('GetSpecialCompetitions', 'ApiController@GetSpecialCompetitions');
Route::post('GetOneCompetition', 'ApiController@GetOneCompetition');
Route::get('GetNewerCompetitions', 'ApiController@GetNewerCompetitions');
Route::get('GetCloserTimeCompetitions', 'ApiController@GetCloserTimeCompetitions');
Route::post('GetCloserAddressCompetitions', 'ApiController@GetCloserAddressCompetitions');
Route::get('Rules', 'ApiController@Rules');
Route::get('AppConfig', 'ApiController@AppConfig');

Route::group(['middleware' => 'auth:api'],function(){
      
      Route::post('UpdateUser', 'ApiController@UpdateUser');
      Route::get('logoutUser', 'ApiController@logoutUser');
      Route::post('UpdatePassword', 'ApiController@UpdatePassword');
      Route::post('UpdatePhone', 'ApiController@UpdatePhone');
      Route::post('AddCompetition', 'ApiController@AddCompetition');
      Route::post('DeleteCompetition', 'ApiController@DeleteCompetition');
      Route::get('GetUserCompetitions', 'ApiController@GetUserCompetitions');
      Route::get('User', 'ApiController@User');
      Route::post('CompetitionProblem', 'ApiController@CompetitionProblem');
      Route::get('/CatGift', 'ApiController@CatGift');
      Route::post('UpdateCompetition', 'ApiController@UpdateCompetition');
      Route::get('GetAboutApp', 'ApiController@GetAboutApp');
     

  });
 