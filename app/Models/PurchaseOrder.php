<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
            'supplier_id',
            'total_amount',
            'status',
    ];


    public function purchaseOrderProduct(): HasMany
    {
        return $this->hasMany(PurchaseOrderProduct::class);
    }
}
