<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    // to not certified Products ↓
    // many Products that are not certified can be in many carts
    public function notCertifiedProducts()
    {
        return $this->belongsToMany(notCertfiedProducts::class, 'not_cart_certified_product');
    }


    // to certified Products ↓
    // many certified Products can be in many carts
    public function certifiedProducts()
    {
        return $this->belongsToMany(certfiedProducts::class, 'cart_certified_product');
    }

    // to supplier ↓
    // supplier can have one supplier and supplier can only have one supplier
    public function supplier()
    {
        return $this->hasOne(Cart::class, 'supplier_id', 'supplier_id');
    }

    // to user ↓
    // user can have one user and user can only have one user
    public function user()
    {
        return $this->hasOne(Cart::class, 'user_id', 'user_id');
    }


    // to Admin ↓
    // Admin can have one Admin and Admin can only have one Admin
    public function admin()
    {
        return $this->hasOne(Cart::class, 'admin_id', 'admin_id');
    }
}
