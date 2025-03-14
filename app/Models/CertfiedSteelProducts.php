<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;




class CertfiedSteelProducts extends Model
{

    //this is where i let the model know what table i want it to work with
    protected $table = 'certified_steel_products'; // Explicitly define the table name


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


    //many to many relasionship to carts
    public function carts()
    {
        return $this->belongsToMany(carts::class, 'cart_certified_steel');
    }
}
