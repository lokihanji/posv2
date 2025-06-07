<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name', 
        'status'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
