<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auction_rules extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_id',
        'max_purchases',
        'regeneration_seconds',
        'max_total_purchases',
        'reservation_timeout_seconds'
    ];
}
