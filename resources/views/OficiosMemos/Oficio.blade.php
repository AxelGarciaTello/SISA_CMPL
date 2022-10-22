@extends('usuarios.menuUsuarios')
@section('content')
    <p></p>
    <p></p>
    <p></p>
    <div align="right">
        <a href="{{route('nuevoOficio')}}" class="btn btn-success">+ Nuevo oficio saliente</a>
    </div>
    <p></p>
    <p></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Remitente</th>
                <th scope="col">Destinatario</th>
                <th scope="col">Id de oficio</th>
                <th scope="col">Asunto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Fecha limite</th>
                <th scope="col">Documento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($oficios as $oficio)
                <tr>
                    <th>{{$oficio->ApPaternoR}} {{$oficio->ApMaternoR}} {{$oficio->NombreR}}</th>
                    <th>{{$oficio->ApPaternoD}} {{$oficio->ApMaternoD}} {{$oficio->NombreD}}</th>
                    <th>{{$oficio->NoOficio}}</th>
                    <th>{{$oficio->Asunto}}</th>
                    <th>{{$oficio->Tipo}}</th>
                    <th>{{$oficio->Prioridad == 0 ? 'Baja' : ($oficio->Prioridad == 1 ? 'Media' : 'Alta')}}</th>
                    <th>{{$oficio->FechaRespuesta}}</th>
                    <th>
                        <a href="{{Storage::url($oficio->Documento)}}" class="btn btn-success" target="_blanck">Ver</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection