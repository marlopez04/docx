<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causa extends Model
{
    use HasFactory;
    
    protected $table = "causas";
    protected $fillable = ['descripcion','id_fuero','numero_expediente','actor_imputado','demandado_victima','objeto_procesal'];
    

    public function fuero()
    {
    	return $this->belongsTo('App\Models\Fuero', 'id_fuero', 'id');
    }

    public function sentencias()
    {
        return $this->hasMany('App\Models\Sentencia');
    }

}
