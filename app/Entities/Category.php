<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','parent_id','status'];

    /**
     * @return HasMany
     */
    public  function children() {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    /**
     * @return BelongsTo
     */
    public  function parent() {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

}
