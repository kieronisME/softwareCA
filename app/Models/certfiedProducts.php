<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certfiedProducts extends Model
{
    use HasFactory;

    // to carts ↓
    // many carts can have many certified Products and many certified Products can be in many carts 
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_certified_product');
    }
}
