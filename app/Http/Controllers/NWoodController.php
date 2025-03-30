<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notCertfiedWoodProducts;
use Illuminate\Support\Facades\Storage;


class NWoodController extends Controller
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
    public function Nwood()
    {
        $notWoodProducts = notCertfiedWoodProducts::all();

        // Pass the data to the view
        return view('myRoutes.notCertProd.Nwood', compact('notWoodProducts'));
    }


    //################################################################################################################################################################################################################################
    //                                                                                           Create
    //################################################################################################################################################################################################################################

    public function create()
    {

        // Pass the data to the view

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
        notCertfiedWoodProducts::create([
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
    
    public function edit(notCertfiedWoodProducts $notCertfiedWoodProducts)
    {
        return view('myRoutes.crud.Woodedit', compact('notCertfiedWoodProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, notCertfiedWoodProducts $notCertfiedWoodProducts)
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
        //     if ($notCertfiedWoodProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $notCertfiedWoodProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $notCertfiedWoodProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $notCertfiedWoodProducts->Product_name = $request->Product_name;
        $notCertfiedWoodProducts->Certificate = $request->Certificate;
        $notCertfiedWoodProducts->Price = $request->Price;
        $notCertfiedWoodProducts->About = $request->About;
        $notCertfiedWoodProducts->quantity = $request->quantity;
        $notCertfiedWoodProducts->co2 = $request->co2;
        $notCertfiedWoodProducts->weight = $request->weight;
        $notCertfiedWoodProducts->weight_unit = $request->weight_unit;
        $notCertfiedWoodProducts->save();

        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Album updated successfully!');
    }

    
    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   


    public function destroy(notCertfiedWoodProducts $notCertfiedWoodProducts)
    {

        //add delete images when you get the images 

        $notCertfiedWoodProducts->delete();
        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Album deleted successfully!');
    }

}
