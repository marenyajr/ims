<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_amount', 'no_of_items'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderProduct(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

   

}
