<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_penalties extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'auction_id',
        'reason',
        'penalty_type',
        'expires_at',
    ];
}
