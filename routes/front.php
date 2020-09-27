
<?php
// Homepage
Route::get('/', 'HomeController@index')->name('home');

// Blog
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.details');


// contact
Route::resource('/contact', 'ContactController');


// checkout
Route::middleware('emptyCart')->group(function () {
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout');
});
Route::get('/checkout/invoice', 'CheckoutController@invoice')->name('invoice');



// Products
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product-detail/{id}', 'ProductController@show')->name('product.show');


//Cart
Route::get('/my-cart', 'CartController@cart')->name('my-cart')->middleware('emptyCart');
Route::get('/product/shop/{id}/add', 'CartController@shop')->name('product.shop.add');
Route::post('/product/shop/{id}/add', 'CartController@shop')->name('product.shop.add');

Route::post('/cart/update', 'CartController@updateCart')->name('my-cart.updateCart');
Route::delete('/cart/{id}', 'CartController@deleteCart')->name('my-cart.delete');

//WishList
Route::get('/my-wish-list', 'CartController@wishList')->name('my-wish-list')->middleware('emptyList');



// shoping-cart
//Route::get('/shoping-cart', 'ShopingCartController@index')->name('shoping.cart');


// terms-and-condition
Route::get('/terms-and-condition', 'TermsController@index')->name('terms');

// return policy
Route::get('/return-policy', 'ReturnController@index')->name('return');

// privacy policy
Route::get('/privacy-policy', 'PrivacyController@index')->name('privacy');

// My Order
Route::get('my-order', 'MyOrderController@index')->name('my-order');
Route::get('my-order/invoice/view/{id}', 'MyOrderController@viewInvoice')->name('my-order.invoice.view');
Route::get('my-order/invoice/download/{id}', 'MyOrderController@downloadInvoice')->name('my-order.invoice.download');

Route::get('my-order/invoice', 'MyOrderController@invoice')->name('invoice');
