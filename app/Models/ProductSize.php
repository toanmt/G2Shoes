<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Size;

class ProductSize extends Model
{
    use HasFactory;

    protected $table = 'product_sizes';

    public function products(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function sizes(){
        return $this->belongsTo(Size::class, 'size_id','id');
    }
}
