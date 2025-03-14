<?php
// FYI 
// i named this NormalUser beacuse laravel already has a mcr called user and im too scaredd to delete it beacuse it migh break somthing that im not bothered to fix.

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalUser extends Model
{
    use HasFactory;

    // to Cart ↓
    // cart can have one user and user can only have one cart
    public function cart()
    {
        return $this->hasOne(carts::class, 'user_id', 'user_id');
    }
}
