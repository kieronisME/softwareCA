<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function work()
    {
        return view('myRoutes.work');
    }

}
