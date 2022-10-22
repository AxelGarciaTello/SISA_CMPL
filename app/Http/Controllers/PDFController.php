<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function show(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuario = Auth::User();
        $nombre = DB::select('select a.Abreviatura, b.NombreCargo, c.Nombre, c.ApPaterno, c.ApMaterno from grado_academicos as a, cargos as b, usuarios as c where c.id = ? and c.GradoAcademico = a.IdGrado and c.Cargo_Id = b.IdCargo',[$usuario->id]);
        return view('documentos.carta', ['dia' => Carbon::now()->format('d'), 'mes' => Carbon::now()->format('m'), 'anio' => Carbon::now()->format('Y'), 'Nombres' => $nombre]);
    }

    public function crearCarta(Request $request){
        $pdf = Pdf::loadView('documentos.cartaSalida',['request' => $request]);
        return $pdf->stream();
    }
}
