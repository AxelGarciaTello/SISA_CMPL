@extends('plantillas.menu')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" style="color:#770045;" href="{{route('capacitaciones')}}">Capacitaciones</a>
        </li>
        @if(auth()->user()->Rol == "Administrador")
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('misCapacitaciones')}}">Mis capacitaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Nueva capacitación</a>
            </li>
        @endif
    </ul>
    <div class="row g-1">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <h4>Nuevo curso</h4>
            <form action="{{route('crearCapacitacion')}}" class="needs-validation" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="Titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="Titulo" name="Titulo" required>
                    </div>
                    <div class="col-ms-12">
                        <label for="Descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" name="Descripcion" id="Descripcion" rows="5"></textarea>
                    </div>
                    <div class="col-ms-12">
                        <label for="Archivo" class="form-label">Convocatoria</label>
                        <input type="file" class="form-control" id="Archivo" name="Archivo">
                    </div>
                    <div class="col-sm-12">
                        <label for="Link" class="form-label">Enlace</label>
                        <input type="text" class="form-control" id="Link" name="Link">
                    </div>
                    <div class="col-sm-12" align="right">
                        <input type="submit" class="btn" value="Publicar" style="background-color: #770045; color: white;">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection