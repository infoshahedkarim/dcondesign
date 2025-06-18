<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'img',
        'price',
        'place_id',
        'category_id',
        'des',
        'contact',
        'premium_ads'
    ];
}
