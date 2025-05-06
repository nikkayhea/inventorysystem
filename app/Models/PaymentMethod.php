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
    protected $table = 'payment_method';  // Specify the table name

    protected $fillable = [
        'sales_report_id',
        'payee_method',
        'emailed_username',
        'card_number',
        'card_expiration_date',
        'card_cvv',
        'amount_paid',
        'cash_change',
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