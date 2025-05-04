<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Add any fields that should be mass assignable for your sales item
        'sales_report_id',
        'item_id',
        'quantity',
        'price', //important
        // Add other sales item-related fields as necessary
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2', //important
        // Add other casts as necessary
    ];

    /**
     * Get the sales report that this sales item belongs to.
     */
    public function salesReport()
    {
        return $this->belongsTo(SalesReport::class, 'sales_report_id');
    }

    /**
     * Get the item that this sales item belongs to.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}