<p style="color:#004d92;">
    new URL for
    <strong>
        {{ $host->host }}:{{ $host->port }}
    </strong>
</p>

<br/>

<div style="opacity:0.8; background-color:#f8f8f8; padding:15px;">

    <form action="/xurls" method="post">

        <label for="method">Method:</label>
        <select id="method" name="method">
            <option value="post">post</option>
            <option value="get">get</option>
            <option value="put">put</option>
            <option value="patch">patch</option>
            <option value="delete">delete</option>
        </select>

        <input type="text" name="url">
        <input type="hidden" name="host_id" value="{{ $host['id'] }}">

        <label for="header">Headers:</label>
        <textarea rows="7" cols="20" id="header" name="header"></textarea>

        <label for="asForm">As form (application/x-www-form-urlencoded) :</label>
        <select id="asform" name="asform">
            <option value="n">No</option>
            <option value="s">Si</option>
        </select>

        <label for="asForm">SetCookie (si tengo que usar sesiones con cookies) :</label>
        <select id="setcookie" name="setcookie">
            <option value="n">No</option>
            <option value="s">Si</option>
        </select>

        <label for="input">Inputs:</label>
        <textarea rows="7" cols="20" id="input" name="input"></textarea>

        @csrf

        <button 
            hx-post="/xurls"
            hx-target="#url_list"
            class="adders">
            guardar
        </button>

        <button
            class="adders"
            hx-trigger="click" 
            hx-get="/juancheo"
            hx-target=".contenedor-azul">
            cerrar
        </button>

    </form>
</div>


