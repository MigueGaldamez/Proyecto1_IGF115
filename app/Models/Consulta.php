<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//AQUI SE TRABAJA CON EL NOMBRE DE LA TABLA
class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consultas';
    protected $fillable = [
        'idEspecialista',
        'titulo',
        'consulta',
    ];
}