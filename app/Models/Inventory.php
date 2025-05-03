<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Add any fields that should be mass assignable for your inventory
        'name',
        'location',
        // Add other inventory-related fields as necessary
    ];

    /**
     * Get the popular products associated with this inventory.
     */
    public function popularProducts()
    {
        return $this->hasMany(PopularProduct::class, 'inventory_id');
    }

    /**
     * Get the users associated with this inventory.
     *
     * IMPORTANT:  It's unusual for a User to belong to an Inventory.  Double-check your
     * database schema.  Typically, an Inventory might be *managed by* a User
     * (in which case the foreign key would be in the inventories table), not the other
     * way around.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'inventory_id');
    }

    /**
     * Get the carts associated with this inventory.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class, 'inventory_id');
    }

    /**
     * Get the sales items associated with this inventory.
     */
    public function salesItems()
    {
        return $this->hasMany(SalesItem::class, 'inventory_id');
    }
}
