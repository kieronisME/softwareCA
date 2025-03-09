<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notCertifiedProductSupplier extends Model
{
    use HasFactory;



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
}
