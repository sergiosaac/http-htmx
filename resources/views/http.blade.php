<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenedores Rojo y Azul con Campos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            /* font-family: "Gill Sans", sans-serif; */
            /* font-family: verdana; */
            font-family: system-ui;
            /* font-family: Georgia, serif; */
            font-size:15px;
        }

        .contenedor-rojo {
            flex: 1;
            text-align: left;
            padding: 20px;
        }

        .contenedor-azul {
            flex: 1;
            text-align: left;
            padding: 20px;
        }

        .contenedor-rojo label {
            display: block;
            margin-bottom: 5px;
        }

        .contenedor-rojo input,
        .contenedor-rojo textarea,
        .contenedor-rojo select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .contenedor-azul input,
        .contenedor-azul textarea,
        .contenedor-azul select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .contenedor-rojo a {
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            position: relative;
        }

        .request {
            display: flex;
            align-items: center;
        }

        .request span {
            font-size: 12px;
            margin-left: 10px;
        }

        .request span.edit {
            color: green;
        }

        .request span.del {
            color: red;
        }

        .request-detail {
            padding-left: 20px;
        }

        .request-detail label {
            margin-top: 10px;
            display: block;
        }

        .request-detail textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .request-detail select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input, select, textarea {
            /* border-opacity:0.3; */
            border: 2px solid #f0f0f0;
        }

        .adders {
            margin-top:10px;
            margin-bottom:10px;
            padding:6px;
            background-color:white;
            border: 2px solid #f0f0f0;
            border-radius: 10px 10px 10px 10px;
            -webkit-border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            transition:0.1s;
        }

        .adders:hover{
            background-color:#E4E5E6;
            /* opacity: 0.4; */
            /* color:white; */
        }

        hr {
            opacity: 0.3;
        }



    </style>

    <script src="https://unpkg.com/htmx.org@1.9.8" integrity="sha384-rgjA7mptc2ETQqXoYC3/zJvkU7K/aP44Y+z7xQuJiVnB/422P/Ak+F/AqFR7E4Wr" crossorigin="anonymous"></script>
</head>
<body>

    <div class="contenedor-rojo">
        <h2 style="color:#00d061;" >REQUEST</h2>

        <br>
        <br>

        <button 
            class="adders"
            hx-get="/admin_host"
            hx-target=".contenedor-azul">
            admin host
        </button>
        
        <select id="opciones" name="opciones">
            <option value="opcion1">10.118.1.57</option>
            <option value="opcion2">localhost:8080</option>
        </select>

        <hr/>

        <button 
            class="adders"
            hx-get="/admin_url"
            hx-target=".contenedor-azul">
            admin url
        </button>

        <input type="text" placeholder="buscar..." id="campo1" name="campo1">

        <div class="lista-requets">
            
            <div class="request">

                <form action="/response" method="POST">
                    <input type="hidden" name="protocolo" value="http">
                    <input type="hidden" name="host" value="homebanking-cms-gc-php-bonus-test.apps.ocpconti.visionbanco.com">
                    <input type="hidden" name="method" value="get">
                    <input type="hidden" name="port" value="80">
                    <input type="hidden" name="url" value="/api/category">
                    <input type="hidden" name="header" value='{"Accept":"application/json","Authorization":"Bearer fjC3hbbcMvzsdFNJQvJcy95gpp1j47eFb8zMsIbM"}'>
                    <input type="hidden" name="input" value="{}">
                    @csrf
                    <a 
                        href="/servicios"
                        hx-post="/response" 
                        hx-target=".contenedor-azul">
                        <strong style="color:#004d92;">
                            GET -
                        </strong>
                        /category
                    </a>
                </form>
                <span 
                    class="edit"
                    hx-get="/admin_url"
                    hx-target=".request-detail">
                    edit
                </span>
                <span class="del">del</span>
            </div>

            <div class="request-detail">
            </div>
            
        </div>

        <div class="lista-requets">
            
            <div class="request">

                <form action="/response" method="POST">
                    <input type="hidden" name="protocolo" value="http">
                    <input type="hidden" name="host" value="homebanking-cms-gc-php-bonus-test.apps.ocpconti.visionbanco.com">
                    <input type="hidden" name="method" value="get">
                    <input type="hidden" name="port" value="80">
                    <input type="hidden" name="url" value="/api/category/2">
                    <input type="hidden" name="header" value='{"Accept":"application/json","Authorization":"Bearer fjC3hbbcMvzsdFNJQvJcy95gpp1j47Fb8zMsIbM"}'>
                    <input type="hidden" name="input" value="{}">
                    @csrf
                    <a 
                        href="/servicios"
                        hx-post="/response" 
                        hx-target=".contenedor-azul">
                        <strong style="color:#004d92;">
                            GET -
                        </strong>
                        /category/2
                    </a>
                </form>
                <span 
                    class="edit"
                    hx-get="/admin_url"
                    hx-target=".request-detail">
                    edit
                </span>
                <span class="del">del</span>
            </div>

            <div class="request-detail">
            </div>
            
        </div>

    </div>

    <div class="contenedor-azul">

        <!-- <img 
            height="40"
            width="40"
            style="margin:80px;" 
            src="Iphone-spinner-2.gif" 
            alt=""> -->
    
    </div>

</body>
</html>
