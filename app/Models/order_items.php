<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'auction_item_id',
        'product_id',
        'price',
        'quantity',
    ];
}
