<?php

namespace App\Http\Controllers;

use App\Models\elem_ouvrages;
use App\Models\eprouvettes;
use App\Models\info_affaires;
use App\Models\mode_prods;
use App\Models\ouvrages;
use App\Models\prelev_ecras;
use App\Models\sites;
use App\Models\entreprise_reals;
use App\Models\type_eprouvettes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Redirect,Response;


View::share('modes', mode_prods::all());
View::share('entreprises', entreprise_reals::all());
View::share('projets', info_affaires::all());
View::share('eprouvettes',eprouvettes::join('type_eprouvettes','eprouvettes.epr_type','=','type_eprouvettes.eprv_id')->get(['type_eprouvettes.*', 'eprouvettes.*']));
class PrelevementsController extends Controller
{
    function prelevements(prelev_ecras $prelevdata, $elem_id ){
        // $data = elem_ouvrages::all();
        $prelevdata = prelev_ecras::join('elem_ouvrages','prelev_ecras.pe_element','=','elem_ouvrages.elem_id')
        ->join('mode_prods','prelev_ecras.pe_mode_prod','=','mode_prods.mode_id')
        ->where('pe_element', '=', $elem_id)
        ->where('pe_entreprise','=',NULL)
        ->get(['prelev_ecras.*','elem_ouvrages.*','mode_prods.*']);
        // dd($prelevdata);
        return view('dashboards.admins.prelevements', compact('prelevdata'));
    }

    function index($pe_element){
        // $data = elem_ouvrages::all();
        $prelevdata = prelev_ecras::where('pe_element','=',$pe_element)
        ->get();
        return response()->json($prelevdata);
    }
    function prelev_entreprise(prelev_ecras $prelevdata, $elem_id ){
        // $data = elem_ouvrages::all();
        $prelevdata = prelev_ecras::join('elem_ouvrages','prelev_ecras.pe_element','=','elem_ouvrages.elem_id')
        ->join('mode_prods','prelev_ecras.pe_mode_prod','=','mode_prods.mode_id')
        ->where('pe_element', '=', $elem_id)
        ->where('pe_entreprise','!=',NULL)
        ->get(['prelev_ecras.*','elem_ouvrages.*','mode_prods.*']);
        // dd($prelevdata);
        return view('dashboards.admins.prelevementsEntreprise', compact('prelevdata'));
    }

    function prelevement_add(Request $request){
        
        $newelem = new prelev_ecras();
        $newelem->pe_date = $request->pe_date; 
        $newelem->pe_affais_cone = $request->pe_affais_cone; 
        $newelem->pe_gran_prov = $request->pe_gran_prov;
        $newelem->pe_gran_dmax = $request->pe_gran_dmax; 
        $newelem->pe_sable_prov = $request->pe_sable_prov; 
        $newelem->pe_cim_type = $request->pe_cim_type; 
        $newelem->pe_cim_prov = $request->pe_cim_prov; 
        $newelem->pe_cim_ec = $request->pe_cim_ec; 
        $newelem->pe_obs = $request->pe_obs; 
        $newelem->pe_mode_prod = $request->pe_mode_prod; 
        $newelem->pe_entreprise = $request->pe_entreprise; 
        // $newelem->pe_cim_entreprise = $request->pe_; 
        $newelem->pe_element = $request->pe_element; 
        $newelem->save();

        return redirect()->back();
    }

    function prelevement_delete(Request $prelevement, $pe_id ){
        $prelevement = prelev_ecras::where('pe_id','=',$pe_id);
        $prelevement ->delete();

        return redirect()->back();
    }

    function show(){
        $prelevements = prelev_ecras::join('elem_ouvrages','prelev_ecras.pe_element','=','elem_ouvrages.elem_id')
        ->join('ouvrages', function($join){
            $join->on('elem_ouvrages.elem_affaire','=','ouvrages.code_affaire');
            $join->on('elem_ouvrages.elem_site','=','ouvrages.code_site');
            $join->on('elem_ouvrages.elem_bloc','=','ouvrages.code_bloc');} )
        ->join('mode_prods','prelev_ecras.pe_mode_prod','=','mode_prods.mode_id')
        ->where('pe_entrp_ctc','=','0')
        ->orderby('pe_id', 'desc')
        // ->get(['prelev_ecras.*','elem_ouvrages.*','mode_prods.*','ouvrages.*']);
        ->paginate(10);
        return view('dashboards.admins.listePrelevements', compact('prelevements'));
    }


    function showpv(){
        $prelevements = prelev_ecras::join('elem_ouvrages','prelev_ecras.pe_element','=','elem_ouvrages.elem_id')
        ->join('ouvrages', function($join){
            $join->on('elem_ouvrages.elem_affaire','=','ouvrages.code_affaire');
            $join->on('elem_ouvrages.elem_site','=','ouvrages.code_site');
            $join->on('elem_ouvrages.elem_bloc','=','ouvrages.code_bloc');} )
        ->join('mode_prods','prelev_ecras.pe_mode_prod','=','mode_prods.mode_id')
        ->where('pe_entrp_ctc','=','1')
        // ->limit(3000)
        ->orderby('pe_id', 'desc')
        // ->get(['prelev_ecras.*','elem_ouvrages.*','mode_prods.*','ouvrages.*']);
        ->paginate(10);
        return view('dashboards.admins.listePrelevements', compact('prelevements'));
    }
    function prelevement_get($pe_id){
        $prelevement_get = prelev_ecras::join('mode_prods','prelev_ecras.pe_mode_prod','=','mode_prods.mode_id')
        ->where('pe_id','=',$pe_id)
        ->first(['prelev_ecras.*','mode_prods.*']);
        return response()->json([
            'prelev_ecras'=>$prelevement_get,
        ]);
    }

    function getSite( $id){
        $res = sites::where('site_prj','=',$id)
        ->get(['sites.*']);
        // dd($res);
        return Response::json($res);
    }

    function getOuvrage($id_site){
        $ouv = ouvrages::where('ouv_site','=',$id_site)
        ->get(['ouvrages.*']);
        // dd($ouv);
        return Response::json($ouv);
    }

    function getElem($id_ouv){
        $elem = elem_ouvrages::where('elem_bloc_rctc','=',$id_ouv)
        ->get(['elem_ouvrages.*']);
        // dd($elem);
        return Response::json($elem);
    }

    function prelevement_upd(Request $request,prelev_ecras $prelev_upd){

        $prelev_upd = prelev_ecras::find($request->pe_id);
        
        $prelev_upd->pe_date = $request->pe_date; 
        $prelev_upd->pe_affais_cone = $request->pe_affais_cone; 
        $prelev_upd->pe_gran_prov = $request->pe_gran_prov;
        $prelev_upd->pe_gran_dmax = $request->pe_gran_dmax; 
        $prelev_upd->pe_sable_prov = $request->pe_sable_prov;
        $prelev_upd->pe_cim_type = $request->pe_cim_type;
        $prelev_upd->pe_cim_prov = $request->pe_cim_prov; 
        $prelev_upd->pe_cim_ec = $request->pe_cim_ec; 
        // $prelev_upd->pe_obs = $request->pe_obs; 
        $prelev_upd->pe_mode_prod = $request->pe_mode_prod; 
        $prelev_upd->update();

        return redirect()->back();
    }
}
