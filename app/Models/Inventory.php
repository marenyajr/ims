<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
                            'product_name', 
                            'product_category', 
                            'description',
                            'unit_price',
                            'quantity_in_stock',
                            'supplier_id',
                            'image',
                            'manufacture_date',
                            'expiry_date'
    ];


    public function orderProduct(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }


    public function capacity(): HasMany
    {
        return $this->hasMany(Capacity::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }


    public function scopeFilter($query, array $filters)
    {
        // dd($filters['tag']);
        // if ($filters['name'] ?? false) {
        //     $query->where('poduct_name', 'like', '%' . $filters['name'] . '%');
        // }

        if ($filters['search'] ?? false) {
            $query->where('product_name', 'like', '%' . $filters['search'] . '%')
            ->orWhere('product_category', 'like', '%' . $filters['search'] . '%');
        }
    }

   


    
}
