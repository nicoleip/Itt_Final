<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Blade::setContentTags('<%', '%>');        // for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>');



Route::group(['prefix' => 'api/v1'], function(){
    Route::resource('items', 'ItemsController');
});

Route::get('/', function () {
    return view('index');
});

Route::auth();

Route::resource('items', 'ItemsController');

