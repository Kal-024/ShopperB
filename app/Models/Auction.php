<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_id',
        'title',
        'description',
        'banner_image',
        'start_time',
        'end_time',
        'status',
        'created_at'
    ];
}
