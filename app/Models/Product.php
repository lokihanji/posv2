<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'item_id', 'name', 'description', 'price',
        'sales', 'stock', 'sold', 'status'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
