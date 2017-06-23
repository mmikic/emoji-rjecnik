<?php

Route::get('/', 'AppController@index');
Route::get('restart', 'AppController@restart');
Route::get('all', 'AppController@dumpDB');


Route::post('save', 'AppController@save');