<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

//CERTIFIED
use App\Models\CertfiedWoodProducts;
use App\Models\CertifiedMetalProducts;
use App\Models\CertfiedSteelProducts;


//NOT CERTIFIED
use App\Models\notCertfiedWoodProducts;
use App\Models\notCertfiedMetalProducts;
use App\Models\notCertfiedSteelProducts;


use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    //################################################################################################################################################################################################################################
    //                                                                                    User auth check
    //################################################################################################################################################################################################################################

    protected function getCart()
    {
        // this gets the logged in user 
        $user = Auth::user();

        // this checks if carts exists and if it doesnt then it will create one 
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id]
        );

        return $cart;
    }


    //################################################################################################################################################################################################################################
    //                                                                                    View my items in cart
    //################################################################################################################################################################################################################################


    public function viewCart()
    {
        $cart = $this->getCart();

        $woodProducts = $cart->certifiedWoods()->withPivot('quantity')->get();
        $metalProducts = $cart->certifiedMetals()->withPivot('quantity')->get();
        $steelProducts = $cart->certifiedSteels()->withPivot('quantity')->get();
        return view('myRoutes.cart', [
            'woodProducts' => $woodProducts,
            'metalProducts' => $metalProducts,
            'steelProducts' => $steelProducts,
            'cart' => $cart
        ]);
    }











    //################################################################################################################################################################################################################################
    //                                                                                          Update
    //################################################################################################################################################################################################################################

    //W                             UPDATE                                            //
    public function update(Request $request, $product)
    {
        $cart = $this->getCart();
        $quantity = $request->quantity;

        // Check if product is wood
        if ($woodProduct = CertfiedWoodProducts::find($product)) {
            $cart->certifiedWoods()->updateExistingPivot($woodProduct->id, [
                'quantity' => $quantity
            ]);
            return back()->with('success', 'Wood product updated');
        }

        // Check if product is metal
        if ($metalProduct = CertifiedMetalProducts::find($product)) {
            $cart->certifiedMetals()->updateExistingPivot($metalProduct->id, [
                'quantity' => $quantity
            ]);
            return back()->with('success', 'Metal product updated');
        }

        // Check if product is metal
        if ($steelProduct = CertfiedSteelProducts::find($product)) {
            $cart->certifiedSteels()->updateExistingPivot($steelProduct->id, [
                'quantity' => $quantity
            ]);
            return back()->with('success', ' steel product updated');
        }

        return back()->with('error', 'Product not found');
    }








    //################################################################################################################################################################################################################################
    //                                                                                          Wood cart logic
    //################################################################################################################################################################################################################################


    //W                             Create                                            //

    public function addWoodToCart(Request $request, CertfiedWoodProducts $product)
    {
        // Auth will check if the user is logged in or not. if "!Auth::check" is ture  then it will display an error message 
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }


        //this is where i go about the Quanity. in this validation "|min:1|" is used to make sure the quanity cannot be 0. 
        // the max quanity is set by the number set in the products quanity as shown here "max:' . $product->quantity"
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity
        ]);



        $cart = $this->getCart(); // this line will ger the reuslt of whatever retured in get cart
        $quantity = $request->quantity; // this line access the property quanity inside of request and stors in in the variable "$quantity"

        //Checks if the product is already in the cart.
        if ($cart->certifiedWoods()->where('certified_wood_product_id', $product->id)->exists()) {

            //this line grabs current quanity 
            $currentQuantity = $cart->certifiedWoods()->find($product->id)->pivot->quantity;

            //this line adds the curent quaniity with the quanity thats alread in the cart
            $newQuantity = $currentQuantity + $quantity;


            // this if statment error you if you try to add more than is availabe in stock/database
            if ($newQuantity > $product->quantity) {
                return back()->with('error', 'Cannot add more than available stock');
            }

            //checks if the product is in cart and if there is enough product to add in to cart from db
            $cart->certifiedWoods()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {
            //if product doesnt exist in cart then it will set up a new porduct with the request quanitiy
            $cart->certifiedWoods()->attach($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }




    //W                             EDIT                                            // finnish this

    public function Woodedit($id)
    {
        $certifiedWoodProducts = CertfiedWoodProducts::findOrFail($id);
        return view('your.edit.view', compact('certifiedWoodProducts'));
    }




    //W                             DELETE                                         //

    public function removeWoodFromCart(CertfiedWoodProducts $product)
    {
        $cart = $this->getCart();
        $cart->certifiedWoods()->detach($product->id);

        return back()->with('success', 'Product removed from cart');
    }






    //################################################################################################################################################################################################################################
    //                                                                                          Metal cart logic
    //################################################################################################################################################################################################################################


    //M                             CREATE                                          //

    public function addMetalToCart(Request $request, CertifiedMetalProducts $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity
        ]);

        $cart = $this->getCart();
        $quantity = $request->quantity;

        if ($cart->certifiedMetals()->where('certified_metal_product_id', $product->id)->exists()) {
            $currentQuantity = $cart->certifiedMetals()->find($product->id)->pivot->quantity;
            $newQuantity = $currentQuantity + $quantity;

            if ($newQuantity > $product->quantity) {
                return back()->with('error', 'Cannot add more than available stock');
            }

            $cart->certifiedMetals()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {
            $cart->certifiedMetals()->attach($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }





    //M                             EDIT                                            // finnish this

    public function Metaledit($id)
    {
        $certifiedMetalProducts = CertifiedMetalProducts::findOrFail($id);
        return view('your.edit.view', compact('certifiedMetalProducts'));
    }





    //M                             DELETE                                          //

    public function removeMetalFromCart(CertfiedWoodProducts $product)
    {
        $cart = $this->getCart();
        $cart->certifiedMetal()->detach($product->id);

        return back()->with('success', 'Product removed from cart');
    }

    //################################################################################################################################################################################################################################
    //                                                                                          Steel cart logic
    //################################################################################################################################################################################################################################


    //S                             CREATE                                          //

    public function addSteelToCart(Request $request, CertfiedSteelProducts $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity
        ]);

        $cart = $this->getCart();
        $quantity = $request->quantity;

        if ($cart->certifiedSteels()->where('certified_steel_product_id', $product->id)->exists()) {
            $currentQuantity = $cart->certifiedSteels()->find($product->id)->pivot->quantity;
            $newQuantity = $currentQuantity + $quantity;

            if ($newQuantity > $product->quantity) {
                return back()->with('error', 'Cannot add more than available stock');
            }

            $cart->certifiedSteels()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {
            $cart->certifiedSteels()->attach($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }





    //S                             EDIT                                            // finnish this

    public function Steeledit($id)
    {
        $certifiedMetalProducts = CertfiedSteelProducts::findOrFail($id);
        return view('your.edit.view', compact('certifiedSteelProducts'));
    }




    //S                             DELETE                                          //

    public function removeSteelFromCart(CertfiedSteelProducts $product)
    {
        $cart = $this->getCart();
        $cart->certifiedSteel()->detach($product->id);

        return back()->with('success', 'Product removed from cart');
    }
}
