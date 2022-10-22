<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\AvisosController;
use App\Http\Controllers\CapacitacionesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\OficiosController;
use App\Http\Controllers\MemorandumController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/registro',[RegistroController::class,'show'])->name('registro');

Route::post('/registro',[RegistroController::class,'registrar'])->name('registro');

Route::get('/',[IngresoController::class,'show'])->name('ingreso');

Route::post('/',[IngresoController::class,'ingresar'])->name('ingreso');

Route::get('/salir',[SalidaController::class,'salir']);

Route::get('/avisos',[AvisosController::class,'show'])->name('avisos');

Route::get('/areas/misAvisos',[AvisosController::class,'mostrar'])->name('misAvisos');

Route::get('/areas/nuevoAviso',[AvisosController::class,'nuevoAviso'])->name('nuevoAviso');

Route::post('/areas/nuevoAviso',[AvisosController::class,'publicar'])->name('crearAviso');

Route::delete('/areas/avisos/{idAviso}',[AvisosController::class, 'eliminar'])->name('eliminarAviso');

Route::patch('/areas/avisos/{idAviso}',[AvisosController::class, 'editar'])->name('editarAviso');

Route::get('/capacitaciones',[CapacitacionesController::class,'show'])->name('capacitaciones');

Route::get('/areas/misCapacitaciones',[CapacitacionesController::class,'mostrar'])->name('misCapacitaciones');

Route::get('/areas/nuevaCapacitacion',[CapacitacionesController::class,'nuevaCapacitacion'])->name('nuevaCapacitacion');

Route::post('/areas/nuevaCapacitacion',[CapacitacionesController::class,'publicar'])->name('crearCapacitacion');

Route::delete('/areas/capacitaciones/{IdCapacitacion}',[CapacitacionesController::class, 'eliminar'])->name('eliminarCapacitacion');

Route::patch('/areas/capacitaciones/{IdCapacitacion}',[CapacitacionesController::class, 'editar'])->name('editarCapacitacion');

Route::get('/areas/{IdArea}',[AreasController::class,'show'])->name('mostrarArea');

Route::post('/areas/seccion/{IdArea}',[AreasController::class,'crearSeccion'])->name('crearSeccion');

Route::post('/areas/contenido/{IdSeccion}',[AreasController::class,'crearContenido'])->name('crearContenido');

Route::patch('/areas/contenido/{IdContenido}',[AreasController::class,'editarContenido'])->name('editarContenido');

Route::delete('/areas/contenido/{IdContenido}',[AreasController::class,'eliminarContenido'])->name('eliminarContenido');

Route::patch('/areas/seccion/subir/{IdSeccion}',[AreasController::class,'subirSeccion'])->name('subirSeccion');

Route::patch('/areas/seccion/bajar/{IdSeccion}',[AreasController::class,'bajarSeccion'])->name('bajarSeccion');

Route::patch('/areas/seccion/{IdSeccion}',[AreasController::class,'editarSeccion'])->name('editarSeccion');

Route::delete('/areas/seccion/{IdSeccion}',[AreasController::class,'eliminarSeccion'])->name('eliminarSeccion');

Route::get('/usuarios',[UsuariosController::class,'show'])->name('mostrarUsuarios');

Route::post('/usuarios',[UsuariosController::class,'crear'])->name('crearUsuarios');

Route::patch('/usuarios/{id}',[UsuariosController::class,'editar'])->name('editarUsuarios');

Route::delete('/usuarios/{id}',[UsuariosController::class,'eliminar'])->name('eliminarUsuarios');

Route::get('/usuarios/contrasenia',[UsuariosController::class,'showContrasenia'])->name('mostrarContrasenia');

Route::post('/usuarios/contrasenia/{id}',[UsuariosController::class,'cambiarContrasenia'])->name('cambiarContrasenia');

Route::post('/usuarios/areas',[UsuariosController::class,'buscar'])->name('buscarUsuarios');

Route::get('/oficios/nuevo',[OficiosController::class,'show'])->name('nuevoOficio');

Route::post('/oficios/nuevo',[OficiosController::class,'enviarOficio'])->name('enviarOficio');

Route::get('/oficios/salientes',[OficiosController::class,'oficiosSalientes'])->name('oficiosSalientes');

Route::get('/oficios/entrantes',[OficiosController::class,'oficiosEntrantes'])->name('oficiosEntrantes');

Route::get('/memos/nuevo',[MemorandumController::class,'show'])->name('nuevoMemo');

Route::post('/memos/nuevo',[MemorandumController::class,'enviarMemo'])->name('enviarMemo');

Route::get('/memos/salientes',[MemorandumController::class,'memosSalientes'])->name('memosSalientes');

Route::get('/memos/entrantes',[MemorandumController::class,'memosEntrantes'])->name('memosEntrantes');

Route::get("/calendario", function(){    
    return view('calendario.calendario');
});

Route::get('/carta',[PDFController::class,'show'])->name('carta');

Route::post('/carta',[PDFController::class,'crearCarta'])->name('crearCarta');

Route::get('/{IdArea}',[AreasController::class,'vistaArea'])->name('vistaArea');


