<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertifiedMetalProducts;
use Illuminate\Support\Facades\Storage;


class MetalController extends Controller
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
    public function metal()
    {
        $metalPorducts = CertifiedMetalProducts::all();

        return view('myRoutes.certProd.metal', compact('metalPorducts'));
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
        CertifiedMetalProducts::create([
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
    
    public function edit(CertifiedMetalProducts $CertifiedMetalProducts)
    {
        return view('myRoutes.CRUD.edit', compact('CertifiedMetalProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, CertifiedMetalProducts $CertifiedMetalProducts)
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
        //     if ($CertifiedMetalProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $CertifiedMetalProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $CertifiedMetalProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $CertifiedMetalProducts->Product_name = $request->Product_name;
        $CertifiedMetalProducts->Certificate = $request->Certificate;
        $CertifiedMetalProducts->Price = $request->Price;
        $CertifiedMetalProducts->About = $request->About;
        $CertifiedMetalProducts->quantity = $request->quantity;
        $CertifiedMetalProducts->co2 = $request->co2;
        $CertifiedMetalProducts->weight = $request->weight;
        $CertifiedMetalProducts->weight_unit = $request->weight_unit;
        $CertifiedMetalProducts->save();

        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album updated successfully!');
    }




    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   



    public function destroy(CertifiedMetalProducts $CertifiedMetalProducts)
    {

        //add delete images when you get the images 

        $CertifiedMetalProducts->delete();
        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album deleted successfully!');
    }






}
