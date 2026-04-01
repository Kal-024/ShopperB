<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotion_id',
        'product_id'
    ];
}
