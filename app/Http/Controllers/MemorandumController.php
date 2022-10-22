<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\usuario;
use Illuminate\Support\Facades\DB;
use App\Models\memorandum;
use Illuminate\Support\Facades\Session;

class MemorandumController extends Controller
{
    public function show(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuarios = usuario::all();
        return view('OficiosMemos.NuevoMemo',['usuarios' => $usuarios]);
    }

    public function memosSalientes(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuario = Auth::User();
        $memos = DB::select('SELECT a.Nombre as NombreR, a.ApPaterno as ApPaternoR, a.ApMaterno as ApMaternoR, b.Nombre as NombreD, b.ApPaterno as ApPaternoD, b.ApMaterno as ApMaternoD, c.NoMemorandum, c.Asunto, c.Tipo, c.FechaRespuesta, c.Documento FROM usuarios a, usuarios b, memoranda c WHERE c.Remitente = a.id AND c.Destinatario = b.id AND c.Remitente = ? ORDER BY c.updated_at DESC',[$usuario->id]);
        return view('OficiosMemos.Memo',['memos' => $memos]);
    }

    public function memosEntrantes(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuario = Auth::User();
        $memos = DB::select('SELECT a.Nombre as NombreR, a.ApPaterno as ApPaternoR, a.ApMaterno as ApMaternoR, b.Nombre as NombreD, b.ApPaterno as ApPaternoD, b.ApMaterno as ApMaternoD, c.NoMemorandum, c.Asunto, c.Tipo, c.FechaRespuesta, c.Documento FROM usuarios a, usuarios b, memoranda c WHERE c.Remitente = a.id AND c.Destinatario = b.id AND c.Destinatario = ? ORDER BY c.FechaRespuesta DESC, c.updated_at DESC',[$usuario->id]);
        return view('OficiosMemos.Memo',['memos' => $memos]);
    }

    public function enviarMemo(Request $request){
        $request -> validate([
            'NoMemorandum' => 'required|max:50',
            'Asunto'       => 'required|max:900',
        ]);
        $usuario = Auth::User();
        $memo = new memorandum;
        $memo->Destinatario = $request->Destinatario;
        $memo->NoMemorandum = $request->NoMemorandum;
        $memo->Asunto = $request->Asunto;
        $memo->Tipo = $request->Tipo;
        $memo->FechaRespuesta = $request->FechaRespuesta;
        $memo->Documento = $request->file('Documento')->store('public/memos');
        $memo->Remitente = $usuario->id;
        $memo->save();
        Session::flash('msg','Memorandum enviado');
        return redirect()->route('memosSalientes');
    }
}
