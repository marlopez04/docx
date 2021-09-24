<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespSentencia extends Model
{
    use HasFactory;


    protected $table = "resp_sentencias";
    protected $fillable = ['sentencia_id','oficina_id', 'tipo'];
    

    public function sentencia()
    {
    	return $this->belongsTo('App\Models\Sentencia', 'sentencia_id', 'id');
    }

    public function oficina()
    {
    	return $this->belongsTo('App\Models\Usuario', 'oficina_id', 'id');
    }

}
