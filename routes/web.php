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
Route::get('/person',function(){
    return view('person');
})->name('add-person');
Route::get('/person-list',function(){
    return view('person-list');
})->name('list-person');
Route::post('/person-save',[
    'uses'=>'PersonsController@savePerson',
    'as'=>'savePerson'
]);
