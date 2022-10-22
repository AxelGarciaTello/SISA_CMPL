<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\area;
use App\Models\seccion;
use Illuminate\Support\Facades\Session;
use App\Models\contenido;
use Illuminate\Support\Facades\DB;

class AreasController extends Controller
{
    public function show($IdArea){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $area = area::where('IdArea',$IdArea)->first();
        $secciones = seccion::where('Area_Id',$area->IdArea)->orderBy('Precedencia')->get();
        $contenidos = DB::select('select * from contenidos where Seccion_Id in (select IdSeccion from seccions where Area_Id = ?)',[$area->IdArea]);
        return view('areas.area',['area' => $area, 'secciones' => $secciones, 'contenidos' => $contenidos]);
    }

    public function vistaArea($IdArea){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $area = area::where('IdArea',$IdArea)->first();
        $secciones = seccion::where('Area_Id',$area->IdArea)->orderBy('Precedencia')->get();
        $contenidos = DB::select('select * from contenidos where Seccion_Id in (select IdSeccion from seccions where Area_Id = ?)',[$area->IdArea]);
        return view('areas.vistaArea',['area' => $area, 'secciones' => $secciones, 'contenidos' => $contenidos]);
    }

    public function crearSeccion(Request $request, $IdArea){
        $request -> validate([
            'NombreSeccion' => 'required|max:200',
            'TipoContenido' => 'required|max:25',
        ]);
        $ultimaSeccion = seccion::where('Area_Id',$IdArea)->orderByDesc('Precedencia')->first();
        $usuario = Auth::User();
        $seccion = new seccion;
        $seccion->NombreSeccion = $request->NombreSeccion;
        $seccion->TipoContenido = $request->TipoContenido;
        if($ultimaSeccion != NULL){
            $seccion->Precedencia = ($ultimaSeccion->Precedencia + 1);
        }
        else{
            $seccion->Precedencia = 1;
        }
        $seccion->Area_Id = $IdArea;
        $seccion->CreadoPor = $usuario->id;
        $seccion->EditadoPor = $usuario->id;
        $seccion->save();
        Session::flash('msg','Sección creada correctamente.');
        return back();
    }

    public function subirSeccion($IdSeccion){
        $usuario = Auth::User();
        $seccion = seccion::where('IdSeccion',$IdSeccion)->first();
        $secccionArriba = seccion::where('Precedencia',($seccion->Precedencia - 1))->update([
            'Precedencia' => $seccion->Precedencia,
            'EditadoPor' => $usuario->id
        ]);
        $nuevaSeccion = seccion::where('IdSeccion',$IdSeccion)->update([
            'Precedencia' => ($seccion->Precedencia - 1),
            'EditadoPor' => $usuario->id
        ]);
        Session::flash('msg','Sección editada correctamente.');
        return back();
    }

    public function bajarSeccion($IdSeccion){
        $usuario = Auth::User();
        $seccion = seccion::where('IdSeccion',$IdSeccion)->first();
        $secccionArriba = seccion::where('Precedencia',($seccion->Precedencia + 1))->update([
            'Precedencia' => $seccion->Precedencia,
            'EditadoPor' => $usuario->id
        ]);
        $nuevaSeccion = seccion::where('IdSeccion',$IdSeccion)->update([
            'Precedencia' => ($seccion->Precedencia + 1),
            'EditadoPor' => $usuario->id
        ]);
        Session::flash('msg','Sección editada correctamente.');
        return back();
    }

    public function editarSeccion(Request $request, $IdSeccion){
        $usuario = Auth::User();
        $seccion = seccion::where('IdSeccion',$IdSeccion)->update([
            'NombreSeccion' => $request->NombreSeccion,
            'EditadoPor' => $usuario->id
        ]);
        Session::flash('msg','Sección editada correctamente.');
        return back();
    }

    public function eliminarSeccion($IdSeccion){
        $deleted = DB::delete('delete from contenidos where Seccion_Id = ?',[$IdSeccion]);
        $seccion = seccion::where('IdSeccion',$IdSeccion);
        $seccion->delete();
        Session::flash('msg','Sección eliminada correctamente.');
        return back();
    }

    public function crearContenido(Request $request, $IdSeccion){
        $request -> validate([
            'NombreODescripcion' => 'max:900',
        ]);
        $usuario = Auth::User();
        $contenido = new contenido;
        if($request->NombreODescripcion != NULL){
            $contenido->NombreODescripcion = $request->NombreODescripcion;
        }
        else{
            $contenido->NombreODescripcion = $request->file('Archivo')->getClientOriginalName();
            $contenido->Archivo = $request->file('Archivo')->store('public/areas');
        }
        $contenido->Seccion_Id = $IdSeccion;
        $contenido->CreadoPor = $usuario->id;
        $contenido->EditadoPor = $usuario->id;
        $contenido->save();
        Session::flash('msg','Contenido creado correctamente.');
        return back();
    }

    public function editarContenido(Request $request, $IdContenido){
        $usuario = Auth::User();
        if($request->file('Archivo') == null){
            $contenido = contenido::where('IdContenido',$IdContenido)->update([
                'NombreODescripcion' => $request->NombreODescripcion,
                'EditadoPor' => $usuario->id
            ]);
        }
        else{
            $contenido = contenido::where('IdContenido',$IdContenido)->update([
                'NombreODescripcion' => $request->file('Archivo')->getClientOriginalName(),
                'Archivo' => $request->file('Archivo')->store('public/areas'),
                'EditadoPor' => $usuario->id
            ]);
        }
        Session::flash('msg','Contenido editado correctamente.');
        return back();
    }

    public function eliminarContenido($IdContenido){
        $contenido = contenido::where('IdContenido',$IdContenido);
        $contenido->delete();
        Session::flash('msg','Contenido eliminado correctamente.');
        return back();
    }
}
