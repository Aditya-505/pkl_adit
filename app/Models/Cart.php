<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $fillabel = ['uesr_id', 'product_id', 'qty'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
