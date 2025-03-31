<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CertfiedWoodProducts;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Get or create user's cart
    protected function getCart()
    {
        $user = Auth::user();

        // Find existing cart or create new one
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id]
        );

        return $cart;
    }

    //################################################################################################################################################################################################################################
    //                                                                                      ADD FOR CERTIFIED WOOD 
    //################################################################################################################################################################################################################################


    public function addToCart(Request $request, CertfiedWoodProducts $product)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity
        ]);

        $cart = $this->getCart();
        $quantity = $request->quantity;

        // Check if product already in cart
        if ($cart->certifiedWoods()->where('certified_wood_product_id', $product->id)->exists()) {
            $currentQuantity = $cart->certifiedWoods()->find($product->id)->pivot->quantity;
            $newQuantity = $currentQuantity + $quantity;

            if ($newQuantity > $product->quantity) {
                return back()->with('error', 'Cannot add more than available stock');
            }

            $cart->certifiedWoods()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {
            $cart->certifiedWoods()->attach($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }


    //################################################################################################################################################################################################################################
    //                                                                                          carts view
    //################################################################################################################################################################################################################################



    // View cart
    public function viewCart()
    {
        $cart = $this->getCart();
        $woodProducts = $cart->certifiedWoods()->withPivot('quantity')->get();

        return view('myRoutes.cart', [
            'woodProducts' => $woodProducts,
            'cart' => $cart
        ]);
    }


    public function edit($id)
    {
        $certifiedWoodProducts = CertfiedWoodProducts::findOrFail($id);
        return view('your.edit.view', compact('certifiedWoodProducts'));
    }



    //################################################################################################################################################################################################################################
    //                                                                                          remove
    //################################################################################################################################################################################################################################



    // Remove from cart
    public function removeFromCart(CertfiedWoodProducts $product)
    {
        $cart = $this->getCart();
        $cart->certifiedWoods()->detach($product->id);

        return back()->with('success', 'Product removed from cart');
    }




}
