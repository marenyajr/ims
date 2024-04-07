<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
            'product_id',
            'order_id',
            'capacity',
            'unit_price',
            'quantity_ordered',
            'discount',
            'subtotal'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function inventory(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
