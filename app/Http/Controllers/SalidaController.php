<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalidaController extends Controller
{
    public function salir(){
        Session::flush();
        Auth::logout();
        return redirect()->route('ingreso');
    }
}
