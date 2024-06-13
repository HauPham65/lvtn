<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    public function orders() {
        return $this->belongsTo(orders::class,'order_id','id');
    }
    public function products() {
        return $this->belongsTo(products::class,'product_id','id');
    }
}
