<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatoria extends Model
{
    use HasFactory;

    
    protected $table = "relatorias";
    protected $fillable = ['descripcion','id_oficina', 'id_vocalia'];

    
    public function oficina()
    {
    	return $this->belongsTo('App\Models\Oficina', 'id_oficina', 'id');
    }

    public function vocalia()
    {
    	return $this->belongsTo('App\Models\Vocalia', 'id_vocalia', 'id');
    }

}
