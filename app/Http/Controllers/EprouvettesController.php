<?php

namespace App\Http\Controllers;

use App\Models\entreprise_reals;
use App\Models\eprouvettes;
use App\Models\info_affaires;
use App\Models\mode_prods;
use App\Models\prelev_ecras;
use App\Models\Taffaire;
use App\Models\type_eprouvettes;
use Carbon\Carbon;
// use Illuminate\View;
// use Illuminate\Database\Eloquent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\View;
use Redirect, Response;
// use App\Http\Controllers\View;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\Paginator;
// use DataTables;


View::share('projets', info_affaires::on('mysql')->get());
View::share('types', type_eprouvettes::all());
// View::share('prjs', Taffaire::limit(3000)->get());
View::share('modes', mode_prods::all());
View::share('entreprises', entreprise_reals::all());
class EprouvettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function epr_all(eprouvettes $eprouv, $pe_id)
    {
        $eprouv = eprouvettes::where('epr_prelev', '=', $pe_id)
            ->get();
        // dd($eprouv);
        return response()->json($eprouv);
    }

    function getprelev($id_elem)
    {
        $pe = prelev_ecras::where('pe_element', '=', $id_elem)
            ->get(['prelev_ecras.*']);
        // dd($elem);
        return Response::json($pe);
    }

    function eprv_upd(Request $request, eprouvettes $eprv_upd)
    {

        $eprv_upd = eprouvettes::find($request->epr_id);
        $eprv_upd->epr_date_ecras = $request->epr_date_ecras;
        $eprv_upd->epr_type = $request->epr_type;
        $eprv_upd->epr_fci = $request->epr_fci;
        $eprv_upd->update();

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Ajout()
    {
        return view('dashboards.admins.eprouvetteAdd');
    }
    public function new ()
    {
        return view('dashboards.admins.eprouvetteAdd2');
    }
    public function create(Request $request)
    {
        $newepr = new eprouvettes();
        $newepr->epr_ref = $request->epr_ref;
        $newepr->epr_date_ecras = $request->epr_date_ecras;
        $newepr->epr_fci = $request->epr_fci;
        $newepr->epr_prelev = $request->epr_prelev;
        $newepr->epr_type = $request->epr_type;
        $newepr->save();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreeprouvettesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreeprouvettesRequest $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\eprouvettes  $eprouvettes
     * @return \Illuminate\Http\Response
     */
    public function show(eprouvettes $eprouvettes)
    {
        $eprouvettes = eprouvettes::join('type_eprouvettes', 'eprouvettes.epr_type', '=', 'type_eprouvettes.eprv_id')
            ->join('prelev_ecras', 'eprouvettes.epr_prelev', '=', 'prelev_ecras.pe_id')
            ->orderby('eprouvettes.updated_at', 'desc')
            // ->limit(1000)
            ->paginate(10);
            // ->get(['eprouvettes.*','prelev_ecras.*','type_eprouvettes.*']);
            
            // dd($eprouvettes);
            // return DataTables::of($eprouvettes)->make();
            return view('dashboards.admins.listeEprouvettes', compact('eprouvettes'));
    }
    
    // public function showTest(eprouvettes $eprouvettes)
    // {
    //     $eprouvettes = eprouvettes::join('type_eprouvettes', 'eprouvettes.epr_type', '=', 'type_eprouvettes.eprv_id')
    //         ->join('prelev_ecras', 'eprouvettes.epr_prelev', '=', 'prelev_ecras.pe_id')
    //         ->orderby('epr_id', 'desc')
    //         ->limit(1000)
    //         ->get(['eprouvettes.*','prelev_ecras.*','type_eprouvettes.*']);
    //         // ->paginate(10);
    //         // dd($eprouvettes);
    //         // return DataTables::of($eprouvettes)->make();
    //         // return view('dashboards.admins.listeEprouvettes', compact('eprouvettes'));
    //         return response()->json($eprouvettes);
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\eprouvettes  $eprouvettes
     * @return \Illuminate\Http\Response
     */
    public function edit($epr_id)
    {
        $eprouvettes = eprouvettes::where('epr_id', '=', $epr_id)
            ->first(['eprouvettes.*']);
        // dd($eprouvettes);
        return response()->json(['eprouvettes' => $eprouvettes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateeprouvettesRequest  $request
     * @param  \App\Models\eprouvettes  $eprouvettes
     * @return \Illuminate\Http\Response
     */

    public function upd(Request $request)
    {
        $i = 0;
        foreach ($request->epr_id as $epr) {
            $eprouvette = eprouvettes::where('epr_id', '=', $request->epr_id[$i])
                    //  $eprouvette->epr_type= $request->epr_type; 
                ->update([
                    'epr_fci' => $request->epr_fci[$i],
                    'epr_date_ecras' => $request->epr_date_ecras[$i],
                ]);
            $i++;
        }

        return redirect()->back();
    }
    public function update(Request $request,eprouvettes $eprouvette)
    {   
        $eprouvette =DB::table('eprouvettes')
            ->where('eprouvettes.epr_id', $request->epr_id)
            ->update([
                    'epr_fci' => $request->epr_fci,
                    'epr_date_ecras' => $request->epr_date_ecras,
                    'epr_type' => $request->epr_type,
                ]);
            
        //  eprouvettes::where('',$epr_id)->first()
        // ->update([
        //     'epr_fci' => $request->epr_fci,
        //     'epr_date_ecras' => $request->epr_date_ecras,
        //     'epr_type' => $request->epr_type,
        // ]);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\eprouvettes  $eprouvettes
     * @return \Illuminate\Http\Response
     */
    function delete(Request $eprouvette, $epr_id)
    {
        $eprouvette = eprouvettes::where('epr_id', '=', $epr_id);
        $eprouvette->delete();

        return redirect()->back();
    }
}