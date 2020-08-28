<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','description', 'image', 'blog_category_id', 'status'];
    public $appends = ['posted_date'];


    /**
     * @return BelongsTo
     */
    public function blogCategory() {
        return $this-> belongsTo(BlogCategory::class);
    }

    /**
     * @return string
     */
    public function getPostedDateAttribute() {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}

