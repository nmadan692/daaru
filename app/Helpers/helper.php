<?php

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
