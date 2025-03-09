<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;



    // to certfied products supplier table ↓
    //certifiedProductsSuppliers is the MANY in the one to many relation ship supplier and Certfied Product Suplier have 
    // a supplier can supply many products but a product can only belong to one supplier 
    public function certifiedProductsSuppliers()
    {
        return $this->hasMany(CertifiedProductSupplier::class);
    }
}
