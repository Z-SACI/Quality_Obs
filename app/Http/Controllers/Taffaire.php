<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Taffaire extends Controller
{
    
    function show(){
        $data = Taffaire::all();
        dd($data);

        // return view('dashboards.admins.ouvrages', compact('data'));
    }
}
