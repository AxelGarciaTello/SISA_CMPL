@extends('plantillas.menu')
@section('content')
    <div class="row g-1">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
            <form action="{{route('crearCarta')}}" method="post">
                @csrf 
                <img src="Imagenes/logo_SEP.jpg" width="40%">
                <img src="Imagenes/logo_poli_nombre.png" width="20%" align="right">
                <img src="Imagenes/logo_CMPL.png" width="20%" align="right">
                <p></p>
                <p></p>
                <p></p>
                <div align="right">
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="Fecha" name="Fecha" value="Ciudad de México, a {{$dia}} de {{$mes == 1 ? 'enero' : ($mes == 2 ? 'febrero' : ($mes == 3 ? 'marzo' : ($mes == 4 ? 'abril' : ($mes == 5 ? 'mayo' : ($mes == 6 ? 'junio' : ($mes == 7 ? 'julio' : ($mes == 8 ? 'agosto' : ($mes == 9 ? 'septiembre' : ($mes == 10 ? 'octubre' : ($mes == 11 ? 'noviembre' : 'diciembre'))))))))))}} de {{$anio}}">
                    </div>
                    <p></p>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="Numero" name="Numero" placeholder="Código">
                    </div>
                </div>
                <p></p>
                <b>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="Destinatario" name="Destinatario" placeholder="Destinatario">
                    </div>
                    <p></p>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="Puesto" name="Puesto" rows="2" placeholder="Puesto"></textarea>
                    </div>
                    PRESENTE
                </b>
                <div class="col-sm-12">
                    <textarea class="form-control" id="Mensaje" name="Mensaje" rows="15" placeholder="Mensaje"></textarea>
                </div>
                <p></p>
                <p></p>
                <b>
                    A T E N T A M E N T E 
                    <br>
                    "LA TÉCNICA AL SERVICIO DE LA PATRIA"
                </b>
                <p></p>
                <p></p>
                @foreach($Nombres as $Nombre)
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="Destinatario" name="Destinatario" value="{{$Nombre->Abreviatura}} {{$Nombre->ApPaterno}} {{$Nombre->ApMaterno}} {{$Nombre->Nombre}}">
                    </div>
                    <p></p>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="Cargo" name="Cargo" value="{{$Nombre->NombreCargo}}">
                    </div>
                @endforeach
                <p></p>
                <div class="col-sm-12" align="center">
                    <input type="submit" class="btn" value="Crear documento" style="background-color: #770045; color: white;">
                </div>
            </form>
        </div>
    </div>
@endsection