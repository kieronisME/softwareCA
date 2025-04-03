<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notCertfiedMetalProducts;
use Illuminate\Support\Facades\Storage;


class NMetalController extends Controller
{

    //################################################################################################################################################################################################################################
    //                                                                                   not certified metal view
    //################################################################################################################################################################################################################################
    public function Nmetal()
    {
        $notmetalProducts = notCertfiedMetalProducts::all();

        // Pass the data to the view
        return view('myRoutes.NotCertProd.Nmetal', compact('notmetalProducts'));
    }
    

    //################################################################################################################################################################################################################################
    //                                                                                           Create
    //################################################################################################################################################################################################################################

    public function create()
    {

        return view('myRoutes.notCertifiedMetalCRUD.create');

    }





    //################################################################################################################################################################################################################################
    //                                                                                           Store
    //################################################################################################################################################################################################################################

    public function store(Request $request)
    {
        //validations 
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'About' => 'required|string|max:1000',
            'quantity' => 'required|integer|min:1',
            'co2' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|string|max:50',
            'weight_unit' => 'required|string|max:50',
        ]);


        //creating new artist in DB
        notCertfiedMetalProducts::create([
            'Product_name' => $request->Product_name,
            'Price' => $request->Price,
            'About' => $request->About,
            'quantity' => $request->quantity,
            'co2' => $request->co2,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit,

        ]);
        return redirect()->route('myRoutes.certProd.Nmetal');
    }




    //################################################################################################################################################################################################################################
    //                                                                                             Edit
    //################################################################################################################################################################################################################################
    
    public function edit(notCertfiedMetalProducts $notCertfiedMetalProducts)
    {
        return view('myRoutes.notCertifiedMetalCRUD.edit', compact('notCertfiedMetalProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, notCertfiedMetalProducts $notCertfiedMetalProducts)
    {
        // Validations
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'About' => 'required|string|max:1000',
            'quantity' => 'required|integer|min:1',
            'co2' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|string|max:50',
            'weight_unit' => 'required|string|max:50',
        ]);

        // checks if image uplaoded
        // if ($request->hasFile('image')) {
        //     if ($notCertfiedWoodProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $notCertfiedWoodProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $notCertfiedWoodProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $notCertfiedMetalProducts->Product_name = $request->Product_name;
        $notCertfiedMetalProducts->Price = $request->Price;
        $notCertfiedMetalProducts->About = $request->About;
        $notCertfiedMetalProducts->quantity = $request->quantity;
        $notCertfiedMetalProducts->co2 = $request->co2;
        $notCertfiedMetalProducts->weight = $request->weight;
        $notCertfiedMetalProducts->weight_unit = $request->weight_unit;
        $notCertfiedMetalProducts->save();

        return redirect()->route('myRoutes.certProd.Nmetal')->with('success', 'Product updated successfully!');
    }

    
    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   


    public function Ndestroy(notCertfiedMetalProducts $notCertfiedMetalProducts)
    {

        //add delete images when you get the images 

        $notCertfiedMetalProducts->delete();
        
        return redirect()->route('myRoutes.certProd.Nmetal')->with('success', 'Product deleted successfully!');
    }
    
}
