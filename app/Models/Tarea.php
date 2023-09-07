<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','fecha_inicio','fecha_fin','asignado_a'];

    public $timestamps = true;
}
