<?php
// Home
Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::get('category/list', 'Category\CategoryController@list')->name('category.list');
Route::resource('category', 'Category\CategoryController');
