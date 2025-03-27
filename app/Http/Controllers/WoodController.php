<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertfiedWoodProducts;
use Illuminate\Support\Facades\Storage;


class WoodController extends Controller
{

    //veiw test page
    public function viewTestPage()
    {


        // Pass the data to the view
        return view('myRoutes.MainTestPage');
    }

    //################################################################################################################################################################################################################################
    //                                                                                          certified wood view
    //################################################################################################################################################################################################################################
    public function wood()
    {
        $woodProducts = CertfiedWoodProducts::all();

        // Pass the data to the view
        return view('myRoutes.certProd.wood', compact('woodProducts'));
    }


    //################################################################################################################################################################################################################################
    //                                                                                           Create
    //################################################################################################################################################################################################################################

    public function create()
    {

        // Pass the data to the view
        return view('myRoutes.CRUD.create');
    }





    //################################################################################################################################################################################################################################
    //                                                                                           Store
    //################################################################################################################################################################################################################################

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




    //################################################################################################################################################################################################################################
    //                                                                                             Edit
    //################################################################################################################################################################################################################################
    
    public function edit(CertfiedWoodProducts $certfiedWoodProducts)
    {
        return view('myRoutes.CRUD.edit', compact('certfiedWoodProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, CertfiedWoodProducts $certfiedWoodProducts)
    {
        // Validations
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

        // checks if image uplaoded
        // if ($request->hasFile('image')) {
        //     if ($certfiedWoodProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $certfiedWoodProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $certfiedWoodProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $certfiedWoodProducts->Product_name = $request->Product_name;
        $certfiedWoodProducts->Certificate = $request->Certificate;
        $certfiedWoodProducts->Price = $request->Price;
        $certfiedWoodProducts->About = $request->About;
        $certfiedWoodProducts->quantity = $request->quantity;
        $certfiedWoodProducts->co2 = $request->co2;
        $certfiedWoodProducts->weight = $request->weight;
        $certfiedWoodProducts->weight_unit = $request->weight_unit;
        $certfiedWoodProducts->save();

        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Album updated successfully!');
    }

    
    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   


    public function destroy(CertfiedWoodProducts $certfiedWoodProducts)
    {

        //add delete images when you get the images 

        $certfiedWoodProducts->delete();
        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Album deleted successfully!');
    }

}
