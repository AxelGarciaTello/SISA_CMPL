@extends('plantillas.menu')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" style="color:#770045;" href="{{route('avisos')}}">Avisos</a>
        </li>
        @if(auth()->user()->Rol == "Administrador")
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('misAvisos')}}">Mis avisos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Nuevo aviso</a>
            </li>
        @endif
    </ul>
    <div class="row g-1">
        <div class="col-md-2 col-lg-2">
        </div>
        <div class="col-md-8 col-lg-8">
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <h4>Nuevo aviso</h4>
            <form action="{{route('crearAviso')}}" class="needs-validation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="Titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="Titulo" name="titulo" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="Aviso" class="form-label">Aviso</label>
                        <textarea class="form-control" id="Aviso" name="aviso" row="5" required></textarea>
                    </div>
                    <div class="col-sm-3">
                        <label for="Prioridad" class="form-label">Prioridad</label>
                        <select class="form-select" id="Prioridad" name="prioridad" required>
                            <option value="0">Baja</option>
                            <option value="1">Media</option>
                            <option value="2">Alta</option>
                        </select>
                    </div>
                    <div class="col-sm-9">
                        <label for="documento" class="form-label">Documento (opcional)</label>
                        <input type="file" class="form-control" name="documento" id="documento">
                    </div>
                    <div class="col-sm-12" align="right">
                        <input type="submit" class="btn" value="Publicar" style="background-color: #770045; color: white;">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection