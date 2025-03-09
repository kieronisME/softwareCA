<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notCertfiedProducts extends Model
{
    use HasFactory;


    // to carts ↓
    // many carts can have many not certified Products and many not certified Products can be in many carts 
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_not_certified_products');
    }
}
