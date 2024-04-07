<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'selling_price',
        'unit_price',
        'discount',
        'quantity_in_stock',
        'supplier_id',
        'capacity',
        'manufacture_date',
        'expiry_date'
    ];


    public function orderProduct(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
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
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('category', 'like', '%' . $filters['search'] . '%');
        }
    }
}
