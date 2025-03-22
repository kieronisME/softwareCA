<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertifiedProductSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'Product_name',
        'quantity',


    ];


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                        ↓ Roles ↓                                                ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // to ADMIN ↓
    // Admin is the ONE in the one to many relation ship between Admin and Certfied Product Suplier.
    // a Admin can supply many products but a product can only belong to one Admin 
    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }



    // to SUPPLIER ↓
    //supplier is the ONE in the one to many relation ship between supplier and Certfied Product Suplier.
    // a supplier can supply many products but a product can only belong to one supplier 
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ certified products ↓                                       ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //to Certified Wood Products 
    //a supplier/admin can supply many porducts but a product can only have one idvidual supplier/admin
    //Wood is the many in the relastionship
    public function certifiedWoodProducts()
    {
        return $this->hasMany(CertfiedWoodProducts::class, 'certified_wood_products_id');
    }


    //to Certified Metal Products 
    //a supplier/admin can supply many porducts but a product can only have one idvidual supplier/admin
    //Metal is the many in the relastionship
    public function certifiedMetalProducts()
    {
        return $this->hasMany(CertifiedMetalProduct::class, 'certified_metal_products_id');
    }


    //to Certified Steel Products 
    //a supplier/admin can supply many porducts but a product can only have one idvidual supplier/admin
    //Steel is the many in the relastionship
    public function certifiedSteelProducts()
    {
        return $this->hasMany(CertfiedSteelProducts::class, 'certified_steel_products_id');
    }
}
