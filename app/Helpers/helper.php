<?php

use Illuminate\Support\Facades\Storage;

/**
 * @param null $guard
 * @return mixed
 */
function me($guard = null)
{
    return Auth::guard($guard)->user();
}

/**
 * @param null $guard
 * @return bool
 */
function authenticated($guard = null) {
    return \Illuminate\Support\Facades\Auth::guard($guard)->check();
}

/**
 * @param null $attributes
 * @return mixed
 */
function adminUser($attributes = null) {
    if($attributes) {
        return me('admin')->{$attributes};
    }
    else {
        return me('admin');
    }
}

function frontUser($attributes = null) {
    if($attributes) {
        return me('customer')->{$attributes};
    }
    else {
        return me('customer');
    }
}

function getImageUrl($image = null) {
    if($image) {
        return Storage::url($image);
    }
    else {
        return asset('front/img/liquor/liquor.png');
    }
}

function getCartTotal() {
    return 'Nrs 0';
}

/**
 * @param null $attribute
 * @return mixed
 */
function defaultCity($attribute = null) {
    return app(\App\Services\General\DefaultCity\DefaultCityService::class)->get($attribute);
}

/**
 * @param $id
 * @return bool
 */
function isInCart($id) {
    $carts = getSessionDataByKey('cart-'.defaultCity('id'));
    if(isset($carts[$id])) {
        return true;
    }
    return false;
}

/**
 * @param $id
 * @return bool
 */
function isInWishList($id) {
    $lists = getSessionDataByKey('list-'.defaultCity('id'));
    if(isset($lists[$id])) {
        return true;
    }
    return false;
}

function getSessionDataByKey($key) {
    return session()->get($key);
}

function cartData($attribute = null) {

}

function wishListData($attribute = null) {

}

function getOrderConstants() {
    return [
        ['id' => \App\Daaruu\Constants\OrderConstant::ORDERED_ID, 'name' => \App\Daaruu\Constants\OrderConstant::ORDERED],
        ['id' => \App\Daaruu\Constants\OrderConstant::SUCCEED_ID, 'name' => \App\Daaruu\Constants\OrderConstant::SUCCEED],
        ['id' => \App\Daaruu\Constants\OrderConstant::CANCELED_ID, 'name' => \App\Daaruu\Constants\OrderConstant::CANCELED],
    ];
}

function getPaymentConstants() {
    return [
        ['id' => \App\Daaruu\Constants\PaymentConstant::PENDING_ID, 'name' => \App\Daaruu\Constants\PaymentConstant::PENDING],
        ['id' => \App\Daaruu\Constants\PaymentConstant::COMPLETED_ID, 'name' => \App\Daaruu\Constants\PaymentConstant::COMPLETED],
    ];
}
