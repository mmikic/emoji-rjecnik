<?php

Route::get('/', 'AppController@index');
Route::get('restart', 'AppController@restart');

Route::post('save', 'AppController@save');