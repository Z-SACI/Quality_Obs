<?php

namespace App\Http\Controllers;

use App\Models\elem_ouvrages;
use App\Http\Requests\StoreTblocRequest;
use App\Http\Requests\UpdateTblocRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ElementsController extends Controller
{
    function elements(elem_ouvrages $elemdata, $ouv_id ){
        // $data = elem_ouvrages::all();
        $elemdata = elem_ouvrages::join('ouvrages','elem_ouvrage','=','ouv_id')
        ->where('elem_ouvrage', '=', $ouv_id)
        ->get(['elem_ouvrages.*','ouvrages.ouv_nom','ouvrages.ouv_id']);
        // dd($data);
        return view('dashboards.admins.elements', compact('elemdata'));
    }
    function element_add(Request $request ){
        // $data = elem_ouvrages::all();
        $element = new elem_ouvrages();
        $element->elem_code = $request->elem_code; 
        $element->elem_nom = $request->elem_nom; 
        $element->elem_ouvrage = $request->elem_ouvrage;
        $element->save();

        return redirect()->back()->with('success', 'Enregistré!');
    }

    function element_delete(Request $element, $elem_id ){
        $element = elem_ouvrages::where('elem_id','=',$elem_id);
        $element ->delete();

        return redirect()->back();
    }

    function element_upd(elem_ouvrages $element_data, $elem_id){
        $element_data = elem_ouvrages::where('elem_id','=',$elem_id)
            ->join('ouvrages','elem_ouvrage','=','ouv_id')
            ->first(['elem_ouvrages.*', 'ouvrages.*']);
            // dd($element_data);
        return view('dashboards.admins.elementUpdate', compact('element_data'));
    }

    function element_upd_save(Request $request, $element_save){
        
        $element_save = elem_ouvrages::find($request->elem_id);
        
        $element_save->elem_code = $request->elem_code; 
        $element_save->elem_nom = $request->elem_nom; 
        $element_save->save();
        // dd($element_save);
        return redirect()->back();
    }

    function elem_ouv($code_affaire, $site, $bloc){
        $elements = elem_ouvrages::where('elem_bloc','=',$bloc)
        ->where('elem_site','=',$site)
        ->where('elem_affaire','=',$code_affaire)
        ->get();

        // dd($elements);

        return response()->json($elements);
    }

    function elems($code_affaire, $site){
        $elements = elem_ouvrages::where('elem_affaire_rctc','=',$code_affaire)
        ->where('elem_site_rctc','=',$site)
        ->get();

        // dd($elements);

        return response()->json($elements);
    }

}
