<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{


    protected $fillable = [
        'user_id',
        'admin_id',
        'supplier_id',
        'product_id', // Add this if you're storing product IDs
        'quantity',   // Add this if you're storing quantities
    ];

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                        ↓ Roles ↓                                                ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // to Admin ↓
    // Admin can have one cart and cart can only have one Admin at a time
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }


    // to Admin ↓
    // Admin can have one cart and cart can only have one Admin at a time
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }


    // to User↓
    // User can have one cart and cart can only have one Admin at a time
    public function user()
    {
        return $this->belongsTo(User::class);
    }





    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ certified products ↓                                       ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    //i must explicetly add the name of the fk as singlure or laravl will make it pulral and if it does that it will error me saying my fk doesnt exsit.
    public function certifiedWoods()
    {
        return $this->belongsToMany(CertfiedWoodProducts::class, 'cart_certified_wood', 'cart_id', 'certified_wood_product_id')
            ->withPivot('quantity');
    }


    public function certifiedMetals()
    {
        return $this->belongsToMany(CertifiedMetalProducts::class,'cart_certified_metal','cart_id','certified_metal_product_id')
            ->withPivot('quantity');
    }

    public function certifiedSteels()
    {
        return $this->belongsToMany(CertfiedSteelProducts::class, 'cart_certified_steel','cart_id','certified_steel_product_id')
            ->withPivot('quantity');
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ not certified products ↓                                   ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    //fks might be too long to add i will see when i add these if i need to use the custom ones 
    public function nonCertifiedWoods()
    {
        return $this->belongsToMany(notCertfiedWoodProducts::class, 'cart_non_certified_wood')
            ->withPivot('quantity');
    }

    public function nonCertifiedSteel()
    {
        return $this->belongsToMany(notCertfiedSteelProducts::class, 'cart_non_certified_steel')
            ->withPivot('quantity');
    }

    public function nonCertifiedMetal()
    {
        return $this->belongsToMany(notCertfiedMetalProducts::class, 'cart_non_certified_metal')
            ->withPivot('quantity');
    }
}
