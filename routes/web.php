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


Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('/verify', 'HomeController@verify')->name('verify');

Route::post('/results', 'HomeController@results')->name('results');
Route::get('/results', 'HomeController@getresults')->name('results');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('categories','CategoryController',['names'=>[
    'create'=>'categories.add',
    'index'=>'categories.view',
    'edit'=>'categories.edit',
    'destroy'=>'categories.destroy',
    'store'=>'categories.store',
    'update'=>'categories.update'
]]);

Route::resource('candidate','CandidateController',['names'=>[
    'create'=>'candidate.add',
    'index'=>'candidate.view',
    'edit'=>'candidate.edit',
    'destroy'=>'candidate.destroy',
    'update'=>'candidate.update'
]]);
