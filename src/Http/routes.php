<?php
Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@store')->name('yang.store');
?>