<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function adminUserView()
    {
        return view('myRoutes.adminUserView');
    }


    public function supplierUserView()
    {
        return view('myRoutes.supplierUserView');
    }


}
