@extends('plantillas.menu')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active">Capacitaciones</a>
        </li>
        @if(auth()->user()->Rol == "Administrador")
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('misCapacitaciones')}}">Mis capacitaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('nuevaCapacitacion')}}">Nueva capacitación</a>
            </li>
        @endif
    </ul>
<center>
    <p></p>
    <p></p>
    <p></p>
    <h2>Capacitación</h2>
    <p></p>
    <p></p>
    <p></p>
</center>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-1">
  @foreach ($capacitaciones as $capacitacion)
    <div class="col d-flex align-items-start">
      <div class="card" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title">{{$capacitacion->Titulo}}</h5>
          <p class="card-text">{{$capacitacion->Descripcion}}</p>
          <div class="col-sm-12" align="right">
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
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection