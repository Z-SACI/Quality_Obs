<?php

namespace App\Http\Controllers;

use App\Models\TSites;
use App\Http\Requests\StoreTSitesRequest;
use App\Http\Requests\UpdateTSitesRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TSitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code_affaire)
    {
        $data = TSites::where('Code_Affaire','=',$code_affaire)
        ->get();
        // dd($data);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTSitesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTSitesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TSites  $tSites
     * @return \Illuminate\Http\Response
     */
    public function show(TSites $tSites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TSites  $tSites
     * @return \Illuminate\Http\Response
     */
    public function edit(TSites $tSites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTSitesRequest  $request
     * @param  \App\Models\TSites  $tSites
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTSitesRequest $request, TSites $tSites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TSites  $tSites
     * @return \Illuminate\Http\Response
     */
    public function destroy(TSites $tSites)
    {
        //
    }
}
