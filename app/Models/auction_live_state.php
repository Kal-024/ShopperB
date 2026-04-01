<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auction_live_state extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_id',
        'current_item_id',
        'started_at',
        'ended_at'
    ];
}
