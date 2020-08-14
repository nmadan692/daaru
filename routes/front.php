<?php
// Homepage
Route::get('/', 'HomeController@index')->name('home');

// Blog
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.details');


// contact
Route::get('/contact', 'ContactController@index')->name('contact');

// checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout');

// shop-details
Route::get('/shop-details', 'ShopDetailsController@index')->name('shop.details');

// shop-grid
Route::get('/shop-grid', 'ShopGridController@index')->name('shop.grid');

// shoping-cart
Route::get('/shoping-cart', 'ShopingCartController@index')->name('shoping.cart');
