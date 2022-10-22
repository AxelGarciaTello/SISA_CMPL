@extends('plantillas.menu')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" style="color:#770045;" href="{{route('capacitaciones')}}">Capacitaciones</a>
        </li>
        @if(auth()->user()->Rol == "Administrador")
            <li class="nav-item">
                <a class="nav-link active">Mis capacitaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('nuevaCapacitacion')}}">Nueva capacitación</a>
            </li>
        @endif    
    </ul>
    <div class="row g-1">
        <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-10 col-lg-10">
            <p></p>
            <h4>Capacitaciones</h4>
            <table class="table table-striped">
                <tbody>
                    @foreach ($capacitaciones as $capacitacion)
                        <tr>
                            <th>
                                <h5>{{$capacitacion->Titulo}}</h5>
                                <p>{{$capacitacion->Descripcion}}</p>
                                <div>
                                    @if ($capacitacion->Archivo != null)
                                        <a href="{{Storage::url($capacitacion->Archivo)}}" class="btn" TARGET=”_blank” style="background-color: #770045; color: white;">
                                            Convocatoria
                                        </a>
                                    @endif
                                    @if ($capacitacion->Link != null)
                                        <a href="{{$capacitacion->Link}}" class="btn" TARGET=”_blank” style="background-color: #770045; color: white;">
                                            Enlace
                                        </a>
                                    @endif
                                </div>
                                <div align="right">
                                    <form action="{{route('eliminarCapacitacion',['IdCapacitacion' => $capacitacion->IdCapacitacion])}}" method="POST">
                                        @method('DELETE')
                                        @csrf 
                                        <button type="button" class="btn collapsed" data-bs-toggle="collapse" data-bs-target="#editar{{$capacitacion->IdCapacitacion}}" aria-controls="editar{{$capacitacion->IdCapacitacion}}" aria-expanded="false" style="background-color: #770045; color: white;">Editar</button>
                                        <input type="submit" class="btn btn-danger" value="Eliminar" onclick="return confirm('¿Desea eliminar este curso?')">
                                    </form>
                                </div>
                                <nav class="collapse" id="editar{{$capacitacion->IdCapacitacion}}">
                                    <hr>
                                    <form action="{{route('editarCapacitacion',['IdCapacitacion' => $capacitacion->IdCapacitacion])}}" class="needs-validation" method="POST" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf 
                                        <div class="row g-3">
                                        <div class="col-sm-12">
                                            <label for="Titulo" class="form-label">Titulo</label>
                                            <input type="text" class="form-control" id="Titulo" name="Titulo" value="{{$capacitacion->Titulo}}" required>
                                        </div>
                                        <div class="col-ms-12">
                                            <label for="Descripcion" class="form-label">Descripción</label>
                                            <textarea class="form-control" name="Descripcion" id="Descripcion" rows="5">{{$capacitacion->Descripcion}}</textarea>
                                        </div>
                                        <div class="col-ms-12">
                                            <label for="Archivo" class="form-label">Convocatoria</label>
                                            <input type="file" class="form-control" id="Archivo" name="Archivo">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="Link" class="form-label">Enlace</label>
                                            <input type="text" class="form-control" id="Link" name="Link" value="{{$capacitacion->Link}}">
                                        </div>
                                        <div class="col-sm-12" align="right">
                                            <button type="button" class="btn collapsed" data-bs-toggle="collapse" data-bs-target="#editar{{$capacitacion->IdCapacitacion}}" aria-controls="editar{{$capacitacion->IdCapacitacion}}" aria-expanded="false" style="background-color: #770045; color: white;">Cancelar</button>
                                            <input type="submit" class="btn" value="Publicar" style="background-color: #770045; color: white;">
                                        </div>
                                        </div>
                                    </form>
                                </nav>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection