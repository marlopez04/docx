<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    use HasFactory;

    protected $table = "votoss";
    protected $fillable = ['sentencia_id','direccion_archivo','tipo','movimiento_id'];
    

    public function sentencia()
    {
    	return $this->belongsTo('App\Models\Sentencia', 'sentencia_id', 'id');
    }

    public function usuario()
    {
    	return $this->belongsTo('App\Models\Usuario', 'usuario_id', 'id');
    }

    public function movimiento()
    {
    	return $this->belongsTo('App\Models\Movimiento', 'movimiento_id', 'id');
    }


}
