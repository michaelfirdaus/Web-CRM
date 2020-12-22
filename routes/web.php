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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/professions',[
        'uses'  => 'ProfessionController@index',
        'as'    => 'professions'
    ]);

    Route::get('/profession/create',[
        'uses'  => 'ProfessionController@create',
        'as'    => 'profession.create'
    ]);

    Route::post('/profession/update/{id}',[
        'uses'  => 'ProfessionController@update',
        'as'    => 'profession.update'
    ]);

    Route::get('/profession/edit/{id}',[
        'uses' => 'ProfessionController@edit',
        'as'   => 'profession.edit'
    ]);

    Route::post('/profession/store',[
        'uses'  => 'ProfessionController@store',
        'as'    => 'profession.store'
    ]);

    Route::get('/profession/delete/{id}',[
        'uses' => 'ProfessionController@destroy',
        'as'   => 'profession.delete'
    ]);

    Route::get('/coaches',[
        'uses'  => 'CoachController@index',
        'as'    => 'coaches'
    ]);

    Route::get('/coach/create',[
        'uses'  => 'CoachController@create',
        'as'    => 'coach.create'
    ]);

    Route::post('/coach/update/{id}',[
        'uses'  => 'CoachController@update',
        'as'    => 'coach.update'
    ]);

    Route::get('/coach/edit/{id}',[
        'uses' => 'CoachController@edit',
        'as'   => 'coach.edit'
    ]);

    Route::post('/coach/store',[
        'uses'  => 'CoachController@store',
        'as'    => 'coach.store'
    ]);

    Route::get('/coach/delete/{id}',[
        'uses' => 'CoachController@destroy',
        'as'   => 'coach.delete'
    ]);

});