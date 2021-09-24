<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocalia extends Model
{
    use HasFactory;
            
    protected $table = "vocalias";
    protected $fillable = ['descripcion','oficina_id','secretaria_id'];
    

    public function oficina()
    {
    	return $this->belongsTo('App\Models\Oficina', 'oficina_id', 'id');
    }

    public function secretaria()
    {
    	return $this->belongsTo('App\Models\Oficina', 'secretaria_id', 'id');
    }

    public function relatorias()
    {
        return $this->hasMany('App\Models\Relatoria');
    }


}
