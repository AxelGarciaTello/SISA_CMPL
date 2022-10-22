<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\capacitacion;
use Illuminate\Support\Facades\Session;

class CapacitacionesController extends Controller
{
    public function show(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $capacitaciones = capacitacion::orderByDesc('updated_at')->get();
        return view('capacitaciones.capacitaciones',['capacitaciones' => $capacitaciones]);
    }

    public function mostrar(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $capacitaciones = capacitacion::orderByDesc('updated_at')->get();
        return view('capacitaciones.misCapacitaciones',['capacitaciones' => $capacitaciones]);
    }

    public function nuevaCapacitacion(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        return view('capacitaciones.nuevaCapacitacion');
    }

    public function publicar(Request $request){
        $request -> validate([
            'Titulo' => 'required',
            'Descripcion' => 'max:900',
            'Link' => 'max:500',
        ]);
        $usuario = Auth::User();
        $capacitacion = new capacitacion;
        $capacitacion->Titulo = $request->Titulo;
        $capacitacion->Descripcion = $request->Descripcion;
        if($request->file('Archivo') != null){
            $capacitacion->Archivo = $request->file('Archivo')->store('public/capacitaciones');
        }
        $capacitacion->Link = $request->Link;
        $capacitacion->CreadoPor = $usuario->id;
        $capacitacion->EditadoPor = $usuario->id;
        $capacitacion->save();
        Session::flash('msg','Aviso publicado correctamente');
        return back();
    }

    public function eliminar($IdCapacitacion){
        $capacitacion = capacitacion::where('IdCapacitacion',$IdCapacitacion);
        $capacitacion->delete();
        Session::flash('msg','Aviso eliminado correctamente');
        return back();
    }

    public function editar(Request $request, $IdCapacitacion){
        $usuario = Auth::User();
        if($request->file('Archivo') != null){
            $capacitacion = capacitacion::where('IdCapacitacion',$IdCapacitacion)->update([
                'Titulo' => $request->Titulo,
                'Descripcion' => $request->Descripcion,
                'Archivo' => $request->file('Archivo')->store('public/capacitaciones'),
                'Link' => $request->Link,
                'EditadoPor' => $usuario->id
            ]);
        }
        else{
            $capacitacion = capacitacion::where('IdCapacitacion',$IdCapacitacion)->update([
                'Titulo' => $request->Titulo,
                'Descripcion' => $request->Descripcion,
                'Link' => $request->Link,
                'EditadoPor' => $usuario->id
            ]);
        }
        Session::flash('msg','Aviso editado correctamente');
        return back();
    }
}
