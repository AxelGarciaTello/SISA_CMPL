<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\usuario;
use App\Models\oficio;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OficiosController extends Controller
{
    public function show(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuarios = usuario::all();
        return view('OficiosMemos.NuevoOficio',['usuarios' => $usuarios]);
    }

    public function oficiosSalientes(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuario = Auth::User();
        $oficios = DB::select('SELECT a.Nombre as NombreR, a.ApPaterno as ApPaternoR, a.ApMaterno as ApMaternoR, b.Nombre as NombreD, b.ApPaterno as ApPaternoD, b.ApMaterno as ApMaternoD, c.NoOficio, c.Asunto, c.Tipo, c.Prioridad, c.FechaRespuesta, c.Documento FROM usuarios a, usuarios b, oficios c WHERE c.Remitente = a.id AND c.Destinatario = b.id AND c.Remitente = ? ORDER BY c.updated_at DESC',[$usuario->id]);
        return view('OficiosMemos.Oficio',['oficios' => $oficios]);
    }

    public function oficiosEntrantes(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuario = Auth::User();
        $oficios = DB::select('SELECT a.Nombre as NombreR, a.ApPaterno as ApPaternoR, a.ApMaterno as ApMaternoR, b.Nombre as NombreD, b.ApPaterno as ApPaternoD, b.ApMaterno as ApMaternoD, c.NoOficio, c.Asunto, c.Tipo, c.Prioridad, c.FechaRespuesta, c.Documento FROM usuarios a, usuarios b, oficios c WHERE c.Remitente = a.id AND c.Destinatario = b.id AND c.Destinatario = ? ORDER BY c.FechaRespuesta DESC, c.Prioridad DESC, c.updated_at DESC',[$usuario->id]);
        return view('OficiosMemos.Oficio',['oficios' => $oficios]);
    }

    public function enviarOficio(Request $request){
        $request -> validate([
            'NoOficio' => 'required|max:50',
            'Asunto'   => 'required|max:900',
        ]);
        $usuario = Auth::User();
        $oficio = new oficio;
        $oficio->Destinatario = $request->Destinatario;
        $oficio->NoOficio = $request->NoOficio;
        $oficio->Asunto = $request->Asunto;
        $oficio->Tipo = $request->Tipo;
        $oficio->Prioridad = $request->Prioridad;
        $oficio->FechaRespuesta = $request->FechaRespuesta;
        $oficio->Documento = $request->file('Documento')->store('public/oficios');
        $oficio->Remitente = $usuario->id;
        $oficio->save();
        Session::flash('msg','Oficio enviado');
        return redirect()->route('oficiosSalientes');
    }
}
