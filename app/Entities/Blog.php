<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','description', 'image', 'blog_category_id', 'status'];


    /**
     * @return BelongsTo
     */
    public function blogCategory() {
        return $this-> belongsTo(BlogCategory::class);
    }
}

