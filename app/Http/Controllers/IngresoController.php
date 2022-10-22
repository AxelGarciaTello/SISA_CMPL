<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect()->route('avisos');
        }
        return view('index');
    }

    public function ingresar(Request $request){
        $usuario = DB::table('usuarios')->where('Email',$request->Email)->first();
        if($usuario != null){
            if(Hash::check($request->Password,$usuario->Password)){
                Auth::loginUsingId($usuario->id);
                return redirect()->route('avisos');
            }
        }
        return redirect()->route('ingreso')->withErrors('Correo y/o contraseña incorrectos');
    }
}
