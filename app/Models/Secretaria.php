<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

        
    protected $table = "secretarias";
    protected $fillable = ['descripcion','id_oficina','centro'];
    

    public function oficina()
    {
    	return $this->belongsTo('App\Models\Oficina', 'id_oficina', 'id');
    }

    public function vocalias()
    {
        return $this->hasMany('App\Models\Vocalia');
    }


    
}
