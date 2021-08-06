<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    use HasFactory;

    protected $table = "votoss";
    protected $fillable = ['id_sentencia','direccion_archivo','tipo','id_movimiento'];
    

    public function sentencia()
    {
    	return $this->belongsTo('App\Models\Sentencia', 'id_sentencia', 'id');
    }

    public function usuario()
    {
    	return $this->belongsTo('App\Models\Usuario', 'id_usuario', 'id');
    }

    public function movimiento()
    {
    	return $this->belongsTo('App\Models\Movimiento', 'id_movimiento', 'id');
    }


}
