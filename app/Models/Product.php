<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'stock'
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class, 'sale_id');
    }

    public function detail_sale()
    {
        return $this->hasMany(Detail_sale::class, 'product_id');
    }

}
