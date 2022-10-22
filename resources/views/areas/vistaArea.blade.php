<link rel="stylesheet" href="css/minuta.css" type="text/css"> 
@extends('plantillas.menu')

@section('content')
    <ul class="nav nav-tabs">
        @foreach($secciones as $seccion)
            <li class="nav-item">
                <a class="nav-link" href="#{{$seccion->IdSeccion}}" style="color:#770045;">{{$seccion->NombreSeccion}}</a>
            </li>
        @endforeach
    </ul>
    <center>
        <p></p>
        <p></p>
        <h2>{{$area->NombreArea}}</h2>
        <p></p>
        <p></p>
        <p></p>
    </center>

    @if($area->OrganigramaURL != NULL)
        <center>
            <h3>Organigrama</h3>
            <div class="row g-5">
            <iframe frameborder="0" style="width:100%;height:650px;" src="{{$area->OrganigramaURL}}"></iframe>
            </div>
        </center>
    @endif

    @foreach($secciones as $seccion)
        <div class="content-header">
            <h2 class="title" id="{{$seccion->IdSeccion}}">{{$seccion->NombreSeccion}}</h2>
            <div class="panel panel-primary panel-border top mb35">
                <div class="panel-body">
                    <div class="admin-form">
                        <table class="table table-striped">
                            <tbody>
                                @foreach($contenidos as $contenido)
                                    @if($contenido->Seccion_Id == $seccion->IdSeccion)
                                        <tr class="fila">
                                            @if($seccion->TipoContenido == "Documento")
                                                <td><a href="{{Storage::url($contenido->Archivo)}}" class="link-dark" target="_blank" style="text-decoration:none">{{$contenido->NombreODescripcion}}</a></td>
                                            @else
                                                <td>{{$contenido->NombreODescripcion}}</td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>                
                </div>
            </div>
        </div>
    @endforeach
@endsection