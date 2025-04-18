<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'email',
        'phoneNumber',
        'password',
    ];








    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ cart relationship ↓                                        ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // to Cart ↓
    // cart can have one admin and admin can only have one cart at a time
    public function cart()
    {
        return $this->hasOne(Cart::class, 'admin_id', 'admin_id');
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ certified products ↓                                       ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // to CERTFIED PRODUCTS SUPPLIER table ↓
    // certifiedProductsSuppliers is the MANY in the one to many relation ship between admin and Certfied Product Suplier.
    // an admin can supply many products but a product can only belong to one admin 
    public function certifiedProductsSuppliers()
    {
        return $this->hasMany(CertifiedProductSupplier::class);
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ not certified products ↓                                   ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // to NOT CERTFIED PRODUCTS SUPPLIER table ↓
    // notcertifiedProductsSuppliers is the MANY in the one to many relation ship between admin and Not Certfied Product Suplier.
    // an admin can supply many not certified products but a not certified product can only belong to one admin 
    public function notCertifiedProductSuppliers()
    {
        return $this->hasMany(NotCertifiedProductSupplier::class);
    }
}
