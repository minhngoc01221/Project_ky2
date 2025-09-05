<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // bảng trong DB

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'supplier_id',
        'stock'
    ];
}
