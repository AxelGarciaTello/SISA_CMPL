<!doctype html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <title>CMPL</title>

        <style>


          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
          html,
          body {
            height: 100%;
          }

          body {
            background-image: url("{{asset('Imagenes/banner5.jpg')}}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
          }

          .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            font-weight: 400;
          }

          .form-signin .form-floating:focus-within {
            z-index: 2;
          }

          .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
          }

          .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
          }
        </style>
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="{{route('ingreso')}}" method="POST">
                @csrf
                <img class="mb-4" width="250" src="{{asset('Imagenes/logo_CMPL.png')}}">
                <h1 class="h3 mb-3 fw-normal">Ingrese al sistema</h1>
                <div class="form-floating">
                    <input type="email" class="form-control" id="correo" name="Email">
                    <label for="correo">Correo</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="contrasenia" name="Password">
                    <label for="contrasenia">Contraseña</label>
                </div>
                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>  
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input class="w-100 btn-lg btn-primary" type="submit" value="Ingresar">
            </form>
        </main>
    </body>
</html>
