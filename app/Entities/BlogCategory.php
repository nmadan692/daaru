<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','status'];

    /**
     * @return HasMany
     */
    public function blogs() {
        return $this-> hasMany(Blog::class);
    }

}
