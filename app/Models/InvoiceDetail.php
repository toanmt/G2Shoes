<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'invoice_details';

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class,'size_id', 'id');
    }
}
