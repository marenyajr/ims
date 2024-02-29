<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'address', 'city', 'price', 'days_taken'];

    
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}
