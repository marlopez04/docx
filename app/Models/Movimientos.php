<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = "movimientos";
    protected $fillable = ['id_sentencia','origen','destino','fecha','motivo', 'id_usuario'];
    

    public function sentencia()
    {
    	return $this->belongsTo('App\Models\Sentencia', 'id_sentencia', 'id');
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
    	return $this->belongsTo('App\Models\Usuario', 'id_usuario', 'id');
    }

    public function voto()
    {
        return $this->hasMany('App\Models\Voto');
    }




}
