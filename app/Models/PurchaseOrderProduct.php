<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
            'inventory_id',
            'purchaseOrder_id',
            'unit_price',
            'quantity_ordered',
            'capacity'
    ];

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

   


}
