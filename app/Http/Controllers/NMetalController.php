<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notCertfiedMetalProducts;
use Illuminate\Support\Facades\Storage;


class NMetalController extends Controller
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
    public function Nmetal()
    {
        $notMetalPorducts = notCertfiedMetalProducts::all();

        return view('myRoutes.notCertProd.Nmetal', compact('notMetalPorducts'));
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
        notCertfiedMetalProducts::create([
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
    
    public function edit(notCertfiedMetalProducts $notCertifiedMetalProducts)
    {
        return view('myRoutes.crud.Woodedit', compact('notCertifiedMetalProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, notCertfiedMetalProducts $notCertifiedMetalProducts)
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
        //     if ($notCertifiedMetalProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $notCertifiedMetalProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $notCertifiedMetalProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $notCertifiedMetalProducts->Product_name = $request->Product_name;
        $notCertifiedMetalProducts->Certificate = $request->Certificate;
        $notCertifiedMetalProducts->Price = $request->Price;
        $notCertifiedMetalProducts->About = $request->About;
        $notCertifiedMetalProducts->quantity = $request->quantity;
        $notCertifiedMetalProducts->co2 = $request->co2;
        $notCertifiedMetalProducts->weight = $request->weight;
        $notCertifiedMetalProducts->weight_unit = $request->weight_unit;
        $notCertifiedMetalProducts->save();

        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album updated successfully!');
    }




    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   



    public function destroy(notCertfiedMetalProducts $notCertifiedMetalProducts)
    {

        //add delete images when you get the images 

        $notCertifiedMetalProducts->delete();
        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album deleted successfully!');
    }






}
