<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetoProcesal extends Model
{
    use HasFactory;

    protected $table = "objetoprocesal";
    protected $fillable = ['descripcion'];
    

    public function causas()
    {
        return $this->hasMany('App\Models\Causa');
    }
}
