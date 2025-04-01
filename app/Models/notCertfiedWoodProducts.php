<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class notCertfiedWoodProducts extends Model
{

    use HasFactory;
    
    //this is where i let the model know what table i want it to work with
    protected $table = 'not_certified_wood_products';


    protected $fillable = [
        'Product_name',
        'Price',
        'About',
        'quantity',
        'co2',
        // 'weight',
        // 'weight_unit',
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
        return $this->belongsToMany(Cart::class, 'cart_not_certified_wood');
    }
}
