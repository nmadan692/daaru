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

function getImageUrl($image = null) {
    if($image) {
        return Storage::url($image);
    }
    else {
        return asset('front/img/liquor/liquor.png');
    }
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
    $carts = getSessionDataByKey('cart');
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
    $lists = getSessionDataByKey('list');
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

