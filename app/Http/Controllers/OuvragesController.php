<?php

namespace App\Http\Controllers;

use App\Models\ouvrages;
use App\Http\Requests\StoreTblocRequest;
use App\Http\Requests\UpdateTblocRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OuvragesController extends Controller
{
    function ouvrages(){
        $data = ouvrages::all();
        // dd($data);

        return view('dashboards.admins.ouvrages', compact('data'));
    }

    public function index($code_affaire, $code_site)
    {
        $data = ouvrages::where('code_affaire', '=', $code_affaire)
        ->where('code_site','=',$code_site)
        ->get();
        // dd($data);
        return response()->json($data);
    }

}
