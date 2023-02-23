<?php

namespace App\Http\Controllers;

use App\Models\elem_ouvrages;
use App\Models\eprouvettes;
use App\Models\prelev_ecras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class groupeController extends Controller
{
    public function store(Request $request)
    {
        error_log($request);
        $existingRecord = elem_ouvrages::where('elem_id', $request->elem_id)->first();
        if (!$existingRecord) {
            $elem_ouvrages = elem_ouvrages::create([
                'elem_id' => $request->elem_id,
                'elem_nom' => $request->elem_nom,
                'elem_bloc' => $request->elem_bloc,
                'elem_site' => $request->elem_site,
                'elem_affaire' => $request->elem_affaire,
            ]);
        }
        // 
        // $existingRecord2 = prelev_ecras::where('pe_id', $request->pe_id)->first();
        // if (!$existingRecord2) {
            $prelev_ecras = DB::table('prelev_ecras')->insertGetId([
                // 'pe_id' => $request->pe_id,
                'pe_entrp_ctc' => 0,
                'pe_date_pv' => $request->pe_date_pv,
                'pe_ref_pv' => $request->pe_ref_pv,
                'pe_date' => $request->pe_date,
                'pe_heure' => $request->pe_heure,
                'pe_local_ech' => $request->pe_local_ech,
                'pe_nbre_prv' => $request->pe_nbre_prv,
                'pe_affais_cone' => $request->pe_affais_cone,
                'pe_gran_prov' => $request->pe_gran_prov,
                'pe_gran_dmax' => $request->pe_gran_dmax,
                'pe_gran_dosage' => $request->pe_gran_dosage,
                'pe_sable_prov' => $request->pe_sable_prov,
                'pe_sable_dosage' => $request->pe_sable_dosage,
                'pe_cim_type' => $request->pe_cim_type,
                'pe_cim_prov' => $request->pe_cim_prov,
                'pe_cim_dosage' => $request->pe_cim_dosage,
                'pe_adj_type' => $request->pe_adj_type,
                'pe_adj_prov' => $request->pe_adj_prov,
                'pe_adj_dosage' => $request->pe_adj_dosage,
                'pe_cim_ec' => $request->pe_cim_ec,
                'pe_obs' => $request->pe_obs,
                'pe_mode_prod' => $request->pe_mode_prod,
                'pe_element' => $request->elem_id,
            ]);
        // $i = 0;
            $get= prelev_ecras::where('id',$prelev_ecras)->first();
        for($i=0; $i<$request->pe_nbre_prv; $i++) {
            // $nextId = app('EprvId');
            $eprouvettes = eprouvettes::create([
                // 'epr_id' => $request->epr_id[$i],
                'epr_entrp_ctc' => 0,
                'epr_ref' => $request->epr_ref[$i],
                'epr_date_ecras' => $request->epr_date_ecras[$i],
                'epr_fci' => $request->epr_fci[$i],
                'epr_type' => $request->epr_type[$i],
                'epr_prelev' => $get->pe_id,
            ]);
            // $i++;
        }
        // dd($get->pe_id);
        return redirect()->route('Eprouvettes')->with('success', 'Element, Prelevement and Eprouvette data inséré avec succés.');
    }

    public function storePvEssais(Request $request)
    {
        error_log($request);
        $existingRecord = elem_ouvrages::where('elem_id', $request->elem_id)->first();
        if (!$existingRecord) {
            $elem_ouvrages = elem_ouvrages::create([
                'elem_id' => $request->elem_id,
                'elem_nom' => $request->elem_nom,
                'elem_bloc' => $request->elem_bloc,
                'elem_site' => $request->elem_site,
                'elem_affaire' => $request->elem_affaire,
            ]);
        }
        // 
        
        $prelev_ecras = DB::table('prelev_ecras')->insertGetId([
        // 'pe_id' => $request->pe_id,
        'pe_entrp_ctc' => 1,
        'pe_date_pv' => $request->pe_date_pv,
        'pe_ref_pv' => $request->pe_ref_pv,
        'pe_date' => $request->pe_date,
        'pe_heure' => $request->pe_heure,
        'pe_local_ech' => $request->pe_local_ech,
        'pe_nbre_prv' => $request->pe_nbre_prv,
        'pe_affais_cone' => $request->pe_affais_cone,
        'pe_gran_prov' => $request->pe_gran_prov,
        'pe_gran_dmax' => $request->pe_gran_dmax,
        'pe_gran_dosage' => $request->pe_gran_dosage,
        'pe_sable_prov' => $request->pe_sable_prov,
        'pe_sable_dosage' => $request->pe_sable_dosage,
        'pe_cim_type' => $request->pe_cim_type,
        'pe_cim_prov' => $request->pe_cim_prov,
        'pe_cim_dosage' => $request->pe_cim_dosage,
        'pe_adj_type' => $request->pe_adj_type,
        'pe_adj_prov' => $request->pe_adj_prov,
        'pe_adj_dosage' => $request->pe_adj_dosage,
        'pe_cim_ec' => $request->pe_cim_ec,
        'pe_obs' => $request->pe_obs,
        'pe_mode_prod' => $request->pe_mode_prod,
        'pe_element' => $request->elem_id,
    ]);
        // $i = 0;
        $get= prelev_ecras::where('id',$prelev_ecras)->first();
        for($i=0; $i<$request->pe_nbre_prv; $i++) {
            $eprouvettes = eprouvettes::create([
                // 'epr_id' => $request->epr_id[$i],
                'epr_entrp_ctc' => 1,
                'epr_ref' => $request->epr_ref[$i],
                'epr_date_ecras' => $request->epr_date_ecras[$i],
                'epr_fci' => $request->epr_fci[$i],
                'epr_type' => $request->epr_type[$i],
                'epr_prelev' => $get->pe_id,
            ]);
            // $i++;
        }
        return redirect()->route('Eprouvettes')->with('success', 'Element, Prelevement and Eprouvette data inséré avec succés.');
    }
}
