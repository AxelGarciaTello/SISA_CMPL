@extends('usuarios.menuUsuarios')
@section('content')
    <p></p>
    <p></p>
    <p></p>
    <div align="right">
        <button class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#nuevoUsuario" aria-controls="nuevoUsuario" aria-expanded="false">Nuevo usuario</button>
    </div>
    <nav class="collapse" id="nuevoUsuario">
        <hr>
            <div class="row g-1">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-8 col-lg-8">
                    <form action="{{route('crearUsuarios')}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="GradoAcademico" class="form-label">Grado Academico</label>
                                <select class="form-select" name="GradoAcademico" id="GradoAcademico">
                                    <option value="1">Doctor</option>
                                    <option value="2">Doctora</option>
                                    <option value="3">Profesora</option>
                                    <option value="4">Profesor</option>
                                    <option value="5">Maestro en Ciencias</option>
                                    <option value="6">Maestro en DGDP</option>
                                    <option value="7">Ingeniero</option>
                                    <option value="8">Licenciado</option>
                                    <option value="9">L.I.N.</option>
                                    <option value="10">L.A.E.</option>
                                    <option value="11">Técnico</option>
                                    <option value="12">Civil</option>
                                    <option value="13">Contador Público</option>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <label for="Nombre" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="ApPaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" name="ApPaterno" id="ApPaterno" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="ApMaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" name="ApMaterno" id="ApMaterno" required>
                            </div>
                            <div class="col-sm-12">
                                <label for="Extension" class="form-label">Extensión</label>
                                <input type="text" class="form-control" name="Extension" id="Extension" required>
                            </div>
                            <div class="col-sm-12">
                                <label for="Email" class="form-label">e-mail</label>
                                <input type="email" class="form-control" name="Email" id="Email" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="Password" class="form-label">Introduce una contraseña</label>
                                <input type="password" class="form-control" name="Password" id="Password" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="PasswordR" class="form-label">Repita contraseña</label>
                                <input type="password" class="form-control" name="PasswordR" id="PasswordR" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="Area_Id" class="form-label">Área</label>
                                <select class="form-select" name="Area_Id" id="Area_Id">
                                    <option value="1">Dirección</option>
                                    <option value="2">Subdirección Técnica y de Vinculación Área Técnica</option>
                                    <option value="3">Subdirección Académica</option>
                                    <option value="4">Subdirección Técnica y de Vinculación Área Vinculación</option>
                                    <option value="5">Departamento de Servicios Administrativos y Técnicos</option>
                                    <option value="6">Unidad de Informática</option>
                                    <option value="7">Sala de Juntas</option>
                                    <option value="8">Biblioteca</option>
                                    <option value="9">Vigilancia</option>
                                    <option value="10">Formatos</option>
                                    <option value="11">Sistema de Gestión Ambiental</option>
                                    <option value="12">Instructivos</option>
                                    <option value="13">Minutas</option>
                                    <option value="14">Mapa de Procesos</option>
                                    <option value="15">Deficiones</option>
                                    <option value="16">Registros</option>
                                    <option value="17">Manual de Organización</option>
                                    <option value="18">Protección Civil</option>
                                    <option value="20">CIDEP</option>
                                    <option value="21">Junta Directiva</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="Cargo_Id" class="form-label">Cargo</label>
                                <select class="form-select" name="Cargo_Id" id="Cargo_Id">
                                    <option value="1">Director</option>
                                    <option value="2">Ingeniero de Proyectos</option>
                                    <option value="3">Asistente</option>
                                    <option value="4">Subdirector</option>
                                    <option value="5">Jefe de Departamento</option>
                                    <option value="6">Responsable Técnico de Laboratorio</option>
                                    <option value="7">Profesor Investigador</option>
                                    <option value="8">Control Escolar</option>
                                    <option value="9">Ingeniero de Vinculación de Proyectos</option>
                                    <option value="10">Control y Presupuesto</option>
                                    <option value="11">Analista</option>
                                    <option value="12">Banco de Datos</option>
                                    <option value="13">Contabilidad y Presupuesto</option>
                                    <option value="14">Contabilidad de Vinculación</option>
                                    <option value="15">Responsable de Activo Fijo</option>
                                    <option value="16">Capital Humano</option>
                                    <option value="17">Ingeniero de Enlace con CONUEE</option>
                                    <option value="18">Auxiliar Administrativo</option>
                                    <option value="19">Ingeniero de Sistemas</option>
                                    <option value="20">Responsable del POA</option>
                                    <option value="21">Protección Civil</option>
                                    <option value="22">Ingreso Auto-Generado y Presupuesto</option>
                                    <option value="23">Proyectos de Investigación</option>
                                    <option value="24">Activo fijo</option>
                                    <option value="25">Representante de Dirección</option>
                                    <option value="26">Encargado de Biblioteca</option>
                                    <option value="27">Sin Cargo</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="Rol" class="form-label">Rol</label>
                                <select class="form-select" name="Rol" id="Rol">
                                    <option>Administrador</option>
                                    <option>Oficialía de Partes</option>
                                    <option>Director</option>
                                    <option>Subdirector</option>
                                    <option>Jefe de Departamento</option>
                                    <option>Personal del CMPL</option>
                                    <option>Representante de Dirección</option>
                                </select>
                            </div>
                            <div class="col-sm-12" align="right">
                                <button class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#nuevoUsuario" aria-controls="nuevoUsuario" aria-expanded="false">Cancelar</button>
                                <input type="submit" class="btn btn-success" value="Registrar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <hr>
    </nav>
    <form action="{{route('buscarUsuarios')}}" class="row g-3" method="POST">
        @csrf
        <div class="col-auto">
            <select class="form-select" id="IdArea" name="IdArea">
                <option value="0" selected>Mostrar todas las áreas</option>
                <option value="1">Dirección</option>
                <option value="2">Subdirección Técnica y de Vinculación Área Técnica</option>
                <option value="3">Subdirección Académica</option>
                <option value="4">Subdirección Técnica y de Vinculación Área Vinculación</option>
                <option value="5">Departamento de Servicios Administrativos y Técnicos</option>
                <option value="6">Unidad de Informática</option>
                <option value="7">Sala de Juntas</option>
                <option value="8">Biblioteca</option>
                <option value="9">Vigilancia</option>
                <option value="10">Formatos</option>
                <option value="11">Sistema de Gestión Ambiental</option>
                <option value="12">Instructivos</option>
                <option value="13">Minutas</option>
                <option value="14">Mapa de Procesos</option>
                <option value="15">Deficiones</option>
                <option value="16">Registros</option>
                <option value="17">Manual de Organización</option>
                <option value="18">Protección Civil</option>
                <option value="20">CIDEP</option>
                <option value="21">Junta Directiva</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success mb-3">Buscar</button>
        </div>
    </form>
    <p></p>
    <p></p>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Extensión</th>
            <th scope="col">Área</th>
            <th scope="col">Cargo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->Abreviatura}} {{$usuario->ApPaterno}} {{$usuario->ApMaterno}} {{$usuario->Nombre}}</td>
                    <td>{{$usuario->Email}}</td>
                    <td>{{$usuario->Extension}}</td>
                    <td>{{$usuario->NombreArea}}</td>
                    <td>{{$usuario->NombreCargo}}</td>
                    <td width="30">
                        <button class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#editarUsuarioC{{$usuario->id}}" aria-controls="editarUsuarioC{{$usuario->id}}" aria-expanded="false">
                            <span data-feather="key" class="align-text-bottom"></span>
                        </button>
                    </td>
                    <td width="30">
                        <button class="btn btn-success collapsed" data-bs-toggle="collapse" data-bs-target="#editarUsuario{{$usuario->id}}" aria-controls="editarUsuario{{$usuario->id}}" aria-expanded="false">
                            <span data-feather="edit-2" class="align-text-bottom"></span>
                        </button>
                    </td>
                    <td width="30">
                        <form action="{{route('eliminarUsuarios',['id' => $usuario->id])}}" method="post">
                            @method('DELETE')
                            @csrf 
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar este usuario?')"><span data-feather="trash" class="align-text-bottom"></span></button>
                        </form>
                    </td>
                </tr>
                <tr class="collapse" id="editarUsuarioC{{$usuario->id}}">
                    <td colspan="8">
                        <div class="row g-1">
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-md-8 col-lg-8">
                                <form action="{{route('cambiarContrasenia',['id' => $usuario->id])}}" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <label for="Password" class="form-label">Nueva contraseña</label>
                                            <input type="password" class="form-control" name="Password" id="Password">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="PasswordR" class="form-label">Confirmar contraseña</label>
                                            <input type="password" class="form-control" name="PasswordR" id="PasswordR">
                                        </div>
                                        <div class="col-sm-12" align="right">
                                            <input type="submit" class="btn btn-success" value="Cambiar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="collapse" id="editarUsuario{{$usuario->id}}">
                    <td colspan="8">
                        <div class="row g-1">
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-md-8 col-lg-8">
                                <form action="{{route('editarUsuarios',['id' => $usuario->id])}}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                            <label for="GradoAcademico" class="form-label">Grado Academico</label>
                                            <select class="form-select" name="GradoAcademico" id="GradoAcademico">
                                                <option value="1" {{$usuario->GradoAcademico == 1 ? 'selected' : ''}}>Doctor</option>
                                                <option value="2" {{$usuario->GradoAcademico == 2 ? 'selected' : ''}}>Doctora</option>
                                                <option value="3" {{$usuario->GradoAcademico == 3 ? 'selected' : ''}}>Profesora</option>
                                                <option value="4" {{$usuario->GradoAcademico == 4 ? 'selected' : ''}}>Profesor</option>
                                                <option value="5" {{$usuario->GradoAcademico == 5 ? 'selected' : ''}}>Maestro en Ciencias</option>
                                                <option value="6" {{$usuario->GradoAcademico == 6 ? 'selected' : ''}}>Maestro en DGDP</option>
                                                <option value="7" {{$usuario->GradoAcademico == 7 ? 'selected' : ''}}>Ingeniero</option>
                                                <option value="8" {{$usuario->GradoAcademico == 8 ? 'selected' : ''}}>Licenciado</option>
                                                <option value="9" {{$usuario->GradoAcademico == 9 ? 'selected' : ''}}>L.I.N.</option>
                                                <option value="10" {{$usuario->GradoAcademico == 10 ? 'selected' : ''}}>L.A.E.</option>
                                                <option value="11" {{$usuario->GradoAcademico == 11 ? 'selected' : ''}}>Técnico</option>
                                                <option value="12" {{$usuario->GradoAcademico == 12 ? 'selected' : ''}}>Civil</option>
                                                <option value="13" {{$usuario->GradoAcademico == 13 ? 'selected' : ''}}>Contador Público</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="Nombre" class="form-label">Nombre(s)</label>
                                            <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{$usuario->Nombre}}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="ApPaterno" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" name="ApPaterno" id="ApPaterno" value="{{$usuario->ApPaterno}}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="ApMaterno" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" name="ApMaterno" id="ApMaterno" value="{{$usuario->ApMaterno}}" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="Extension" class="form-label">Extensión</label>
                                            <input type="text" class="form-control" name="Extension" id="Extension" value="{{$usuario->Extension}}" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="Email" class="form-label">e-mail</label>
                                            <input type="email" class="form-control" name="Email" id="Email" value="{{$usuario->Email}}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="Area_Id" class="form-label">Área</label>
                                            <select class="form-select" name="Area_Id" id="Area_Id">
                                                <option value="1" {{$usuario->Area_Id == 1 ? 'selected' : ''}}>Dirección</option>
                                                <option value="2" {{$usuario->Area_Id == 2 ? 'selected' : ''}}>Subdirección Técnica y de Vinculación Área Técnica</option>
                                                <option value="3" {{$usuario->Area_Id == 3 ? 'selected' : ''}}>Subdirección Académica</option>
                                                <option value="4" {{$usuario->Area_Id == 4 ? 'selected' : ''}}>Subdirección Técnica y de Vinculación Área Vinculación</option>
                                                <option value="5" {{$usuario->Area_Id == 5 ? 'selected' : ''}}>Departamento de Servicios Administrativos y Técnicos</option>
                                                <option value="6" {{$usuario->Area_Id == 6 ? 'selected' : ''}}>Unidad de Informática</option>
                                                <option value="7" {{$usuario->Area_Id == 7 ? 'selected' : ''}}>Sala de Juntas</option>
                                                <option value="8" {{$usuario->Area_Id == 8 ? 'selected' : ''}}>Biblioteca</option>
                                                <option value="9" {{$usuario->Area_Id == 9 ? 'selected' : ''}}>Vigilancia</option>
                                                <option value="10" {{$usuario->Area_Id == 10 ? 'selected' : ''}}>Formatos</option>
                                                <option value="11" {{$usuario->Area_Id == 11 ? 'selected' : ''}}>Sistema de Gestión Ambiental</option>
                                                <option value="12" {{$usuario->Area_Id == 12 ? 'selected' : ''}}>Instructivos</option>
                                                <option value="13" {{$usuario->Area_Id == 13 ? 'selected' : ''}}>Minutas</option>
                                                <option value="14" {{$usuario->Area_Id == 14 ? 'selected' : ''}}>Mapa de Procesos</option>
                                                <option value="15" {{$usuario->Area_Id == 15 ? 'selected' : ''}}>Deficiones</option>
                                                <option value="16" {{$usuario->Area_Id == 16 ? 'selected' : ''}}>Registros</option>
                                                <option value="17" {{$usuario->Area_Id == 17 ? 'selected' : ''}}>Manual de Organización</option>
                                                <option value="18" {{$usuario->Area_Id == 18 ? 'selected' : ''}}>Protección Civil</option>
                                                <option value="20" {{$usuario->Area_Id == 20 ? 'selected' : ''}}>CIDEP</option>
                                                <option value="21" {{$usuario->Area_Id == 21 ? 'selected' : ''}}>Junta Directiva</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="Cargo_Id" class="form-label">Cargo</label>
                                            <select class="form-select" name="Cargo_Id" id="Cargo_Id">
                                                <option value="1" {{$usuario->Cargo_Id == 1 ? 'selected' : ''}}>Director</option>
                                                <option value="2" {{$usuario->Cargo_Id == 2 ? 'selected' : ''}}>Ingeniero de Proyectos</option>
                                                <option value="3" {{$usuario->Cargo_Id == 3 ? 'selected' : ''}}>Asistente</option>
                                                <option value="4" {{$usuario->Cargo_Id == 4 ? 'selected' : ''}}>Subdirector</option>
                                                <option value="5" {{$usuario->Cargo_Id == 5 ? 'selected' : ''}}>Jefe de Departamento</option>
                                                <option value="6" {{$usuario->Cargo_Id == 6 ? 'selected' : ''}}>Responsable Técnico de Laboratorio</option>
                                                <option value="7" {{$usuario->Cargo_Id == 7 ? 'selected' : ''}}>Profesor Investigador</option>
                                                <option value="8" {{$usuario->Cargo_Id == 8 ? 'selected' : ''}}>Control Escolar</option>
                                                <option value="9" {{$usuario->Cargo_Id == 9 ? 'selected' : ''}}>Ingeniero de Vinculación de Proyectos</option>
                                                <option value="10" {{$usuario->Cargo_Id == 10 ? 'selected' : ''}}>Control y Presupuesto</option>
                                                <option value="11" {{$usuario->Cargo_Id == 11 ? 'selected' : ''}}>Analista</option>
                                                <option value="12" {{$usuario->Cargo_Id == 12 ? 'selected' : ''}}>Banco de Datos</option>
                                                <option value="13" {{$usuario->Cargo_Id == 13 ? 'selected' : ''}}>Contabilidad y Presupuesto</option>
                                                <option value="14" {{$usuario->Cargo_Id == 14 ? 'selected' : ''}}>Contabilidad de Vinculación</option>
                                                <option value="15" {{$usuario->Cargo_Id == 15 ? 'selected' : ''}}>Responsable de Activo Fijo</option>
                                                <option value="16" {{$usuario->Cargo_Id == 16 ? 'selected' : ''}}>Capital Humano</option>
                                                <option value="17" {{$usuario->Cargo_Id == 17 ? 'selected' : ''}}>Ingeniero de Enlace con CONUEE</option>
                                                <option value="18" {{$usuario->Cargo_Id == 18 ? 'selected' : ''}}>Auxiliar Administrativo</option>
                                                <option value="19" {{$usuario->Cargo_Id == 19 ? 'selected' : ''}}>Ingeniero de Sistemas</option>
                                                <option value="20" {{$usuario->Cargo_Id == 20 ? 'selected' : ''}}>Responsable del POA</option>
                                                <option value="21" {{$usuario->Cargo_Id == 21 ? 'selected' : ''}}>Protección Civil</option>
                                                <option value="22" {{$usuario->Cargo_Id == 22 ? 'selected' : ''}}>Ingreso Auto-Generado y Presupuesto</option>
                                                <option value="23" {{$usuario->Cargo_Id == 23 ? 'selected' : ''}}>Proyectos de Investigación</option>
                                                <option value="24" {{$usuario->Cargo_Id == 24 ? 'selected' : ''}}>Activo fijo</option>
                                                <option value="25" {{$usuario->Cargo_Id == 25 ? 'selected' : ''}}>Representante de Dirección</option>
                                                <option value="26" {{$usuario->Cargo_Id == 26 ? 'selected' : ''}}>Encargado de Biblioteca</option>
                                                <option value="27" {{$usuario->Cargo_Id == 27 ? 'selected' : ''}}>Sin Cargo</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="Rol" class="form-label">Rol</label>
                                            <select class="form-select" name="Rol" id="Rol">
                                                <option {{$usuario->Rol == "Administrador" ? 'selected' : ''}}>Administrador</option>
                                                <option {{$usuario->Rol == "Oficialía de Partes" ? 'selected' : ''}}>Oficialía de Partes</option>
                                                <option {{$usuario->Rol == "Director" ? 'selected' : ''}}>Director</option>
                                                <option {{$usuario->Rol == "Subdirector" ? 'selected' : ''}}>Subdirector</option>
                                                <option {{$usuario->Rol == "Jefe de Departamento" ? 'selected' : ''}}>Jefe de Departamento</option>
                                                <option {{$usuario->Rol == "Personal del CMPL" ? 'selected' : ''}}>Personal del CMPL</option>
                                                <option {{$usuario->Rol == "Representante de Dirección" ? 'selected' : ''}}>Representante de Dirección</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12" align="right">
                                            <input type="submit" class="btn btn-success" value="Editar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection