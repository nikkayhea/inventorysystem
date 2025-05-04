<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Add any fields that should be mass assignable for your payment method
        'name', // e.g., 'Cash', 'Credit Card', 'PayPal'
        // Add other payment method-related fields as necessary
    ];

    // You might not need $casts for a simple payment method model

    /**
     * Get the sales reports associated with this payment method.
     */
    public function salesReports()
    {
        return $this->hasMany(SalesReport::class, 'payment_method_id');
    }
}