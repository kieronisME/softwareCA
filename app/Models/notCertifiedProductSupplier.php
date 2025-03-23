<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notCertifiedProductSupplier extends Model
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
    // Admin is the ONE in the one to many relation ship between Admin and  not Certfied Product Suplier.
    // an Admin can supply many not Certfied products but a not Certfied product can only belong to one Admin 
    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }


    // to SUPPLIER ↓
    // supplier is the ONE in the one to many relation ship  between  supplier and  not Certfied Product Suplier.
    // a supplier can supply many not Certfied products but a not Certfied product can only belong to one supplier 
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ certified products ↓                                       ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //to not Certified Wood Products 
    //a supplier/admin can supply many porducts but a product can only have one idvidual supplier/admin
    //not Certified Wood is the many in the relastionship
    public function notCertifiedWoodProducts()
    {
        return $this->hasMany(CertfiedWoodProducts::class, 'not_certified_wood_products_id');
    }


    //to not Certified Metal Products 
    //a supplier/admin can supply many porducts but a product can only have one idvidual supplier/admin
    //not Certified Metal is the many in the relastionship
    public function notCertifiedMetalProducts()
    {
        return $this->hasMany(CertifiedMetalProduct::class, 'not_certified_metal_products_id');
    }


    //to not Certified Steel Products 
    //a supplier/admin can supply many porducts but a product can only have one idvidual supplier/admin
    //not Certified Steel is the many in the relastionship
    public function notCertifiedSteelProducts()
    {
        return $this->hasMany(CertfiedSteelProducts::class, 'not_certified_steel_products_id');
    }
}
