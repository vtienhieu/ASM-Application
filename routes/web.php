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
Route::get('viewtrainer','CateController@viewtrainer');
Route::get('managecategories','CateController@managecategories');
Route::get('trainerinformation/{id}','CateController@trainerinformation');
Route::get('trainerdetail/{id}','CateController@trainerdetail');

// check Auth::user()->id với id đường dẫn edit profile trainer nếu trùng mới cho edit

Route::get('addcource','CateController@getAddCource');
Route::post('addcource','CateController@postAddCource');
Route::get('addtrainer','CateController@getAddTrainer');
Route::post('addtrainer','CateController@postAddTrainer');
Route::get('addtrainee','CateController@getAddTrainee');
Route::post('addtrainee','CateController@postAddTrainee');
Route::get('addtopic','CateController@getaddtopic');
Route::post('addtopic','CateController@postaddtopic');


Route::get('assigntutor','CateController@getassigntutor');
Route::post('assigntutor','CateController@postassigntutor');
Route::get('assigntrainee','CateController@getassigntrainee');
Route::post('assigntrainee','CateController@postassigntrainee');
Route::get('addtopictocourse','CateController@getaddtopictocourse');
Route::post('addtopictocourse','CateController@postaddtopictocourse');


Route::get('updatetrainee/{id}','CateController@getupdatetrainee');
Route::post('updatetrainee/{id}','CateController@postupdatetrainee');
Route::get('updatetrainer/{id}','CateController@getupdatetrainer');
Route::post('updatetrainer/{id}','CateController@postupdatetrainer');
Route::get('updatecate/{id}','CateController@getupdatecate');
Route::post('updatecate/{id}','CateController@postupdatecate');
Route::get('updatecourse/{id}','CateController@getupdatecourse');
Route::post('updatecourse/{id}','CateController@postupdatecourse');


Route::get('deletetrainee/{id}','CateController@getdeletetrainee');
Route::get('deletetrainee/{id}','CateController@getdeletetrainer');
Route::get('deletecate/{id}','CateController@getdeletecate');
Route::get('deletecourse/{id}','CateController@getdeletecourse');





Route::post('search','CateController@Search');
