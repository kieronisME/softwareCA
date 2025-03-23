<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carts extends Model
{

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


    public function certifiedWoods()
    {
        return $this->belongsToMany(CertfiedWoodProducts::class, 'cart_certified_wood');
    }

    public function certifiedMetals()
    {
        return $this->belongsToMany(CertifiedMetalProduct::class, 'cart_certified_metal');
    }

    public function certifiedSteels()
    {
        return $this->belongsToMany(CertfiedSteelProducts::class, 'cart_certified_steel');
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ not certified products ↓                                   ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function nonCertifiedWoods()
    {
        return $this->belongsToMany(notCertfiedWoodProducts::class, 'cart_non_certified_wood');
    }

    public function nonCertifiedSteel()
    {
        return $this->belongsToMany(notCertfiedSteelProducts::class, 'cart_non_certified_steel');
    }

    public function nonCertifiedMetal()
    {
        return $this->belongsToMany(notCertfiedMetalProducts::class, 'cart_non_certified_metal');
    }
}
