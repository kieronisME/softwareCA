<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;





    // to CERTFIED PRODUCTS SUPPLIER table ↓
    //certifiedProductsSuppliers is the MANY in the one to many relation ship between  supplier and Certfied Product Suplier have 
    // a supplier can supply many products but a product can only belong to one supplier 
    public function certifiedProductsSuppliers()
    {
        return $this->hasMany(CertifiedProductSupplier::class);
    }



    // to NOT CERTFIED PRODUCTS SUPPLIER table ↓
    // notcertifiedProductsSuppliers is the MANY in the one to many relation ship between  supplier and Not Certfied Product Suplier have 
    // a supplier can supply many not certfied products but a not certfied product can only belong to one supplier 
    public function notCertifiedProductSuppliers()
    {
        return $this->hasMany(NotCertifiedProductSupplier::class);
    }
}
