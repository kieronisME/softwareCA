<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notCertfiedWoodProducts extends Model
{
    public function carts()
    {
        return $this->belongsToMany(carts::class, 'cart_not_certified_wood');
    }
}
