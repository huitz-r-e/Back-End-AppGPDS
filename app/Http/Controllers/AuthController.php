<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validator=Validator::make($request->all(),['id_rol'=>'required|numeric',
        'NUE'=> 'required|string|unique:users',
        'nombre'=> 'required|string',
        'password'=>'required|string|min:6']);

        if($validator->fails()){
            return response()->json(['errors'=>$validator-> errors()], 422);
        }

        $user=User::create([
            'id_rol'=>$request->id_rol,
            'NUE'=>$request->NUE,
            'nombre'=>$request->nombre,
            'password'=>bcrypt($request->password)
        ]);
        return response()->json(['user'=>$user],201);
    }

    public function login (Request $request){
        $validator=Validator::make($request->all(),[
        'nombre'=> 'required|string',
        'password'=>'required|string|min:6']);

        if($validator->fails()){
            return response()->json(['Error'=>$validator->errors()],422);
        }

        $credentials=$request->only(['nombre', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['error'=>'No autorizado', ],401);
        }
        $user=$request->user();
        $token=$user->createToken('auth.token')->plainTextToken;
        return response()->json (['Token'=>$token, 'Usuario'=>$user],200);

    }
}
