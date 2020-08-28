
<?php
// Homepage
Route::get('/', 'HomeController@index')->name('home');

// Blog
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.details');


// contact
Route::resource('/contact', 'ContactController');


// checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout');

// Products
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product-detail/{id}', 'ProductController@show')->name('product.show');


// shoping-cart
Route::get('/shoping-cart', 'ShopingCartController@index')->name('shoping.cart');


