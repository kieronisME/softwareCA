<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertfiedSteelProducts;
use Illuminate\Support\Facades\Storage;


class SteelController extends Controller
{
    //veiw test page
    public function viewTestPage()
    {


        // Pass the data to the Steel
        return view('myRoutes.MainTestPage');
    }

    //################################################################################################################################################################################################################################
    //                                                                                          certified steel view
    //################################################################################################################################################################################################################################
    public function steel()
    {
        $steelProducts = CertfiedSteelProducts::all();

        return view('myRoutes.certProd.steel', compact('steelProducts'));
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
        CertfiedSteelProducts::create([
            'Product_name' => $request->Product_name,
            'Certificate' => $request->Certificate,
            'Price' => $request->Price,
            'About' => $request->About,
            'quantity' => $request->quantity,
            'co2' => $request->co2,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit,

        ]);
        return redirect()->route('myRoutes.certProd.steel');
    }






    //################################################################################################################################################################################################################################
    //                                                                                             Edit
    //################################################################################################################################################################################################################################
    
    public function edit(CertfiedSteelProducts $certfiedSteelProducts)
    {
        return view('myRoutes.CRUD.edit', compact('certfiedSteelProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, CertfiedSteelProducts $certfiedSteelProducts)
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
        //     if ($certfiedSteelProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $certfiedSteelProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $certfiedSteelProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $certfiedSteelProducts->Product_name = $request->Product_name;
        $certfiedSteelProducts->Certificate = $request->Certificate;
        $certfiedSteelProducts->Price = $request->Price;
        $certfiedSteelProducts->About = $request->About;
        $certfiedSteelProducts->quantity = $request->quantity;
        $certfiedSteelProducts->co2 = $request->co2;
        $certfiedSteelProducts->weight = $request->weight;
        $certfiedSteelProducts->weight_unit = $request->weight_unit;
        $certfiedSteelProducts->save();

        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album updated successfully!');
    }



    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   




    public function destroy(CertfiedSteelProducts $certfiedSteelProducts)
    {

        //add delete images when you get the images 

        $certfiedSteelProducts->delete();
        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album deleted successfully!');
    }




}
