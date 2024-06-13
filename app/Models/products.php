<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'price_import',
        'quantity',
        'description',
        'categories_id',
        'manufactuers_id',
        'image_avatar',


    ];
    public function image(){
        return $this->hasMany(images::class,'product_id','id');
    }
    public function manufact()
    {
        return $this->belongsTo(manufactuers::class,'manufactuers_id','id');
    }
    public function categories()
    {
        return $this->belongsTo(categories::class,'categories_id','id');
    }

}
