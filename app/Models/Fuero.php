<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuero extends Model
{
    use HasFactory;
   
    protected $table = "fueros";
    protected $fillable = ['descripcion', 'centro'];
    

    public function causas()
    {
        return $this->hasMany('App\Models\Causa');
    }


}
