<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////                                    ↓ certified products ↓                                       ////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function certifiedWoods()
    {
        return $this->belongsToMany(CertfiedWoodProducts::class, 'cart_certified_wood');
    }

    public function certifiedMetals()
    {
        return $this->belongsToMany(CertfiedMetalProducts::class, 'cart_certified_metal');
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
