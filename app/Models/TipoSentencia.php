<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSentencia extends Model
{
    use HasFactory;

    protected $table = "tipo_sentencias";
    protected $fillable = ['descripcion'];
    

    public function sentencias()
    {
        return $this->hasMany('App\Models\Sentencia');
    }

}
