<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class elem_ouvrages extends Model
{
    use HasFactory;
    protected $table = 'elem_ouvrages';
   
    protected $fillable = [
        'elem_id','elem_nom','elem_bloc','elem_site','elem_affaire'
    ];
    public function prelev_ecras()
    {
        return $this->hasMany(prelev_ecras::class);
    }
}