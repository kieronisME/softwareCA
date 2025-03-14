<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notCertfiedSteelProducts extends Model
{
     public function carts()
    {
        return $this->belongsToMany(carts::class, 'cart_certified_steel');
    }
}
