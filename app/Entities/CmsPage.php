<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPage extends Model
{
    use SoftDeletes;
    protected  $fillable = ['image', 'terms_and_conditions',  'return_policy', 'privacy_policy'];
}
