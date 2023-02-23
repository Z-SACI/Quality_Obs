<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prelev_ecras extends Model
{
    use HasFactory;
    protected $table = 'prelev_ecras';
    public $primaryKey = 'pe_id';
    
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $fillable = [
        'pe_id','id','pe_entrp_ctc','pe_date','pe_date_pv','pe_ref_pv','pe_heure', 'pe_local_ech', 'pe_nbre_prv' ,'pe_affais_cone', 'pe_gran_prov','pe_gran_dmax','pe_gran_dosage', 'pe_sable_prov', 'pe_sable_dosage' ,'pe_cim_type','pe_cim_prov', 'pe_cim_dosage','pe_cim_ec', 'pe_adj_type','pe_adj_prov','pe_adj_dosage', 'pe_obs', 'pe_entreprise', 'pe_mode_prod', 'pe_element'
    ];
}
