<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Add any fields that should be mass assignable for your sales report
        'user_id',
        'payment_method_id',
        'total_amount', // Example
        'report_date',  // Example
        // Add other sales report-related fields as necessary
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'total_amount' => 'decimal:2', // Example: Cast total_amount to decimal with 2 places
        'report_date'  => 'datetime', // Example: Cast report_date to a datetime object
        // Add other casts as necessary
    ];

    /**
     * Get the user that this sales report belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the payment method used for this sales report.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    /**
     * Get the sales items associated with this sales report.
     */
    public function salesItems()
    {
        return $this->hasMany(SalesItem::class, 'sales_report_id');
    }
}