<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function customer(){
        $this->belongsToMany(Customer::class,'customer_id','id');
    }
    public function product(){
        $this->hasMany(Product::class,'product_id','id');
    }

}
