<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class CertfiedWoodProducts extends Model
{

    use HasFactory;

    //this is where i let the model know what table i want it to work with
    protected $table = 'certified_wood_products';


    protected $fillable = [
        'Product_name',
        'Certificate',
        'Price',
        'About',
        'quantity',
        'co2',
        'weight',
        'weight_unit',
    ];


    //this is how where i say how i want certain elemets to be displayed 
    protected $Display = [
        'Price' => 'decimal:2', // display price as an int with two decmal places e.g. price: 12:12 
        'quantity' => 'integer',
        'co2' => 'float',
    ];




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ cart relationship ↓                                        ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //many to many relasionship to carts
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_certified_wood');
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ certified products ↓                                       ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //to Certified Product Supplier 
    //a supplier/admin can supply many porducts but a product can only have one idvidual supplier/admin
    //wood is the many in the relastionship
    public function certifiedProductSupplier()
    {
        return $this->belongsTo(CertifiedProductSupplier::class, 'certified_wood_products_id');
    }
}
