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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cate/{id}', 'CateController@Cate');

Route::get('insert','CateController@getinsert');
Route::post('insert','CateController@insert');
Route::get('viewcource','CateController@viewcource');
Route::get('viewtrainees','CateController@viewtrainees');
Route::get('trainerinformation/{id}','CateController@trainerinformation');
Route::get('trainerdetail/{id}','CateController@trainerdetail');

// check Auth::user()->id với id đường dẫn edit profile trainer nếu trùng mới cho edit

Route::get('addcource','CateController@getAddCource');
Route::post('addcource','CateController@postAddCource');
Route::get('addtrainer','CateController@getAddTrainer');
Route::post('addtrainer','CateController@postAddTrainer');
Route::get('addtrainee','CateController@getAddTrainee');
Route::post('addtrainee','CateController@postAddTrainee');
Route::get('addtrainee','CateController@getAddTrainee');
Route::post('addtrainee','CateController@postAddTrainee');
Route::get('addtopic','CateController@getaddtopic');
Route::post('addtopic','CateController@postaddtopic');


Route::get('assigntutor','CateController@getassigntutor');
Route::post('assigntutor','CateController@postassigntutor');
Route::get('assigntrainee','CateController@getassigntrainee');
Route::post('assigntrainee','CateController@postassigntrainee');

Route::post('search','CateController@Search');