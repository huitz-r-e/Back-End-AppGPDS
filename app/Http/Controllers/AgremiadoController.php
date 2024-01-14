<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agremiado;

class AgremiadoController extends Controller
{
    //
    public function getAgremiados(){
        return response()->json(agremiado::all(),200);
    }

    public function postAgremiado(Request $request){
        $Agremiado=agremiado::create($request->all());
        return response($Agremiado,201);
    }
}
