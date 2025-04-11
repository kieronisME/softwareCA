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
        return view('myRoutes.CertifiedWoodCRUD.create');
    }





    //################################################################################################################################################################################################################################
    //                                                                                           Store
    //################################################################################################################################################################################################################################

    public function store(Request $request)
    {
        // Validations 
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'Certificate' => 'required|string|max:255',
            'Price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'About' => 'required|string|max:1000',
            'quantity' => 'required|integer|min:1',
            'co2' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|string|max:50',
            'weight_unit' => 'required|string|max:50',
        ]);
    
        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/woodimages'), $imageName);
        }
    
        // Create new product in DB
        CertfiedWoodProducts::create([
            'Product_name' => $request->Product_name,
            'Certificate' => $request->Certificate,
            'Price' => $request->Price,
            'About' => $request->About,
            'image' => $imageName,
            'quantity' => $request->quantity,
            'co2' => $request->co2,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit,
        ]);
    
        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Product created successfully!');
    }




    //################################################################################################################################################################################################################################
    //                                                                                             Edit
    //################################################################################################################################################################################################################################
    
    public function edit(CertfiedWoodProducts $certifiedWoodProducts)
    {
        return view('myRoutes.CertifiedWoodcrud.edit', compact('certifiedWoodProducts'));
    }




    //################################################################################################################################################################################################################################
    //                                                                                           Update
    //################################################################################################################################################################################################################################
    public function update(Request $request, CertfiedWoodProducts $certifiedWoodProducts)
    {
        // Validations
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Certificate' => 'required|string|max:255',
            'Price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'About' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'quantity' => 'required|integer|min:1',
            'co2' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'required|string|max:50',
            'weight_unit' => 'required|string|max:50',
        ]);

        // checks if image uplaoded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($certifiedWoodProducts->image) {
                Storage::delete('img/woodimages/' . $certifiedWoodProducts->image);
            }
        
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/woodimages/'), $imageName);
            $certifiedWoodProducts->image = $imageName;
        } elseif ($request->has('current_image')) {
            $certifiedWoodProducts->image = $request->current_image;
        }

        // assighnes new meaning to each 
        $certifiedWoodProducts->Product_name = $request->Product_name;
        $certifiedWoodProducts->Certificate = $request->Certificate;
        $certifiedWoodProducts->Price = $request->Price;
        $certifiedWoodProducts->About = $request->About;
        $certifiedWoodProducts->quantity = $request->quantity;
        $certifiedWoodProducts->co2 = $request->co2;
        $certifiedWoodProducts->weight = $request->weight;
        $certifiedWoodProducts->weight_unit = $request->weight_unit;
        $certifiedWoodProducts->save();

        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Album updated successfully!');
    }

    
    //################################################################################################################################################################################################################################
    //                                                                                           delete
    //################################################################################################################################################################################################################################
   


    public function destroy(CertfiedWoodProducts $certifiedWoodProducts)
    {
        if ($certifiedWoodProducts->image) {
            Storage::delete('img/woodimages/' . $certifiedWoodProducts->image);
        }
        
        $certifiedWoodProducts->delete();
        return redirect()->route('myRoutes.certProd.wood')->with('success', 'Product deleted successfully!');
    }

}
