<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'starting_price',
        'current_price',
        'start_time',
        'end_time',
    ];
}
