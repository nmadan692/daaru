
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
Route::post('/checkout', 'CheckoutController@store')->name('checkout');


// Products
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product-detail/{id}', 'ProductController@show')->name('product.show');


//Cart
Route::get('/my-cart', 'CartController@cart')->name('my-cart');
Route::get('/product/shop/{id}/add', 'CartController@shop')->name('product.shop.add');
Route::post('/product/shop/{id}/add', 'CartController@shop')->name('product.shop.add');

Route::post('/cart/update', 'CartController@updateCart')->name('my-cart.updateCart');
Route::delete('/cart/{id}', 'CartController@deleteCart')->name('my-cart.delete');

//WishList
Route::get('/my-wish-list', 'CartController@wishList')->name('my-wish-list');



// shoping-cart
//Route::get('/shoping-cart', 'ShopingCartController@index')->name('shoping.cart');




