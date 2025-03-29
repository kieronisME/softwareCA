<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notCertfiedSteelProducts;
use Illuminate\Support\Facades\Storage;


class NSteelController extends Controller
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
    public function Nsteel()
    {
        $notSteelProducts = notCertfiedSteelProducts::all();

        return view('myRoutes.notCertProd.Nsteel', compact('notSteelProducts'));
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
        notCertfiedSteelProducts::create([
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
    
    public function edit(notCertfiedSteelProducts $notCertfiedSteelProducts)
    {
        return view('myRoutes.CRUD.edit', compact('notCertfiedSteelProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, notCertfiedSteelProducts $notCertfiedSteelProducts)
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
        //     if ($notCertfiedSteelProducts->image) {
        //         Storage::delete('ArtistImg/images/' . $notCertfiedSteelProducts->image);
        //     }

        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('ArtistImg/images'), $imageName);
        //     $notCertfiedSteelProducts->image = $imageName;
        // }

        // assighnes new meaning to each 
        $notCertfiedSteelProducts->Product_name = $request->Product_name;
        $notCertfiedSteelProducts->Certificate = $request->Certificate;
        $notCertfiedSteelProducts->Price = $request->Price;
        $notCertfiedSteelProducts->About = $request->About;
        $notCertfiedSteelProducts->quantity = $request->quantity;
        $notCertfiedSteelProducts->co2 = $request->co2;
        $notCertfiedSteelProducts->weight = $request->weight;
        $notCertfiedSteelProducts->weight_unit = $request->weight_unit;
        $notCertfiedSteelProducts->save();

        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album updated successfully!');
    }



    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   




    public function destroy(notCertfiedSteelProducts $notCertfiedSteelProducts)
    {

        //add delete images when you get the images 

        $notCertfiedSteelProducts->delete();
        return redirect()->route('myRoutes.certProd.steel')->with('success', 'Album deleted successfully!');
    }




}
