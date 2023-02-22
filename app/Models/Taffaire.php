<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taffaire extends Model
{
    use HasFactory;
    protected $connection = 'sqlserver';
    protected $table="dbo.Taffaire";
}
