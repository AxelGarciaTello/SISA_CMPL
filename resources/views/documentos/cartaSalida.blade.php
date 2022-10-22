<html>
    <body>
        <img src="Imagenes/logo_SEP.jpg" width="40%">
        <img src="Imagenes/logo_poli_nombre.png" width="20%" align="right">
        <img src="Imagenes/logo_CMPL.png" width="20%" align="right">
        <p></p>
        <p></p>
        <p></p>
        <b>
            <div align="right">
                {{$request->Fecha}}
                <br>
                {{$request->Numero}}
            </div>
        </b>
        <p></p>
        <b>
            {{$request->Destinatario}}
            <br>
            {{$request->Puesto}}
            <br>
            PRESENTE
        </b>
        <p></p>
        <div style="text-align: justify;">
            {{$request->Mensaje}}
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
        <b>
            {{$request->Destinatario}}
            <br>
            {{$request->Cargo}}
        </b>
    </body>
</html>