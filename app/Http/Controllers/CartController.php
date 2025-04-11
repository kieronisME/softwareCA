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
        // Check if user is logged in via any guard
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $cart = Cart::firstOrCreate(['admin_id' => $user->id]);
        } 
        elseif (Auth::guard('supplier')->check()) {
            $user = Auth::guard('supplier')->user();
            $cart = Cart::firstOrCreate(['supplier_id' => $user->id]);
        }
        elseif (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        }
        else {
            // If no user is authenticated, redirect to login
            return redirect()->route('myRoutes.wood');
        }
    
        return $cart;
    }


    //################################################################################################################################################################################################################################
    //                                                                                    View my items in cart
    //################################################################################################################################################################################################################################

    //this function is whati will use to calc the total for everything in my table 
    private function calculateSubtotal($products)
    {
        return $products->sum(function ($product) {
            //GRABS its price from each product and times it by qunitity
            return $product->Price * $product->pivot->quantity;
        });
    }




    public function viewCart()
    {
        $cart = $this->getCart();

        //certified 
        $woodProducts = $cart->certifiedWoods()->withPivot('quantity')->get();
        $metalProducts = $cart->certifiedMetals()->withPivot('quantity')->get();
        $steelProducts = $cart->certifiedSteels()->withPivot('quantity')->get();



        //not certified
        $notCertWoodProducts = $cart->notCertifiedWoods()->withPivot('quantity')->get();
        $notCertMetalProducts = $cart->notcertifiedMetal()->withPivot('quantity')->get();
        $notCertSteelProducts = $cart->notcertifiedSteel()->withPivot('quantity')->get();

        //stores totals 
        $woodSubtotal = $this->calculateSubtotal($woodProducts);
        $metalSubtotal = $this->calculateSubtotal($metalProducts);
        $steelSubtotal = $this->calculateSubtotal($steelProducts);
        $notCertWoodSubtotal = $this->calculateSubtotal($notCertWoodProducts);
        $notCertMetalSubtotal = $this->calculateSubtotal($notCertMetalProducts);
        $notCertSteelSubtotal = $this->calculateSubtotal($notCertSteelProducts);

        //adds up all totals an stores them in total price
        $TotalPrice = $woodSubtotal + $metalSubtotal + $steelSubtotal
            + $notCertWoodSubtotal + $notCertMetalSubtotal + $notCertSteelSubtotal;




        return view('myRoutes.cart', [
            //certified 
            'woodProducts' => $woodProducts,
            'metalProducts' => $metalProducts,
            'steelProducts' => $steelProducts,

            //not certified
            'notCertWoodProducts' => $notCertWoodProducts,
            'notCertMetalProducts' => $notCertMetalProducts,
            'notCertSteelProducts' => $notCertSteelProducts,



            // subtotals
            'woodSubtotal' => $woodSubtotal,
            'metalSubtotal' => $metalSubtotal,
            'steelSubtotal' => $steelSubtotal,
            'notCertWoodSubtotal' => $notCertWoodSubtotal,
            'notCertMetalSubtotal' => $notCertMetalSubtotal,
            'notCertSteelSubtotal' => $notCertSteelSubtotal,

            // grand total
            'grandTotal' => $TotalPrice,
            'cart' => $cart
        ]);
    }












    //################################################################################################################################################################################################################################
    //                                                                                          Wood cart logic
    //################################################################################################################################################################################################################################


    //W                             Create                                           //
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






    //W                             DELETE                                          //
    public function removeWoodFromCart(CertfiedWoodProducts $product)
    {
        $cart = $this->getCart(); // like i said before this line will get the reuslt of what retured in get getCart function
        $cart->certifiedWoods()->detach($product->id);
        // this line detaches the wood product from the pivoit table. its not actaully delteing it (i dont know how to do that) but to the user it looks its been delted


        return back()->with('success', 'Product removed from cart');
    }


    //W                             Update                                         //

    public function Woodupdate(Request $request, $productId)
    {
        $cart = $this->getCart(); // grabs whatever returend from getCart function
        $quantity = $request->quantity; // makes the vairbale quanitry whaterver the quanitiy was in the form submitted 

        // Validates quantity
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // this line uses laravel magic (like alot of things in this) to find the product and the id its tied to in the DB  
        if ($woodProducts = CertfiedWoodProducts::find($productId)) {

            //updates pivoit table
            $cart->certifiedWoods()->updateExistingPivot($woodProducts->id, [
                'quantity' => $quantity
            ]);
            return back();
        }

        return back();
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





    //M                             DELETE                                          //


    public function removeMetalFromCart(CertifiedMetalProducts $product)
    {
        $cart = $this->getCart();
        $cart->certifiedMetals()->detach($product->id);
        return back()->with('success', 'Product removed from cart');
    }




    //M                             Update                                         //

    public function Metalupdate(Request $request, $productId)
    {
        $cart = $this->getCart();
        $quantity = $request->quantity;

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);


        if ($metalProducts = CertifiedMetalProducts::find($productId)) {

            $cart->certifiedMetals()->updateExistingPivot($metalProducts->id, [
                'quantity' => $quantity
            ]);
            return back();
        }

        return back();
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




    //S                             DELETE                                          //

    public function removeSteelFromCart(CertfiedSteelProducts $product)
    {
        $cart = $this->getCart();
        $cart->certifiedSteels()->detach($product->id);

        return back()->with('success', 'Product removed from cart');
    }




    //S                             UPDATE                                         //

    public function Steelupdate(Request $request, $productId)
    {
        $cart = $this->getCart();
        $quantity = $request->quantity;

        // Validate quantity
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);


        if ($steelProducts = CertfiedSteelProducts::find($productId)) {

            $cart->certifiedSteels()->updateExistingPivot($steelProducts->id, [
                'quantity' => $quantity
            ]);
            return back();
        }

        return back();
    }




    /////////////////////////////////////////////////////////////////////////////////           ↓ NOT CERTIFIED PRODUCTS ↓           ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////           ↓ NOT CERTIFIED PRODUCTS ↓           ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////           ↓ NOT CERTIFIED PRODUCTS ↓           ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////           ↓ NOT CERTIFIED PRODUCTS ↓           ///////////////////////////////////////////////////////////////////////////////////////////////////






    //################################################################################################################################################################################################################################
    //                                                                                          NWood cart logic
    //################################################################################################################################################################################################################################


    //nW                             Create                                          //

    public function addNWoodToCart(Request $request, NotCertfiedWoodProducts $product)
    {


        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|'
        ]);



        $cart = $this->getCart();
        $quantity = $request->quantity;


        if ($cart->notCertifiedWoods()->where('not_certified_wood_product_id', $product->id)->exists()) {


            $currentQuantity = $cart->notCertifiedWoods()->find($product->id)->pivot->quantity;


            $newQuantity = $currentQuantity + $quantity;



            if ($newQuantity > $product->quantity) {
                return back()->with('error', 'Cannot add more than available stock');
            }


            $cart->notCertifiedWoods()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {

            $cart->notCertifiedWoods()->attach($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }



    //nW                             DELETE                                         //

    public function removeNWoodFromCart(NotCertfiedWoodProducts $product)
    {
        $cart = $this->getCart();
        $cart->notCertifiedWoods()->detach($product->id);

        return back()->with('success', 'Product removed from cart');
    }



    //nW                             UPDATE                                         //
    public function Nupdate(Request $request, $productId)
    {
        $cart = $this->getCart();
        $quantity = $request->quantity;


        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);


        if ($notCertWoodProduct = notCertfiedWoodProducts::find($productId)) {

            $cart->notCertifiedWoods()->updateExistingPivot($notCertWoodProduct->id, [
                'quantity' => $quantity
            ]);
            return back()->with('success', 'Non-certified wood product updated');
        }

        return back()->with('error', 'Product not found in any category');
    }









    //################################################################################################################################################################################################################################
    //                                                                                          NMetal cart logic
    //################################################################################################################################################################################################################################


    //nM                             Create                                            //

    public function addNMetalToCart(Request $request, NotCertfiedMetalProducts $product)
    {


        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }


        $request->validate([
            'quantity' => 'required|integer|min:1|'
        ]);



        $cart = $this->getCart();
        $quantity = $request->quantity;


        if ($cart->notCertifiedMetal()->where('not_certified_metal_product_id', $product->id)->exists()) {

            $currentQuantity = $cart->notCertifiedmetal()->find($product->id)->pivot->quantity;


            $newQuantity = $currentQuantity + $quantity;

            if ($newQuantity > $product->quantity) {
                return back()->with('error', 'Cannot add more than available stock');
            }


            $cart->notCertifiedmetal()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {

            $cart->notCertifiedmetal()->attach($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }



    //nM                             DELETE                                         //

    public function removeNMetalFromCart(NotCertfiedMetalProducts $notCertMetalproduct)
    {
        $cart = $this->getCart();
        $cart->notCertifiedMetal()->detach($notCertMetalproduct->id);
        return back()->with('success', 'Product removed from cart');
    }

    //nM                             UPDATE                                         //

    public function NMetalupdate(Request $request, $productId)
    {
        $cart = $this->getCart();
        $request->validate(['quantity' => 'required|integer|min:1']);
    
        if ($product = NotCertfiedMetalProducts::find($productId)) {
            $cart->notCertifiedMetal()->updateExistingPivot($product->id, [
                'quantity' => $request->quantity
            ]);
            return back()->with('success', 'Quantity updated');
        }
        return back()->with('error', 'Product not found');
    }





    //################################################################################################################################################################################################################################
    //                                                                                          NSteel cart logic
    //################################################################################################################################################################################################################################


    //nS                             Create                                            //

    public function addNSteelToCart(Request $request, notCertfiedSteelProducts $product)
    {


        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }


        $request->validate([
            'quantity' => 'required|integer|min:1|'
        ]);



        $cart = $this->getCart();
        $quantity = $request->quantity;


        if ($cart->notCertifiedSteel()->where('not_certified_steel_product_id', $product->id)->exists()) {

            $currentQuantity = $cart->notCertifiedSteel()->find($product->id)->pivot->quantity;

            $newQuantity = $currentQuantity + $quantity;


            if ($newQuantity > $product->quantity) {
                return back()->with('error', 'Cannot add more than available stock');
            }


            $cart->notCertifiedSteel()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {

            $cart->notCertifiedSteel()->attach($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }



    //nW                             DELETE                                         //

    public function removeNSteelFromCart(NotCertfiedSteelProducts $product)
    {
        $cart = $this->getCart();
        $cart->notCertifiedSteel()->detach($product->id);

        return back()->with('success', 'Product removed from cart');
    }



    //nW                             UPDATE                                         //
    public function NSteelupdate(Request $request, $productId)
    {
        $cart = $this->getCart();
        $request->validate(['quantity' => 'required|integer|min:1']);
    
        if ($product = NotCertfiedSteelProducts::find($productId)) {
            $cart->notCertifiedSteel()->updateExistingPivot($product->id, [
                'quantity' => $request->quantity
            ]);
            return back()->with('success', 'Quantity updated');
        }
        return back()->with('error', 'Product not found');
    }
}
