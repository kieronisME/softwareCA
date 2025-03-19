<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertfiedWoodProducts;

class MaterialController extends Controller
{

    //certfied
    public function wood()
    {
        $woodProducts = CertfiedWoodProducts::all();

        // Pass the data to the view
        return view('myRoutes.certProd.wood', compact('woodProducts'));

    }

    // public function metal()
    // {
    //     return view('myRoutes.certProd.metal');
    // }


    // public function steel()
    // {
    //     return view('myRoutes.certProd.steel');
    // }


    // //not certfied
    // public function Nwood()
    // {
    //     return view('myRoutes.notCertProd.Nwood');
    // }


    // public function Nmetal()
    // {
    //     return view('myRoutes.notCertProd.Nmetal');
    // }


    // public function Nsteel()
    // {
    //     return view('myRoutes.notCertProd.Nsteel');
    // }


}
