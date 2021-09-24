<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatoria extends Model
{
    use HasFactory;

    
    protected $table = "relatorias";
    protected $fillable = ['descripcion','oficina_id', 'vocalia_id'];

    
    public function oficina()
    {
    	return $this->belongsTo('App\Models\Oficina', 'oficina_id', 'id');
    }

    public function vocalia()
    {
    	return $this->belongsTo('App\Models\Vocalia', 'vocalia_id', 'id');
    }

}
