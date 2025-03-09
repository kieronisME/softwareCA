<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertifiedProductSupplier extends Model
{
    use HasFactory;






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
}
