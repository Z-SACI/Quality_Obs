<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eprouvettes extends Model
{
    
    use HasFactory;
    // protected $connection = 'mysql';
    // public $primaryKey = 'epr_id';
    protected $table = 'eprouvettes';
    // protected $primaryKey="epr_id";
    protected $fillable = [
        'epr_id','epr_entrp_ctc','epr_ref', 'epr_date_ecras', 'epr_fci', 'epr_prelev', 'epr_type',
    ];
    public function eprouvettes()
    {
        return $this->hasMany(eprouvettes::class);
    }
}
