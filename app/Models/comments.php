<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'product_id',
        'user_id',
    ];

    public function products()
    {
        return $this->belongsTo(products::class,'product_id','id');
    }
    public function users()
    {
        return  $this->belongsTo(User::class,'user_id','id');
    }
    public function replies()
    {
        return $this->hasMany(replys::class, 'comments_id', 'id');
    }
}
