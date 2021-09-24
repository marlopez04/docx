<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

        
    protected $table = "secretarias";
    protected $fillable = ['descripcion','oficina_id','centro'];
    

    public function oficina()
    {
    	return $this->belongsTo('App\Models\Oficina', 'oficina_id', 'id');
    }

    public function vocalias()
    {
        return $this->hasMany('App\Models\Vocalia');
    }


    
}
