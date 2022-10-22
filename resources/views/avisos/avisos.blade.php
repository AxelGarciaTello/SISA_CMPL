@extends('plantillas.menu')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active">Avisos</a>
        </li>
        @if(auth()->user()->Rol == "Administrador")
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('misAvisos')}}">Mis avisos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('nuevoAviso')}}">Nuevo aviso</a>
            </li>
        @endif
    </ul>
    <center>
        <p></p>
        <p></p>
        <p></p>
        <h2>Sistema Integrado de Gestión de la Calidad y del Ambiente</h2>
        <p></p>
        <h3>Avisos</h3>
        <p></p>
        <p></p>
    </center>
    <div class="row g-1">
        @foreach($avisos as $aviso)
            <div class="card">
                <div class="card-header">
                    <b>{{$aviso->Nombre}} {{$aviso->ApPaterno}} {{$aviso->ApMaterno}}, {{$aviso->NombreCargo}} </b>
                    {{ \Carbon\Carbon::parse($aviso->updated_at)->diffForHumans() }}
                </div>
                <div class="card-body">
                <div style="background-color: {{$aviso->prioridad == 2 ? '#770045' : ($aviso->prioridad == 1 ? '#777500' : '#207700')}}; color: white; border: 25px solid {{$aviso->prioridad == 2 ? '#770045' : ($aviso->prioridad == 1 ? '#777500' : '#207700')}};">
                        <h3 class="card-title">{{$aviso->titulo}}</h3>
                    </div>
                    <p></p>
                    <p class="card-text"><font SIZE=3>{{$aviso->aviso}}</font></p>
                    <p></p>
                    @if($aviso->documento != null)
                        <a class="btn" href="{{Storage::url($aviso->documento)}}" TARGET="_blank" style="background-color: {{$aviso->prioridad == 2 ? '#770045' : ($aviso->prioridad == 1 ? '#777500' : '#207700')}}; color: white;">Ver documento</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection