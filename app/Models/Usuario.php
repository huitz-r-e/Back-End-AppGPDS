<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'NUE',
        'password',
        'id_rol',
        
    ];
    public function rol(){
        return $this->belogsTo(rol::class);
    }

    public function solicitud(){
        return $this->hasMany(solicitud::class);
    }
    
    public function agremiado(){
        return $this->hasOne(agremiado::class);
    }


}
