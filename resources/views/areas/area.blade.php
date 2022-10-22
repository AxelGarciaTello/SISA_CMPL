@extends('areas.menuAreas')
@section('content')
    <center>
        <p></p>
        <p></p>
        <p></p>
        <h2>{{$area->NombreArea}}</h2>
        <p></p>
        <p></p>
        <p></p>
    </center>
    @foreach ($secciones as $seccion)
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <form action="{{route('subirSeccion',['IdSeccion' => $seccion->IdSeccion])}}" method="POST">
                                    @method('PATCH')
                                    @csrf 
                                    <button type="submit" class="btn btn-success" value="Subir"><span data-feather="arrow-up" class="align-text-bottom"></span></button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('bajarSeccion',['IdSeccion' => $seccion->IdSeccion])}}" method="POST">
                                    @method('PATCH')
                                    @csrf 
                                    <button type="submit" class="btn btn-success" value="bajar"><span data-feather="arrow-down" class="align-text-bottom"></span></button>
                                </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#editarSeccion{{$seccion->IdSeccion}}" aria-controls="editarSeccion{{$seccion->IdSeccion}}" aria-expanded="false"><span data-feather="edit-2" class="align-text-bottom"></span></button>
                            </td>
                            <td>
                                <form action="{{route('eliminarSeccion',['IdSeccion' => $seccion->IdSeccion])}}" method="POST">
                                    @method('DELETE')
                                    @csrf 
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar esta sección?')"><span data-feather="trash" class="align-text-bottom"></span></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            
                <center><h3 class="card-title">{{$seccion->NombreSeccion}}</h3></center>
                <nav class="collapse" id="editarSeccion{{$seccion->IdSeccion}}">
                    <hr>
                        <div class="row g-1">
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-md-8 col-lg-8">
                                <form action="{{route('editarSeccion',['IdSeccion' => $seccion->IdSeccion])}}" class="needs-validation" method="POST">
                                    @method('PATCH')
                                    @csrf 
                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <label for="NombreSeccion" class="form-label">Nombre de la sección</label>
                                            <input type="text" class="form-control" id="NombreSeccion" name="NombreSeccion" value="{{$seccion->NombreSeccion}}" required>
                                        </div>
                                        <div class="col-sm-12" align="right">
                                        <button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#editarSeccion{{$seccion->IdSeccion}}" aria-controls="editarSeccion{{$seccion->IdSeccion}}" aria-expanded="false">Cancelar</button>
                                            <input type="submit" class="btn btn-success" value="Editar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <hr>
                </nav>
                <table class="table table-striped">
                    <tbody>
                        @foreach ($contenidos as $contenido)
                            @if($contenido->Seccion_Id == $seccion->IdSeccion)
                                <tr>
                                    @if($seccion->TipoContenido == "Documento")
                                        <td><a href="{{Storage::url($contenido->Archivo)}}" class="link-dark" target="_blanck" style="text-decoration:none">{{$contenido->NombreODescripcion}}</a></td>
                                    @else
                                        <td>{{$contenido->NombreODescripcion}}</td>
                                    @endif
                                    <td width="30"><button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#editarContenido{{$contenido->IdContenido}}" aria-controls="editarContenido{{$contenido->IdContenido}}" aria-expanded="false">Editar</button></td>
                                    <td width="30">
                                        <form action="{{route('eliminarContenido',['IdContenido' => $contenido->IdContenido])}}" class="needs-validation" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Eliminar" onclick="return confirm('¿Desea eliminar este contenido?')">
                                        </form>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                        <td colspan="4" class="collapse" id="editarContenido{{$contenido->IdContenido}}">
                                            <div class="row g-1">
                                                <div class="col-md-2 col-lg-2"></div>
                                                <div class="col-md-8 col-lg-8">
                                                    <form action="{{route('editarContenido',['IdContenido' => $contenido->IdContenido])}}" class="needs-validation" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf 
                                                        <div class="row g-3">
                                                            @if($seccion->TipoContenido == "Texto")
                                                                <div class="col-sm-12">
                                                                    <label for="NombreODescripcion" class="form-label">Descripción</label>
                                                                    <input type="text" class="form-control" id="NombreODescripcion" name="NombreODescripcion" value="{{$contenido->NombreODescripcion}}">
                                                                </div>
                                                            @endif
                                                            @if($seccion->TipoContenido == "Documento")
                                                                <div class="col-sm-12">
                                                                    <label for="Archivo" class="form-label">Archivo</label>
                                                                    <input type="file" class="form-control" id="Archivo" name="Archivo">
                                                                </div>
                                                            @endif
                                                            <div class="col-sm-12" align="right">
                                                                <button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#editarContenido{{$contenido->IdContenido}}" aria-controls="editarContenido{{$contenido->IdContenido}}" aria-expanded="false">Cancelar</button>
                                                                <input type="submit" class="btn btn-success" value="Editar">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                                
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <center>
                    <button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#nuevoContenido{{$seccion->IdSeccion}}" aria-controls="nuevoContenido{{$seccion->IdSeccion}}" aria-expanded="false">Nuevo contenido</button>
                </center>
                
                <nav class="collapse" id="nuevoContenido{{$seccion->IdSeccion}}">
                    <hr>
                        <div class="row g-1">
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-md-8 col-lg-8">
                                <form action="{{route('crearContenido',['IdSeccion' => $seccion->IdSeccion])}}" class="needs-validation" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="row g-3">
                                        @if($seccion->TipoContenido == "Texto")
                                            <div class="col-sm-12">
                                                <label for="NombreODescripcion" class="form-label">Descripción</label>
                                                <input type="text" class="form-control" id="NombreODescripcion" name="NombreODescripcion">
                                            </div>
                                        @endif
                                        @if($seccion->TipoContenido == "Documento")
                                            <div class="col-sm-12">
                                                <label for="Archivo" class="form-label">Archivo</label>
                                                <input type="file" class="form-control" id="Archivo" name="Archivo">
                                            </div>
                                        @endif
                                        <div class="col-sm-12" align="right">
                                            <button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#nuevoContenido{{$seccion->IdSeccion}}" aria-controls="nuevoContenido{{$seccion->IdSeccion}}" aria-expanded="false">Cancelar</button>
                                            <input type="submit" class="btn btn-success" value="Crear">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <hr>
                </nav>
            </div>
        </div>
        <p></p>
    @endforeach
    <p></p>
    <p></p>
    <center>
        <button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#nuevaSeccion" aria-controls="nuevaSeccion" aria-expanded="false">Nueva sección</button>
    </center>
    <nav class="collapse" id="nuevaSeccion">
        <hr>
            <div class="row g-1">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-8 col-lg-8">
                    <form action="{{route('crearSeccion',['IdArea' => $area->IdArea])}}" class="needs-validation" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="NombreSeccion" class="form-label">Nombre de la sección</label>
                                <input type="text" class="form-control" id="NombreSeccion" name="NombreSeccion" required>
                            </div>
                            <div class="col-sm-12">
                                <label for="TipoContenido" class="form-label">Tipo de contenido</label>
                                <select class="form-select" id="TipoContenido" name="TipoContenido">
                                    <option selected>Texto</option>
                                    <option >Documento</option>
                                </select>
                            </div>
                            <div class="col-sm-12" align="right">
                                <button type="button" class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#nuevaSeccion" aria-controls="nuevaSeccion" aria-expanded="false">Cancelar</button>
                                <input type="submit" class="btn btn-success" value="Crear">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <hr>
    </nav>
    <p></p>
    <p></p>
    <p></p>
@endsection