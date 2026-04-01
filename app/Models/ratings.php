<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_id',
        'from_user_id',
        'to_user_id',
        'score',
        'comment',
        'type',
        'created_at'
    ];
}
