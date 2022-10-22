@extends('usuarios.menuUsuarios')
@section('content')
    <p></p>
    <p></p>
    <p></p>
    <center><h2>Nuevo memorandum saliente</h2></center>
    <p></p>
    <p></p>
    <div class="row g-1">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
            <form action="{{route('enviarMemo')}}" class="needs-validation" method="post" enctype="multipart/form-data">
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
                        <label for="NoMemorandum" class="form-label">ID de memorandum</label>
                        <input type="text" class="form-control" name="NoMemorandum" id="NoMemorandum" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="Asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" name="Asunto" id="Asunto" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="Tipo" class="form-label">Tipo</label>
                        <select class="form-select" name="Tipo" id="Tipo">
                            <option>General</option>
                            <option>Personal</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="FechaRespuesta" class="form-label">Fecha limite para respuesta (opcional)</label>
                        <input type="date" class="form-control" name="FechaRespuesta" id="FechaRespuesta">
                    </div>
                    <div class="col-sm-12">
                        <label for="Documento" class="form-label">Documento digital</label>
                        <input type="file" class="form-control" name="Documento" id="Documento" required>
                    </div>
                    <div class="col-sm-12" align="right">
                        <a href="{{route('memosSalientes')}}" class="btn btn-success">Cancelar</a>
                        <input type="submit" class="btn btn-success" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection