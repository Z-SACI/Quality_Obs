<?php

namespace App\Http\Controllers;

use App\Models\sites;
use App\Http\Requests\StoreTSitesRequest;
use App\Http\Requests\UpdateTSitesRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class sitesController extends Controller
{
    public function index($code_affaire)
    {
        $data = sites::where('code_affaire','=',$code_affaire)
        ->get();
        // dd($data);
        return response()->json($data);
    }
}