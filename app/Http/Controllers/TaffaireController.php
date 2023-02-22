<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaffaireRequest;
use App\Http\Requests\UpdateTaffaireRequest;
use App\Models\Taffaire;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaffaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Taffaire::limit(10)->get();
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
     * @param  \App\Http\Requests\StoreTaffaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaffaireRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taffaire  $taffaire
     * @return \Illuminate\Http\Response
     */
    public function show(Taffaire $taffaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taffaire  $taffaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Taffaire $taffaire)
    {
        $ouvrages = "";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaffaireRequest  $request
     * @param  \App\Models\Taffaire  $taffaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaffaireRequest $request, Taffaire $taffaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taffaire  $taffaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taffaire $taffaire)
    {
        //
    }
}
