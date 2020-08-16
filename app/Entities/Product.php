<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'brand_id', 'volume', 'country', 'alcohol', 'description', 'price', 'discount', 'is_percent', 'quantity', 'image', 'status'];
    public $appends =  ['original_price', 'discount_price'];
    /**
     * @return BelongsTo
     */
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function getDiscountPriceAttribute() {
        if($this->is_percent) {
            if($this->discount) {
                return ('NRs '. ($this->price - ($this->discount*$this->price*0.01)));
            }
        }
        else {
            if($this->discount) {
                return 'NRs '. ($this->price - $this->discount);
            }
        }
        return $this->price;
    }

    public function getOriginalPriceAttribute() {
        return 'NRs '. $this->price;
    }

}
