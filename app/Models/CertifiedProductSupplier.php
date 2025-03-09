<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertifiedProductSupplier extends Model
{
    use HasFactory;





    // to SUPPLIER ↓
    //supplier is the ONE in the one to many relation ship supplier and Certfied Product Suplier have 
    // a supplier can supply many products but a product can only belong to one supplier 
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
