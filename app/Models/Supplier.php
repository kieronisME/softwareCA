<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'email',
        'phoneNumber',
        // 'weight',
        // 'weight_unit',
    ];





    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ relationship ↓                                             ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // to Cart ↓
    // cart can have one supplier and supplier can only have one cart
    public function cart()
    {
        return $this->hasOne(Cart::class, 'supplier_id', 'supplier_id');
    }







    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ certified products ↓                                       ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // to CERTFIED PRODUCTS SUPPLIER table ↓
    //certifiedProductsSuppliers is the MANY in the one to many relation ship between  supplier and Certfied Product Suplier have 
    // a supplier can supply many products but a product can only belong to one supplier 
    public function certifiedProductsSuppliers()
    {
        return $this->hasMany(CertifiedProductSupplier::class);
    }





    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ not certified products ↓                                   ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // to NOT CERTFIED PRODUCTS SUPPLIER table ↓
    // notcertifiedProductsSuppliers is the MANY in the one to many relation ship between  supplier and Not Certfied Product Suplier have 
    // a supplier can supply many not certified products but a not certified product can only belong to one supplier 
    public function notCertifiedProductSuppliers()
    {
        return $this->hasMany(NotCertifiedProductSupplier::class);
    }
}
