<?php

namespace App\Http\Controllers;

use App\Models\Tbloc;
use App\Http\Requests\StoreTblocRequest;
use App\Http\Requests\UpdateTblocRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TblocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code_affaire, $code_site)
    {
        $data = Tbloc::where('code_affaire', '=', $code_affaire)
        ->where('Code_site','=',$code_site)
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
     * @param  \App\Http\Requests\StoreTblocRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTblocRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tbloc  $tbloc
     * @return \Illuminate\Http\Response
     */
    public function show(Tbloc $tbloc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tbloc  $tbloc
     * @return \Illuminate\Http\Response
     */
    public function edit(Tbloc $tbloc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTblocRequest  $request
     * @param  \App\Models\Tbloc  $tbloc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTblocRequest $request, Tbloc $tbloc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tbloc  $tbloc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tbloc $tbloc)
    {
        //
    }
}
