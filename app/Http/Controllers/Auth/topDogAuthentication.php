<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;

class TopDogAuthentication extends Controller
{
    /**
     * Display the authentication form.
     */
    public function theTopDogView(): View
    {
        return view('myRoutes.topDogRoutes.topDogAuth');
    }




    

    /**
     * Handle the admin password authentication.
     */
    public function adminPassword(Request $request): RedirectResponse
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

    /**
     * Display the admin creation form.
     */
    public function topdogCreate(): View
    {
        return view('myRoutes.topDogRoutes.topDogAdmin');
    }

    /**
     * Handle the admin creation form submission.
     */
    public function topdogStore(Request $request): RedirectResponse
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

        // Create the admin user
        $admin = Admin::create([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Trigger the Registered event
        event(new Registered($admin));

        // Log in the admin
        Auth::login($admin);

        Auth::guard('admin')->login($admin);

        // Redirect to the dashboard
        return redirect(route('MainTestPage', absolute: false));
    }
}