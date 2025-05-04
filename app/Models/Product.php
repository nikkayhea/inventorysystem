<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'stock',
        'sold_items',
        'price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'stock' => 'integer',
        'sold_items' => 'integer',
    ];

    // If you don't want timestamps (created_at, updated_at)
    // to be managed automatically, uncomment this:
    // public $timestamps = false;
}