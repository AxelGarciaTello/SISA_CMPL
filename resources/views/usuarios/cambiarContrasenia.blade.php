@extends('usuarios.menuUsuarios')
@section('content')
    @if(Session::has('msgError'))
        <div class="alert alert-danger">
            {{Session::get('msgError')}}
        </div>
    @endif
    <p></p>
    <p></p>
    <p></p>
    <center><h2>Cambio de contraseña</h2></center>
    <p></p>
    <p></p>
    <p></p>
    <div class="row g-1">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
            <form action="{{route('cambiarContrasenia',['id' => auth()->user()->id])}}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="ViejoPassword" class="form-label">Contraseña actual</label>
                        <input type="password" class="form-control" name="ViejoPassword" id="ViejoPassword">
                    </div>
                    <div class="col-sm-12">
                        <label for="Password" class="form-label">Nueva contraseña</label>
                        <input type="password" class="form-control" name="Password" id="Password">
                    </div>
                    <div class="col-sm-12">
                        <label for="PasswordR" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" name="PasswordR" id="PasswordR">
                    </div>
                    <div class="col-sm-12" align="right">
                        <a href="{{route('mostrarUsuarios')}}" class="btn btn-success">Cancelar</a>
                        <input type="submit" class="btn btn-success" value="Cambiar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection