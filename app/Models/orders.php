<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'status',
        'order_date',
        'user_id',
        'name',
        'phone',
        'address',
        'email',
        'shipping',
        'total',
        'payment',
        'description'
    ];

    public function items() {
        return $this->hasMany(order_details::class,'order_id','id');
    }

    public function users() {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
