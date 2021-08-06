<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespSentencia extends Model
{
    use HasFactory;


    protected $table = "resp_sentencias";
    protected $fillable = ['id_sentencia','id_usuario'];
    

    public function sentencia()
    {
    	return $this->belongsTo('App\Models\Sentencia', 'id_sentencia', 'id');
    }

    public function usuario()
    {
    	return $this->belongsTo('App\Models\Usuario', 'id_usuario', 'id');
    }

}
