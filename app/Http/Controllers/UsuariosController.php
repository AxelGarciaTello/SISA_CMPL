<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{
    public function show(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        $usuarios = DB::select('SELECT b.id, a.Abreviatura, b.GradoAcademico, b.Nombre, b.ApPaterno, b.ApMaterno, b.Email, b.Extension, c.NombreArea, b.Area_Id, d.NombreCargo, b.Cargo_Id, b.Rol FROM grado_academicos a, usuarios b, areas c, cargos d WHERE b.GradoAcademico = a.IdGrado AND b.Area_Id = c.IdArea AND b.Cargo_Id = d.IdCargo');
        return view('usuarios.usuario',['usuarios' => $usuarios]);
    }

    public function buscar(Request $request){
        if($request->IdArea == 0){
            $usuarios = DB::select('SELECT b.id, a.Abreviatura, b.GradoAcademico, b.Nombre, b.ApPaterno, b.ApMaterno, b.Email, b.Extension, c.NombreArea, b.Area_Id, d.NombreCargo, b.Cargo_Id, b.Rol FROM grado_academicos a, usuarios b, areas c, cargos d WHERE b.GradoAcademico = a.IdGrado AND b.Area_Id = c.IdArea AND b.Cargo_Id = d.IdCargo');
        }
        else{
            $usuarios = DB::select('SELECT b.id, a.Abreviatura, b.GradoAcademico, b.Nombre, b.ApPaterno, b.ApMaterno, b.Email, b.Extension, c.NombreArea, b.Area_Id, d.NombreCargo, b.Cargo_Id, b.Rol FROM grado_academicos a, usuarios b, areas c, cargos d WHERE b.GradoAcademico = a.IdGrado AND b.Area_Id = c.IdArea AND b.Cargo_Id = d.IdCargo AND b.Area_Id = ?',[$request->IdArea]);
        }
        return view('usuarios.usuario',['usuarios' => $usuarios]);
    }

    public function crear(Request $request){
        $request->validate([
            'Nombre' => 'required|max:50',
            'ApPaterno' => 'required|max:50',
            'ApMaterno' => 'required|max:50',
            'Email' => 'required|unique:usuarios,Email',
            'Password' => 'required',
            'PasswordR' => 'required|same:Password',
            'Extension' => 'required',
        ]);
        $usuario = new usuario;
        $usuario->GradoAcademico = $request->GradoAcademico;
        $usuario->Nombre = $request->Nombre;
        $usuario->ApPaterno = $request->ApPaterno;
        $usuario->ApMaterno = $request->ApMaterno;
        $usuario->Email = $request->Email;
        $usuario->Password = Hash::make($request->Password);
        $usuario->Extension = $request->Extension;
        $usuario->Rol = $request->Rol;
        $usuario->Area_Id = $request->Area_Id;
        $usuario->Cargo_Id = $request->Cargo_Id;
        $usuario->save();
        Session::flash('msg','Usuario registrado correctamente.');
        return back();
    }

    public function editar(Request $request, $id){
        $usuario = usuario::where('id',$id)->update([
            'GradoAcademico' => $request->GradoAcademico,
            'Nombre' => $request->Nombre,
            'ApPaterno' => $request->ApPaterno,
            'ApMaterno' => $request->ApMaterno,
            'Extension' => $request->Extension,
            'Email' => $request->Email,
            'Area_Id' => $request->Area_Id,
            'Cargo_Id' => $request->Cargo_Id,
            'Rol' => $request->Rol
        ]);
        Session::flash('msg','Usuario editado correctamente.');
        return back();
    }

    public function eliminar($id){
        $usuario = usuario::where('id',$id);
        $usuario->delete();
        Session::flash('msg','Usuario eliminado correctamente.');
        return back();
    }

    public function showContrasenia(){
        if(!Auth::check()){
            return redirect()->route('ingreso');
        }
        return view('usuarios.cambiarContrasenia');
    }

    public function cambiarContrasenia(Request $request, $id){
        $request->validate([
            'Password' => 'required',
            'PasswordR' => 'required|same:Password',
        ]);
        $usuario = DB::table('usuarios')->where('id',$id)->first();
        if($request->ViejoPassword != Null){
            if(!(Hash::check($request->ViejoPassword,$usuario->Password))){
                Session::flash('msgError','Contraseña incorrecta.');
                return back();
            }
        }
        $usuario = usuario::where('id',$id)->update([
            'Password' => Hash::make($request->Password)
        ]);
        Session::flash('msg','Contraseña editada correctamente.');
        return redirect()->route('mostrarUsuarios');
    }
}
