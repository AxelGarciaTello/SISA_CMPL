@extends('usuarios.menuUsuarios')
@section('content')
    <p></p>
    <p></p>
    <p></p>
    <center><h2>Nuevo oficio saliente</h2></center>
    <p></p>
    <p></p>
    <div class="row g-1">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
            <form action="{{route('enviarOficio')}}" class="needs-validation" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Destinatario" class="form-label">Destinatario</label>
                        <select class="form-select" name="Destinatario" id="Destinatario">
                            @foreach($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{$usuario->ApPaterno}} {{$usuario->ApMaterno}} {{$usuario->Nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="NoOficio" class="form-label">ID de oficio</label>
                        <input type="text" class="form-control" name="NoOficio" id="NoOficio" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="Asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" name="Asunto" id="Asunto" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="Tipo" class="form-label">Tipo</label>
                        <select class="form-select" name="Tipo" id="Tipo">
                            <option>Reservado</option>
                            <option>Confidencial</option>
                            <option>Público</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="Prioridad" class="form-label">Prioridad</label>
                        <select class="form-select" name="Prioridad" id="Prioridad">
                            <option value="0">Baja</option>
                            <option value="1">Media</option>
                            <option value="2">Alta</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="FechaRespuesta" class="form-label">Fecha limite para respuesta (optional)</label>
                        <input type="date" class="form-control" name="FechaRespuesta" id="FechaRespuesta">
                    </div>
                    <div class="col-sm-12">
                        <label for="Documento" class="form-label">Documento digital</label>
                        <input type="file" class="form-control" name="Documento" id="Documento" required>
                    </div>
                    <div class="col-sm-12" align="right">
                        <a href="{{route('oficiosSalientes')}}" class="btn btn-success">Cancelar</a>
                        <input type="submit" class="btn btn-success" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection