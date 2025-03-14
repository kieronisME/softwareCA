<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;











    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ relationship ↓                                             ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    // to Cart ↓
    // cart can have one admin and admin can only have one cart at a time
    public function cart()
    {
        return $this->hasOne(carts::class, 'admin_id', 'admin_id');
    }


    // to CERTFIED PRODUCTS SUPPLIER table ↓
    // certifiedProductsSuppliers is the MANY in the one to many relation ship between admin and Certfied Product Suplier.
    // an admin can supply many products but a product can only belong to one admin 
    public function certifiedProductsSuppliers()
    {
        return $this->hasMany(CertifiedProductSupplier::class);
    }


    // to NOT CERTFIED PRODUCTS SUPPLIER table ↓
    // notcertifiedProductsSuppliers is the MANY in the one to many relation ship between admin and Not Certfied Product Suplier.
    // an admin can supply many not certfied products but a not certfied product can only belong to one admin 
    public function notCertifiedProductSuppliers()
    {
        return $this->hasMany(NotCertifiedProductSupplier::class);
    }
}
