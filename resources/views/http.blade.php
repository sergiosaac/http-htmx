<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>http - htmx</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="contenedor-rojo">
        
        <h2 style="color:#00d061;" >
            
            REQUEST

            <strong style="color:black; font-size:13px;" >
                for 
                <span 
                    hx-trigger="click"
                    hx-get="/http/{{ $host_selected->id }}"
                    hx-swap="outerHTML"
                    hx-target="body"
                    style="color:#004d92 !important;">
                    {{ $host_selected->host_print() }}
                </span>
            </strong>
        </h2>

        <button 
            class="adders"
            hx-get="/xhosts"
            hx-target=".contenedor-azul">
            admin host
        </button>

        <div id="host_list">
            @include('host_list')
        </div>

        <hr/>

        <button 
            class="adders"
            hx-get="/xurls-create/{{ $host_selected->id }}"
            hx-target=".contenedor-azul">
            + url
        </button>

        <!-- <input type="text" placeholder="buscar..." id="campo1" name="campo1"> -->

        <div id="url_list">
            @include('url_list')
        </div>
        
    </div>

    <div class="contenedor-azul">
    </div>

</body>
</html>
