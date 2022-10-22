@extends('plantillas.menu')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" style="color:#770045;" href="{{route('avisos')}}">Avisos</a>
        </li>
        @if(auth()->user()->Rol == "Administrador")
            <li class="nav-item">
                <a class="nav-link active">Mis avisos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#770045;" href="{{route('nuevoAviso')}}">Nuevo aviso</a>
            </li>
        @endif
    </ul>
    <p></p>
    <p></p>
    <p></p>
    <h4>Mis avisos</h4>
        @foreach($avisos as $aviso)
            <div class="card">
                <div class="card-header">
                    {{ \Carbon\Carbon::parse($aviso->updated_at)->diffForHumans() }}
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Ver</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#editar{{$aviso->idAviso}}" aria-controls="editar{{$aviso->idAviso}}" aria-expanded="false" style="background-color: {{$aviso->prioridad == 2 ? '#770045' : ($aviso->prioridad == 1 ? '#777500' : '#207700')}}; color: white;">Editar</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{route('eliminarAviso',['idAviso' => $aviso->idAviso])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="nav-link bg-danger" style="color: white;" value="Eliminar" onclick="return confirm('¿Desea eliminar este aviso?')">
                            </form>
                        </li>
                    </ul>
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
                    <p></p>
                    <nav class="collapse" id="editar{{$aviso->idAviso}}">
                        <form action="{{route('editarAviso',['idAviso' => $aviso->idAviso])}}" class="needs-validation" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="Titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="Titulo" name="titulo" value="{{$aviso->titulo}}" required>
                                </div>
                                <div class="col-sm-12">
                                    <label for="Aviso" class="form-label">Aviso</label>
                                    <textarea class="form-control" id="Aviso" name="aviso" row="5" required>{{$aviso->aviso}}</textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label for="Prioridad" class="form-label">Prioridad</label>
                                    <select class="form-select" id="Prioridad" name="prioridad" required>
                                        <option value="0" {{$aviso->prioridad == 0 ? 'selected' : ''}}>Baja</option>
                                        <option value="1" {{$aviso->prioridad == 1 ? 'selected' : ''}}">Media</option>
                                        <option value="2" {{$aviso->prioridad == 2 ? 'selected' : ''}}>Alta</option>
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <label for="documento" class="form-label">Documento (opcional)</label>
                                    <input type="file" class="form-control" name="documento" id="documento">
                                </div>
                                <div class="col-sm-12" align="right">
                                    <button type="button" class="btn btn-danger collapsed" data-bs-toggle="collapse" data-bs-target="#editar{{$aviso->idAviso}}" aria-controls="editar{{$aviso->idAviso}}" aria-expanded="false">Cancelar</button>
                                    <input type="submit" class="btn" value="Editar" style="background-color: {{$aviso->prioridad == 2 ? '#770045' : ($aviso->prioridad == 1 ? '#777500' : '#207700')}}; color: white;">
                                </div>
                            </div>
                        </form>
                    </nav>
                </div>
            </div>
            <p></p>
        @endforeach
@endsection