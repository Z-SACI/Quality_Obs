<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeinfo_affairesRequest;
use App\Http\Requests\Updateinfo_affairesRequest;
use App\Models\agences;
use App\Models\drs;
use App\Models\info_affaires;
use App\Models\sites;
use Illuminate\Support\Facades\View;

View::share('sites', sites::join('cat_chantier','sites.site_cat','=','cat_chantier.cat_id')
->join('entreprise_reals','sites.site_entreprise','=','entreprise_reals.er_id')
->get(['sites.*','cat_chantier.*','entreprise_reals.*']));
class InfoAffairesController extends Controller
{
    public function index()
    {
        $prj = info_affaires::join('agences', 'info_affaires.prj_agence', '=', 'agences.agn_id')
            ->join('drs', 'agences.agn_dr', '=', 'drs.dr_id')
            ->get(['info_affaires.*','agences.*','drs.*']);
            
        return view('dashboards.admins.infoAffaires',compact('prj'));
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
     * @param  \App\Http\Requests\Storeinfo_affairesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeinfo_affairesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\info_affaires  $info_affaires
     * @return \Illuminate\Http\Response
     */
    public function show(info_affaires $info_affaires)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\info_affaires  $info_affaires
     * @return \Illuminate\Http\Response
     */
    public function edit(info_affaires $info_affaires)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateinfo_affairesRequest  $request
     * @param  \App\Models\info_affaires  $info_affaires
     * @return \Illuminate\Http\Response
     */
    public function update(Updateinfo_affairesRequest $request, info_affaires $info_affaires)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\info_affaires  $info_affaires
     * @return \Illuminate\Http\Response
     */
    public function destroy(info_affaires $info_affaires)
    {
        //
    }
}
