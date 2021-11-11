<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id','product_name','price','discount','type_id'];
    protected $primaryKey = 'id';
    
    public function product_size(){
        return $this->hasMany(ProductSize::class,'product_id','id');
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function images(){
        return $this->hasMany(Image::class,'product_id','id');
    }
}
