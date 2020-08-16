<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    protected  $fillable = ['name', 'logo', 'phone', 'viber','address', 'email', 'delivery_start_hour', 'delivery_end_hour'];
}
