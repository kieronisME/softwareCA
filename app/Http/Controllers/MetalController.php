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
        return view('myRoutes.CertifiedMetalCRUD.create');
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
        return redirect()->route('myRoutes.certProd.metal');
    }






    //################################################################################################################################################################################################################################
    //                                                                                             Edit
    //################################################################################################################################################################################################################################
    
    public function edit(CertifiedMetalProducts $certifiedMetalProducts)
    {
        return view('myRoutes.CertifiedMetalCRUD.edit', compact('certifiedMetalProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, CertifiedMetalProducts $certifiedMetalProducts)
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
        //     if ($certifiedMetalProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $certifiedMetalProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $certifiedMetalProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $certifiedMetalProducts->Product_name = $request->Product_name;
        $certifiedMetalProducts->Certificate = $request->Certificate;
        $certifiedMetalProducts->Price = $request->Price;
        $certifiedMetalProducts->About = $request->About;
        $certifiedMetalProducts->quantity = $request->quantity;
        $certifiedMetalProducts->co2 = $request->co2;
        $certifiedMetalProducts->weight = $request->weight;
        $certifiedMetalProducts->weight_unit = $request->weight_unit;
        $certifiedMetalProducts->save();

        return redirect()->route('myRoutes.certProd.metal')->with('success', 'product updated successfully!');
    }




    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   



    public function destroy(CertifiedMetalProducts $certifiedMetalProducts)
    {
        //add delete images when you get the images 

        $certifiedMetalProducts->delete();
        return redirect()->route('myRoutes.certProd.metal')->with('success', 'product deleted successfully!');
    }






}
