<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>http - htmx</title>
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

            padding:20px;
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

        .request span, .host_list span {
            font-size: 12px;
            margin-left: 10px;
        }

        .request span.edit, .edit  {
            color: green;
        }

        .request span.del, .del {
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

        .edit, .del {
            margin-top:2px;
            margin-bottom:2px;
            padding:4px;
            background-color:white;
            /* border: 2px solid #f0f0f0; */
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

        .edit:hover{
            background-color:#E4E5E6;
        }

        .del:hover{
            background-color:#E4E5E6;
        }

        hr {
            opacity: 0.3;
        }

    </style>
    <script src="https://unpkg.com/htmx.org@1.9.8" integrity="sha384-rgjA7mptc2ETQqXoYC3/zJvkU7K/aP44Y+z7xQuJiVnB/422P/Ak+F/AqFR7E4Wr" crossorigin="anonymous"></script>
</head>
<body>

    <div class="contenedor-rojo">
        
        <h2 style="color:#00d061;" >
            
            REQUEST

            @if ($host_selected->port == 80)
                <strong style="color:black; font-size:13px;" >
                    for 
                    <span 
                        hx-trigger="click" 
                        hx-get="/http/{{ $host_selected->id }}"
                        hx-swap="outerHTML"
                        hx-target="body"
                        style="color:#004d92 !important;">
                        {{ $host_selected->host }}
                    </span>
                </strong>
            @else
                <strong style="color:black; font-size:13px;" >
                    for
                    <span 
                        hx-trigger="click" 
                        hx-get="/http/{{ $host_selected->id }}"
                        hx-swap="outerHTML"
                        hx-target="body"
                        style="color:#004d92 !important;">
                        {{ $host_selected->host.':'.$host_selected->port }}
                    </span>

                </strong>
            @endif

        </h2>

        <button 
            class="adders"
            hx-get="/admin_host"
            hx-target=".contenedor-azul">
            admin host
        </button>
        
        <select
            name="host"
            hx-get="/http"
            hx-trigger="change"
            hx-swap="outerHTML"
            hx-target="body">

            @foreach ($hosts as $host)
                <option 
                    value="{{ $host->id }}"
                    <?php if ($host_selected->id == $host->id) echo 'selected'; ?>
                    >
                    
                    @if ($host->port == 80)
                        {{ $host->host }}
                    @else
                        {{ $host->host.':'.$host->port }}
                    @endif
                    
                </option>
            @endforeach
        
        </select>

        <hr/>

        <button 
            class="adders"
            hx-get="/create_url/{{ $host_selected->id }}"
            hx-target=".contenedor-azul">
            + url
        </button>

        <input type="text" placeholder="buscar..." id="campo1" name="campo1">

        <div id="url_list">
            @include('url_list')
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
