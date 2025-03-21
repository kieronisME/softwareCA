<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertfiedWoodProducts;
use Illuminate\Support\Facades\Storage;


class MaterialController extends Controller
{

    //certfied
    public function wood()
    {
        $woodProducts = CertfiedWoodProducts::all();

        // Pass the data to the view
        return view('myRoutes.certProd.wood', compact('woodProducts'));

    }


    public function create()
    {
        
        // Pass the data to the view
        return view('myRoutes.CRUD.create');


    }

    public function store(Request $request)
    {
        //validations 
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Certificate' => 'required|string|max:255',
            'Price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'About' => 'required|string|max:1000',
            'quantity' => 'required|integer|min:1',
            'co2' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|string|max:50',
            'weight_unit' => 'required|string|max:50',
        ]);


        //creating new artist in DB
        CertfiedWoodProducts::create([
            'Product_name' => $request->Product_name,
            'Certificate' => $request->Certificate,
            'Price' => $request->Price,
            'About' => $request->About,
            'quantity' => $request->quantity,
            'co2' => $request->co2,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit,
        
        ]);
        return redirect()->route('myRoutes.certProd.wood');
    }


    public function destroy(CertfiedWoodProducts $CertfiedWoodProducts)
    {

        // if ($CertfiedWoodProducts->image) {
        //     Storage::delete('ArtistImg/images/' . $CertfiedWoodProducts->image);
        // }

        $CertfiedWoodProducts->delete();
        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Album deleted successfully!');
    }


    


    public function metal()
    {
        return view('myRoutes.certProd.metal');
    }


    public function steel()
    {
        return view('myRoutes.certProd.steel');
    }


    //not certfied
    public function Nwood()
    {
        return view('myRoutes.notCertProd.Nwood');
    }


    public function Nmetal()
    {
        return view('myRoutes.notCertProd.Nmetal');
    }


    public function Nsteel()
    {
        return view('myRoutes.notCertProd.Nsteel');
    }


}
