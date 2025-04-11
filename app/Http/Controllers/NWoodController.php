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
        $notwoodProducts = notCertfiedWoodProducts::all();

        // Pass the data to the view
        return view('myRoutes.notCertProd.Nwood', compact('notwoodProducts'));
    }
    

    //################################################################################################################################################################################################################################
    //                                                                                           Create
    //################################################################################################################################################################################################################################

    public function create()
    {

        return view('myRoutes.NOTCertifiedWoodCRUD.create');

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
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'quantity' => 'required|integer|min:1',
            'co2' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|string|max:50',
            'weight_unit' => 'required|string|max:50',
        ]);


        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/woodimages'), $imageName);
        }
    
        //creating new artist in DB
        notCertfiedWoodProducts::create([
            'Product_name' => $request->Product_name,
            'Price' => $request->Price,
            'image' => $imageName,
            'About' => $request->About,
            'quantity' => $request->quantity,
            'co2' => $request->co2,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit,

        ]);
        return redirect()->route('myRoutes.notCertProd.Nwood');
    }




    //################################################################################################################################################################################################################################
    //                                                                                             Edit
    //################################################################################################################################################################################################################################
    
    public function edit(notCertfiedWoodProducts $notCertfiedWoodProducts)
    {
        return view('myRoutes.notCertifiedWoodCRUD.edit', compact('notCertfiedWoodProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, notCertfiedWoodProducts $notCertfiedWoodProducts)
    {
        // Validations
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'About' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'quantity' => 'required|integer|min:1',
            'co2' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|string|max:50',
            'weight_unit' => 'required|string|max:50',
        ]);


        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/woodimages'), $imageName);
        }
    
        // assighnes new meaning to each 
        $notCertfiedWoodProducts->Product_name = $request->Product_name;
        $notCertfiedWoodProducts->Price = $request->Price;
        $notCertfiedWoodProducts->About = $request->About;
        $notCertfiedWoodProducts->quantity = $request->quantity;
        $notCertfiedWoodProducts->co2 = $request->co2;
        $notCertfiedWoodProducts->weight = $request->weight;
        $notCertfiedWoodProducts->weight_unit = $request->weight_unit;
        $notCertfiedWoodProducts->save();

        return redirect()->route('myRoutes.certProd.Nwood')->with('success', 'Product updated successfully!');
    }

    
    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   


    public function Ndestroy(notCertfiedWoodProducts $notCertfiedWoodProducts)
    {

        //add delete images when you get the images 

        $notCertfiedWoodProducts->delete();
        
        return redirect()->route('myRoutes.certProd.Nwood')->with('success', 'Product deleted successfully!');
    }
    
}
