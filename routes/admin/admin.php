<?php
// Home
Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::get('category/list', 'Category\CategoryController@list')->name('category.list');
Route::resource('category', 'Category\CategoryController');

// Brand
Route::get('brand/list', 'Brand\BrandController@list')->name('brand.list');
Route::resource('brand', 'Brand\BrandController');

// Product
Route::get('product/list', 'Product\ProductController@list')->name('product.list');
Route::resource('product', 'Product\ProductController');

//BlogCategory
Route::name('blog.')->prefix('blog/')->group(function () {
    Route::get('category/list', 'Blog\BlogCategoryController@list')->name('type.list');
    Route::resource('category', 'Blog\BlogCategoryController');
});
