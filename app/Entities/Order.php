<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'ordered_by'];

    /**
     * @return void
     */
    public function products() {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot(['quantity', 'amount']);
    }
}
