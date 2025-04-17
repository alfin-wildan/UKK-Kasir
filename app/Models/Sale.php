<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales'; // Nama tabel di database

    protected $fillable = [
        'sale_date',
        'products_id',
        'user_id',
        'customer_id',
        'total_price',
        'total_payment',
        'change',
        'used_point',
        'sale_product'
    ];

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function detail_sale()
    {
        return $this->belongsTo(Detail_sale::class, 'detail_sale_id');
    }
}


