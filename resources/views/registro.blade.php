<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{route('registro')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre">
        </div>
        <div class="mb-3">
            <label for="ApPaterno" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="ApPaterno" name="ApPaterno">
        </div>
        <div class="mb-3">
            <label for="ApMaterno" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="ApMaterno" name="ApMaterno">
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" class="form-control" id="Email" name="Email">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password">
        </div>
        <div class="mb-3">
            <label for="Extension" class="form-label">Extension</label>
            <input type="number" class="form-control" id="Extension" name="Extension">
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Registar">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
