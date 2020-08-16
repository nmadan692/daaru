<?php
// Home
Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::get('category/list', 'Category\CategoryController@list')->name('category.list');
Route::get('category/status/change/{id}', 'Category\CategoryController@changeStatus')->name('category.status.change');
Route::resource('category', 'Category\CategoryController');

// Sub Category
Route::get('subcategory/list', 'SubCategory\SubCategoryController@list')->name('subcategory.list');
Route::get('subcategory/status/change/{id}', 'SubCategory\SubCategoryController@changeStatus')->name('subcategory.status.change');
Route::resource('subcategory', 'SubCategory\SubCategoryController');

// Brand
Route::get('brand/list', 'Brand\BrandController@list')->name('brand.list');
Route::get('brand/status/change/{id}', 'Brand\BrandController@changeStatus')->name('brand.status.change');
Route::resource('brand', 'Brand\BrandController');

// Product
Route::get('product/list', 'Product\ProductController@list')->name('product.list');
Route::get('product/status/change/{id}', 'Product\ProductController@changeStatus')->name('product.status.change');
Route::resource('product', 'Product\ProductController');

//BlogCategory
Route::name('blog.')->prefix('blog/')->group(function () {
    Route::get('category/list', 'Blog\BlogCategoryController@list')->name('type.list');
    Route::get('category/status/change/{id}', 'Blog\BlogCategoryController@changeStatus')->name('blog.status.change');
    Route::resource('category', 'Blog\BlogCategoryController');
});

// Blog
Route::get('blog/list', 'Blog\BlogController@list')->name('blog.list');
Route::get('blog/status/change/{id}', 'Blog\BlogController@changeStatus')->name('blog.status.change');
Route::resource('blog', 'Blog\BlogController');

// Settings
Route::get('setting/list', 'Setting\SettingController@list')->name('setting.list');
Route::resource('setting', 'Setting\SettingController');
