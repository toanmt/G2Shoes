<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    public function types()
    {
        return $this->hasMany(Type::class, 'brand_id', 'id');
    }

    public function products() {
    	return $this->hasManyThrough(Product::class, Type::class,'brand_id','type_id','id','id');
    }
}
