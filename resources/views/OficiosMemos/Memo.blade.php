@extends('usuarios.menuUsuarios')
@section('content')
    <p></p>
    <p></p>
    <p></p>
    <div align="right">
        <a href="{{route('nuevoMemo')}}" class="btn btn-success">+ Nuevo memorandum saliente</a>
    </div>
    <p></p>
    <p></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Remitente</th>
                <th scope="col">Destinatario</th>
                <th scope="col">Id de memorandum</th>
                <th scope="col">Asunto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fecha limite</th>
                <th scope="col">Documento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($memos as $memo)
                <tr>
                    <th>{{$memo->ApPaternoR}} {{$memo->ApMaternoR}} {{$memo->NombreR}}</th>
                    <th>{{$memo->ApPaternoD}} {{$memo->ApMaternoD}} {{$memo->NombreD}}</th>
                    <th>{{$memo->NoMemorandum}}</th>
                    <th>{{$memo->Asunto}}</th>
                    <th>{{$memo->Tipo}}</th>
                    <th>{{$memo->FechaRespuesta}}</th>
                    <th>
                        <a href="{{Storage::url($memo->Documento)}}" class="btn btn-success" target="_blanck">Ver</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection