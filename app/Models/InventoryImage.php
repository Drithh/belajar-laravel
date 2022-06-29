<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'image',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
