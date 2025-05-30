<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'status',
        'rank',
        'price',
        'sku',
        'quantity',
        'description',
        'image_filename',
        'image_url',
        'public_id',
    ];
}
