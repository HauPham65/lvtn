<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img_url',
        'product_id'
    ];
    public function products() {
        return $this->belongsTo(products::class,'product_id','id');
    }
}
