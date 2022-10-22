<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function show(){
        return view('registro');
    }

    public function registrar(Request $request){
        $request->validate([
            'Nombre' => 'required|max:50',
            'ApPaterno' => 'required|max:50',
            'ApMaterno' => 'required|max:50',
            'Email' => 'required|unique:usuarios,Email',
            'Password' => 'required',
            'Extension' => 'required',
        ]);
        $usuario = new usuario;
        $usuario->Nombre = $request->Nombre;
        $usuario->ApPaterno = $request->ApPaterno;
        $usuario->ApMaterno = $request->ApMaterno;
        $usuario->Email = $request->Email;
        $usuario->Password = Hash::make($request->Password);
        $usuario->Extension = $request->Extension;
        $usuario->save();
        return 'Usuario creado';
    }
}
