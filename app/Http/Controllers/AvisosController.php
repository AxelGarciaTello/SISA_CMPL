<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\aviso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AvisosController extends Controller
{
    public function show(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $avisos = DB::select('select a.titulo, a.aviso, a.updated_at, c.Nombre, c.ApPaterno, c.ApMaterno, d.NombreCargo, a.documento, a.prioridad from avisos as a, usuarios as c, cargos as d where a.usuario_id = c.id and d.IdCargo = c.Cargo_Id order by a.updated_at desc');
        return view('avisos.avisos',['avisos' => $avisos]);
    }

    public function mostrar(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuario = Auth::User();
        $avisos = aviso::where('usuario_id',$usuario->id)->orderByDesc('updated_at')->get();
        return view('avisos.misAvisos',['avisos' => $avisos]);
    }

    public function nuevoAviso(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        return view('avisos.nuevoAviso');
    }

    public function publicar(Request $request){
        $request -> validate([
            'aviso' => 'required',
            'titulo' => 'required|max:50',
            'prioridad' => 'required',
        ]);
        $usuario = Auth::User();
        $aviso = new aviso;
        $aviso->aviso = $request->aviso;
        $aviso->titulo = $request->titulo;
        $aviso->prioridad = $request->prioridad;
        $aviso->usuario_id = $usuario->id;
        if($request->file('documento') != null){
            $aviso->documento = $request->file('documento')->store('public/avisos');
        }
        $aviso->save();
        Session::flash('msg','Aviso publicado correctamente.');
        return redirect()->route('avisos');
    }

    public function eliminar($idAviso){
        $aviso = aviso::where('idAviso', $idAviso);
        $aviso->delete();
        Session::flash('msg','Aviso eliminado correctamente.');
        return back();
    }

    public function editar(Request $request, $idAviso){
        if($request->documento == null){
            $aviso = aviso::where('idAviso', $idAviso)->update([
                'aviso' => $request->aviso,
                'titulo' => $request->titulo,
                'prioridad' => $request->prioridad
            ]);
        }
        else{
            $aviso = aviso::where('idAviso', $idAviso)->update([
                'aviso' => $request->aviso,
                'titulo' => $request->titulo,
                'prioridad' => $request->prioridad,
                'documento' => $request->file('documento')->store('public/avisos')
            ]);
        }
        Session::flash('msg','Aviso editado correctamente.');
        return back();
    }
}
