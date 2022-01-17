<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function carts(){
        $this->belongsToMany(Cart::class,'cart_id','id');
    }

    public function categories()
    {
        $this->belongsToMany(Category::class,'category_id','id');
    }
}
