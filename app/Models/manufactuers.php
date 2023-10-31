<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manufactuers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'categories_id'
    ];
    public function categories()
    {
        return $this->belongsTo(categories::class,'categories_id','id');
    }
}
