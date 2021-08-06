<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    protected $table = "oficinas";
    protected $fillable = ['descripcion','tipo'];
    

    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento');
    }

    public function secretarias()
    {
        return $this->hasMany('App\Models\Secretaria');
    }

    public function vocalias()
    {
        return $this->hasMany('App\Models\Vocalia');
    }

    public function relatorias()
    {
        return $this->hasMany('App\Models\Relatoria');
    }


}
