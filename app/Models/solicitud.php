<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'NUE',
        'ruta_archivo',
        'fecha',
        
    ];

    public function Usuario(){
        return $this->belogsTo(User::class);
    }


}
