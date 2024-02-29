<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Capacity extends Model
{
    use HasFactory;
    protected $fillable = ['inventory_id', 'capacity', 'category'];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    

}
