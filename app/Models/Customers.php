<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'point',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class, 'sale_id');
    }
}
