<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Product extends Model
{
    // Specify the custom primary key
    protected $primaryKey = 'product_id';  // Change this to your new primary key

    // Set if the key is incrementing (auto-incrementing)
    public $incrementing = true; // Set to false if not auto-incrementing

    // Specify the key type (use 'string' if it's a UUID)
    protected $keyType = 'int'; // Use 'string' if you're using UUIDs for the primary key

    protected $fillable = [
        'name',
        'stock',
        'sold_items',
        'price',
        'description',
        'image',
    ];
    

    protected $casts = [
        'stock' => 'integer',
        'sold_items' => 'integer',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'product_id', 'product_id');  // Ensure the foreign key is correct
    }
}
