<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;

class TopDogSAuthentication extends Controller
{

    //################################################################################################################################################################################################################################
    //                                                                                          view
    //################################################################################################################################################################################################################################


    public function theTopDogView(): View
    {
        return view('myRoutes.topDogRoutes.topDogAuthSupplierView');
    }



    //################################################################################################################################################################################################################################
    //                                                                                          possword
    //################################################################################################################################################################################################################################



    public function supplierPassword(Request $request): RedirectResponse
    {
        // Password for Supplier
        $predefinedPassword = 'LMAO';

        // Validations
        $request->validate([
            'password' => 'required|string',
        ]);

        // Success check
        if ($request->password === $predefinedPassword) {
            // Redirect to the GET route for /topDogSupplier
            return redirect()->route('myRoutes.topDogRoutes.topDogSupplier');
        } else {
            // Redirect back with an error message
            return redirect()->route('myRoutes.topDogRoutes.topDogAuthSupplierView')->with('error', 'Incorrect password. Please try again.');
        }
    }

    //################################################################################################################################################################################################################################
    //                                                                                          create
    //################################################################################################################################################################################################################################


    public function suppliertopdogCreate(): View
    {
        return view('myRoutes.topDogRoutes.topDogAuthSupplier');
    }





    //################################################################################################################################################################################################################################
    //                                                                                           Store
    //################################################################################################################################################################################################################################


    public function suppliertopdogStore(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'numeric',],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Create the Supplier user
        $Supplier = Supplier::create([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Trigger the Registered event
        event(new Registered($Supplier));

        // Log in the Supplier
        Auth::login($Supplier);

        Auth::guard('supplier')->login($Supplier);

        // Redirect to the dashboard
        return redirect(route('MainTestPage', absolute: false));
    }
}
