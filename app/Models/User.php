<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 👇 Tell Laravel to use 'user_id' as the primary key
    protected $primaryKey = 'user_id';

    // 👇 Optional: if your 'user_id' column is auto-incrementing
    public $incrementing = true;

    // 👇 Optional: if 'user_id' is an integer
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the carts for the user.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    /**
     * Get the sales items for the user.
     */
    public function sales_items()
    {
        return $this->hasMany(SalesItem::class, 'user_id');
    }

    /**
     * Get the account statuses for the user.
     */
    public function account_status()
    {
        return $this->hasMany(AccountStatus::class, 'user_id');
    }

    /**
     * Get the sales reports for the user.
     */
    public function sales_reports()
    {
        return $this->hasMany(SalesReport::class, 'user_id');
    }

     /**
     * Get the tiers for the user.
     */
    public function tiers()
    {
        return $this->hasMany(Tier::class, 'user_id');
    }

     /**
     * Get the popular products for the user.
     */
    public function popular_products()
    {
        return $this->hasMany(PopularProduct::class, 'user_id');
    }

    /**
     * Get the inventory for the user.
     */
    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'user_id');
    }
    
}

