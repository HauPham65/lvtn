<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    public function manufactuers()
    {
        return $this->hasMany(manufactuers::class,'categories_id','id');
    }
}
