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
Route::get('product/stock/change/{id}', 'Product\ProductController@changeStock')->name('product.stock.change');
Route::resource('product', 'Product\ProductController');

// Product
Route::get('order/list', 'Order\OrderController@list')->name('order.list');
Route::get('order/status/change/{id}', 'Order\OrderController@changeStatus')->name('order.status.change');
Route::resource('order', 'Order\OrderController');

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

// Contact
Route::get('contact/list', 'Contact\ContactController@list')->name('contact.list');
Route::resource('contact', 'Contact\ContactController');

// customer
Route::get('customer/list', 'Customer\CustomerController@list')->name('customer.list');
Route::resource('customer', 'Customer\CustomerController');

// Staff
Route::get('staff/list', 'Staff\StaffController@list')->name('staff.list');
Route::resource('staff', 'Staff\StaffController');

// cmspages
Route::get('cms-page/list', 'CmsPage\CmsPageController@list')->name('cms-page.list');
Route::resource('cms-page', 'CmsPage\CmsPageController');

// cities
Route::get('city/list', 'City\CityController@list')->name('city.list');
Route::resource('city', 'City\CityController');


//default Profile
Route::get('default-city/{id}', 'DefaultCity\DefaultCityController@change')->name('default.city');

// banner
Route::get('banner/list', 'Banner\BannerController@list')->name('banner.list');
Route::get('banner/status/change/{id}', 'Banner\BannerController@changeStatus')->name('banner.status.change');
Route::resource('banner', 'Banner\BannerController');
