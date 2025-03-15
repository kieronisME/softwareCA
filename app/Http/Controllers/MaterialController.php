<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{

    //certfied
    public function wood()
    {
        return view('myRoutes.certProd.wood');

    }

    public function metal()
    {
        return view('myRoutes.certProd.metal');
    }


    public function steel()
    {
        return view('myRoutes.certProd.steel');
    }


    //not certfied
    public function Nwood()
    {
        return view('myRoutes.notCertProd.Nwood');
    }


    public function Nmetal()
    {
        return view('myRoutes.notCertProd.Nmetal');
    }


    public function Nsteel()
    {
        return view('myRoutes.notCertProd.Nsteel');
    }


}
