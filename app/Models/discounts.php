<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discounts extends Model
{
    use HasFactory;
    protected $table = 'discounts';
    protected $fillable = [
        'code',
        'value',
        'min_discount',
        'start_date',
        'end_date',
        'description',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

}
