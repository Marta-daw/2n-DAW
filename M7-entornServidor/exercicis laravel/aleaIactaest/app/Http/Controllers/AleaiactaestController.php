<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AleaiactaestController extends Controller
{
    
 //Nombre aleatori

    public function index () {

        $nombre = rand (1, 100);

        return view('aleaiactaest', ['nombre' => $nombre]);

    }


}
