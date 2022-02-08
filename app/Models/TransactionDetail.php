<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id	',
        'products_id',
        'price',
        'quantity',
        'resi',
        'shipping_status',
        'code'
    ];

    protected $hidden = [
        
    ];
}
