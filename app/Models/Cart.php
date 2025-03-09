<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;



    // to admin ↓
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
