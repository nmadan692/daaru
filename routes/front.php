
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

Route::get('/my-cart', 'CartController@index')->name('my-cart');
Route::get('/product/shop/{id}/add', 'CartController@shop')->name('product.shop.add');
Route::post('/product/shop/{id}/add', 'CartController@shop')->name('product.shop.add');
Route::delete('/cart/{id}', 'CartController@deleteCart')->name('my-cart.delete');




// shoping-cart
Route::get('/shoping-cart', 'ShopingCartController@index')->name('shoping.cart');




