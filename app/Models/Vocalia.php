<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocalia extends Model
{
    use HasFactory;
            
    protected $table = "vocalias";
    protected $fillable = ['descripcion','id_oficina','id_secretaria'];
    

    public function oficina()
    {
    	return $this->belongsTo('App\Models\Oficina', 'id_oficina', 'id');
    }

    public function secretaria()
    {
    	return $this->belongsTo('App\Models\Oficina', 'id_secretaria', 'id');
    }

    public function relatorias()
    {
        return $this->hasMany('App\Models\Relatoria');
    }


}
