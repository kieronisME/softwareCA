<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TopDogAuthentication extends Controller
{
    public function theTopDogView()
    {
        return view('myRoutes.topDogRoutes.topDogAuth');
    }



    public function adminPassword(Request $request)
    {
        // Password for admin
        $predefinedPassword = 'lmao';
    
        // Validations
        $request->validate([
            'password' => 'required|string',
        ]);
    
        // Success check
        if ($request->password === $predefinedPassword) {
            // Redirect to the GET route for /topDogAdmin
            return redirect()->route('myRoutes.topDogRoutes.topDogAdmin');
        } else {
            // Redirect back with an error message
            return redirect()->route('myRoutes.topDogRoutes.topDogAuth')->with('error', 'Incorrect password. Please try again.');
        }
    }

}
