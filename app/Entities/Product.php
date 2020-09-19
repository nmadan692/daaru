<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'brand_id', 'volume', 'country', 'alcohol', 'description', 'price', 'discount', 'is_percent', 'is_featured', 'quantity', 'image', 'status', 'city_id'];
    public $appends =  ['original_price', 'discount_price', 'discount_amount'];
    /**
     * @return BelongsTo
     */
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return string
     */
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
        return 'NRs '.$this->price;
    }

    /**
     * @return float|mixed
     */
    public function getDiscountAmountAttribute() {
        if($this->is_percent) {
            if($this->discount) {
                return (($this->price - ($this->discount*$this->price*0.01)));
            }
        }
        else {
            if($this->discount) {
                return ($this->price - $this->discount);
            }
        }
        return $this->price;
    }


    /**
     * @return string
     */
    public function getOriginalPriceAttribute() {
        return 'NRs '. $this->price;
    }

}
