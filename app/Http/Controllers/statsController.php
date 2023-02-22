<?php

namespace App\Http\Controllers;

use App\Models\eprv_agence;
use App\Models\info_affaires;
use App\Models\prj_cat;
use App\Models\User;
use App\Models\rqb;
use App\Models\eprv_entrp_ctc;
use App\Models\eprv_entrp_entrp;
use App\Models\moy_rqb_ctc;
use App\Models\moy_rqb_entrp;
use App\Models\nbr28_eprv3;
use App\Models\ouvrages;
use App\Models\prj_carr_gran3;
use App\Models\prj_carr_sable3;
use App\Models\prj_cim_type3;
use App\Models\rqb_entrp;
use App\Models\sites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

View::share('eprv_agence', eprv_agence::all());


class statsController extends Controller
{
    function n_prj_drs(){
        // used for filters
        $user_dr = auth()->user()->direction;

        // nombre de projets par DR
        $projectnumbers=info_affaires::join('agences', 'agences.agn_id','=','info_affaires.prj_agence')->
        where('agn_dr','=',$user_dr)->get();
        $countcomplet= count($projectnumbers);

        // nombre de sites par DR
        $projectsites=sites::join('info_affaires', 'sites.site_prj','=','info_affaires.prj_nconvention')
        ->join('agences', 'agences.agn_id','=','info_affaires.prj_agence')
        ->where('agn_dr','=',$user_dr)->get();
        $countsites= count($projectsites);

        // nombre de blocs
        $projectblocs=ouvrages::join('sites', function($join){
            $join->on('ouvrages.code_site','=','sites.code_site');
            $join->on('ouvrages.code_affaire','=','sites.code_affaire');
        })
        ->join('info_affaires', 'sites.site_prj','=','info_affaires.prj_nconvention')
        ->join('agences', 'agences.agn_id','=','info_affaires.prj_agence')
        ->where('agn_dr','=',$user_dr)->get();
        $countblocs= count($projectblocs);


        // Nombre d'eprouvettes par agence filtered by DR
        $eprv_agences=eprv_agence::where('agn_dr','=',$user_dr )
        ->get();
        $eprv_agence = [];
        $agns = [];
        foreach($eprv_agences as $agn){
            $eprv_agence[] = $agn['nbre_eprv'];
            $agns[] = $agn['nom_agence'];
        }
        // Nombre d'eprouvettes par ctc filtered by DR
        $eprv_agences_ctc=eprv_entrp_ctc::where('agn_dr','=',$user_dr )
        ->get();
        $eprv_agence_ctc = [];
        foreach($eprv_agences_ctc as $agn){
            $eprv_agence_ctc[] = $agn['nbre_eprv'];
        }
        // Nombre d'eprouvettes par entreprise filtered by DR
        $eprv_agences_entrp=eprv_entrp_entrp::where('agn_dr','=',$user_dr )
        ->get();
        $eprv_agence_entrp = [];
        foreach($eprv_agences_entrp as $agn){
            $eprv_agence_entrp[] = $agn['nbre_eprv'];
        }

        // nbr de projet par cat filtered by DR
        $prj_cats=prj_cat::where('agn_dr','=',$user_dr )
        ->get();

        $prj_cat = [];
        $cats = [];
        foreach($prj_cats as $catp){
            $prj_cat[] = $catp['nbre_affaires'];
            $cats[] = $catp['categorie'];
        }
// COME BACK ICI
        $nbr_28=nbr28_eprv3::all();

        $nbr3= [];
        $entrps = [];
        foreach($nbr_28 as $nbr){
            $nbr3[] = $nbr['count'];
            $entrps[] = $nbr['epr_entrp_ctc'];
        }

        $nbr_carr_gran=prj_carr_gran3::all();

        $nbrgran= [];
        $carrs = [];
        foreach($nbr_carr_gran as $nbr){
            $nbrgran1[] = $nbr['nbr_carr'];
            $carrs1[] = $nbr['pe_gran_prov'];
        }
        for($i=0; $i<10; $i++){
            $nbrgran[] =$nbrgran1[$i]; 
            $carrs[] =$carrs1[$i];
        }
    
        
        $nbr_carr_sabl=prj_carr_sable3::all();

        $nbrsable= [];
        $carrsab = [];
        foreach($nbr_carr_sabl as $nbr){
            $nbrsab1[] = $nbr['nbr_carr'];
            $carrsab1[] = $nbr['pe_sable_prov'];
        }

        for($i=0; $i<10; $i++){
            $nbrsab[] =$nbrsab1[$i]; 
            $carrsab[] =$carrsab1[$i];
        }
        
        $prj_cim=prj_cim_type3::all();

        $prj_typ= [];
        $typcim = [];
        foreach($prj_cim as $nbr){
            $prj_typ[] = $nbr['count(DISTINCT ouvrages.code_affaire)'];
            $typcim[] = $nbr['pe_cim_type'];
        }

        $rqb_ctc=rqb::where('agn_dr','=',$user_dr )
        ->get();
        $rqbs=[];
        foreach($rqb_ctc as $rqbc){
            $rqbs[] = $rqbc['rqb_ctc'];
        }
        $maxctc= max($rqbs);
        $roundctc=ceil($maxctc);
        $int=[];
        $nrqbs=[];
        for($i=0;$i<=$roundctc; $i=$i+0.2){
            $j=$i+0.2;
            $text='['.$i.'-'.$j.']';
            $int[]=$text;
            $count=0;
            for($k=0;$k<count($rqbs);$k++){
                if($rqbs[$k]>=$i && $rqbs[$k]<$j){
                    $count++;
                }
            }
            $nrqbs[]=$count;
        }
        $add=0;
        for($k=0;$k<count($rqbs);$k++){
            $add=$add+$rqbs[$k];
        }
        $moy=$add/count($rqbs);
        $nbr=[];
        for($i=0;$i<=$roundctc; $i=$i+0.2){
            $j=$i+0.2;
            if($moy>=$i && $moy<$j){
                    $nbr[]=max($nrqbs);
            }else{
                $nbr[]=0;
            }
        }
        $nrqbs5=[];
        for($i=0; $i<5; $i++){
            if(count($int)>=5){
                $nrqbs5[]=$nrqbs[$i];
            }
        }

        // RQB entreprise by DR
        $rqb_entrp=rqb_entrp::where('agn_dr','=',$user_dr )
        ->get();
            // get all rqbs e
        $rqbse=[];
        foreach($rqb_entrp as $rqbce){
            $rqbse[] = $rqbce['rqb_entrp'];
        }
            // max value round
        $maxentrp= max($rqbse);
        $roundentrp=ceil($maxentrp);
            // init intervals et nombre de rqb entreprise
        $intentrp=[];
        $nrqbse=[];
            // remplissage des intervals et rqbs 
        for($i=0;$i<=$roundentrp; $i=$i+0.2){
            $j=$i+0.2;
            $textentrp='['.$i.'-'.$j.']';
            $intentrp[]=$textentrp;
            // init count d'eprouvettes 0
            $count=0;
            // count des eprouvettes par interval
            for($k=0;$k<count($rqbse);$k++){
                if($rqbse[$k]>=$i && $rqbse[$k]<$j){
                    $count++;
                }
            }
            $nrqbse[]=$count;
        }
        // addition
        $addentrp=0;
        for($k=0;$k<count($rqbse);$k++){
            $addentrp=$addentrp+$rqbse[$k];
        }
        // moyenne
        $moyentrp=$addentrp/count($rqbse);
        // moyenne vecteur
        $nbrentrp=[];
        for($i=0;$i<=$roundentrp; $i=$i+0.2){
            $j=$i+0.2;
            if($moyentrp>=$i && $moyentrp<$j){
                    $nbrentrp[]=max($nrqbse);
            }else{
                $nbrentrp[]=0;
            }
        }
        // table
        $nrqbse5=[];
        for($i=0; $i<5; $i++){
            if(count($intentrp)>=5){
                $nrqbse5[$i]=$nrqbse[$i];
            }
        }

        // RQB par mode de prod
        $mp_ctc=moy_rqb_ctc::where('agn_dr','=',$user_dr )
        ->get();
        $mp_entrp=moy_rqb_entrp::where('agn_dr','=',$user_dr )
        ->get();
        // dd($mp_moy_p);
        return view('dashboards.admins.index', compact('mp_entrp','mp_ctc','eprv_agence_entrp','eprv_agence_ctc','countblocs','countsites','countcomplet', 'rqbse','rqbs','nrqbse5','nbrentrp','roundentrp','nrqbse','intentrp','nrqbs5','nbr','roundctc','nrqbs','int','typcim','prj_typ','nbrsab','carrsab','carrs','nbrgran','entrps','nbr3','agns','eprv_agence','cats','prj_cat'));
    }
}
