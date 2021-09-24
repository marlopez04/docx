<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causa extends Model
{
    use HasFactory;
    
    protected $table = "causas";
    protected $fillable = ['fuero_id','numero_expediente','actor_imputado','demandado_victima','objeto_procesal_id'];
    

    public function fuero()
    {
    	return $this->belongsTo('App\Models\Fuero', 'fuero_id', 'id');
    }

    public function objetoprocesal()
    {
    	return $this->belongsTo('App\Models\ObjetoProcesal', 'objeto_procesal_id', 'id');
    }

    public function sentencias()
    {
        return $this->hasMany('App\Models\Sentencia');
    }

}
