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
        return view('myRoutes.CertifiedSteelCRUD.create');
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
    
    public function edit(CertfiedSteelProducts $certifiedSteelProducts)
    {
        return view('myRoutes.crud.Woodedit', compact('certifiedSteelProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, CertfiedSteelProducts $certifiedSteelProducts)
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
        //     if ($certifiedSteelProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $certifiedSteelProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $certifiedSteelProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $certifiedSteelProducts->Product_name = $request->Product_name;
        $certifiedSteelProducts->Certificate = $request->Certificate;
        $certifiedSteelProducts->Price = $request->Price;
        $certifiedSteelProducts->About = $request->About;
        $certifiedSteelProducts->quantity = $request->quantity;
        $certifiedSteelProducts->co2 = $request->co2;
        $certifiedSteelProducts->weight = $request->weight;
        $certifiedSteelProducts->weight_unit = $request->weight_unit;
        $certifiedSteelProducts->save();

        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album updated successfully!');
    }



    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   




    public function destroy(CertfiedSteelProducts $certifiedSteelProducts)
    {

        //add delete images when you get the images 

        $certifiedSteelProducts->delete();
        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album deleted successfully!');
    }




}
