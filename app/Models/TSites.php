<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSites extends Model
{
    use HasFactory;
    protected $connection = 'sqlserver';
    protected $table="dbo.TSites";
}
