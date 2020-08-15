<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','brand_id','volume', 'country', 'alcohol', 'description', 'price', 'discount', 'is%', 'quantity', 'image', 'status'];

    /**
     * @return BelongsTo
     */
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

}
