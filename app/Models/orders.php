<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'auction_id',
        'status',
        'total',
        'ticket_code',
        'expires_at',
        'created_at',
    ];
}
