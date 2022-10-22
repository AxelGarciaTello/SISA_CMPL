@extends('plantillas.menu')
@section('content')
    <center>
        <p></p>
        <p></p>
        <h2>Subdirección Académica</h2>
        <h3>Organigrama</h3>
        <div class="border border-danger">
            Aquí va el organigrama
        </div>
        <p></p>
        <p></p>
    </center>
    @include('plantillas.texto')
    @include('plantillas.lista')
    @include('plantillas.archivos')
@endsection