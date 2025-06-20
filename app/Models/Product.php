<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $fillable = ['category_id', 'name', 'slug', 'description', 'image', 'price', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart ()
    {
        return $this->hasMany(cart::class);
    }

    public function orders(){
        return $this->belongsToMany(product::class)->withPivato('qty', 'price')->withTimestamps();
    }
}
