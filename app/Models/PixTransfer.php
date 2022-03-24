<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PixTransfer extends Model
{
    use HasFactory;

    protected $attributes = [
        'description' => '',
    ];

    protected $fillable = [
        'user_id',
        'key',
        'amount',
        'description',
    ];
}
