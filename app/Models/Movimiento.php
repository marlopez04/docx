<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = "movimientos";
    protected $fillable = ['causa_id','sentencia_id','origen','destino','fecha','motivo','tipo', 'estado', 'archivo', 'usuario_id'];
    

    public function causa()
    {
    	return $this->belongsTo('App\Models\Causa', 'causa_id', 'id');
    }

    public function sentencia()
    {
    	return $this->belongsTo('App\Models\Sentencia', 'sentencia_id', 'id');
    }

    public function origen()
    {
    	return $this->belongsTo('App\Models\Oficina', 'origen', 'id');
    }

    public function destino()
    {
    	return $this->belongsTo('App\Models\Oficina', 'destino', 'id');
    }

    public function usuario()
    {
    	return $this->belongsTo('App\Models\Usuario', 'usuario_id', 'id');
    }

    public function voto()
    {
        return $this->hasMany('App\Models\Voto');
    }




}
