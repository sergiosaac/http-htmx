<div style="opacity:0.8; background-color:#f8f8f8; padding:25px;">

    <h2 style="color:#004d92;">URLs</h2>

    <div style="opacity:0.8; background-color:#f8f8f8; padding:1px;">
        <form action="/xurls/{{ $url['id'] }}" method="patch">
            <label for="campo4">Method:</label>
            <select id="opciones" name="method">
                <option <?php if ($url['method'] == 'post') echo 'selected'; ?> value="post">post</option>
                <option <?php if ($url['method'] == 'get') echo 'selected'; ?> value="get">get</option>
                <option <?php if ($url['method'] == 'put') echo 'selected'; ?> value="put">put</option>
                <option <?php if ($url['method'] == 'patch') echo 'selected'; ?> value="patch">patch</option>
                <option <?php if ($url['method'] == 'delete') echo 'selected'; ?> value="DELETE">delete</option>
            </select>

            <label for="method">Url:</label>
            <input type="text" name="url" value="{{ $url['url'] }}">

            <label for="campo3">Headers:</label>
            <textarea rows="7" cols="20" id="header" name="header">{{ $url['header'] }}</textarea>

            <label for="asForm">As form (application/x-www-form-urlencoded) :</label>
            <select id="asform" name="asform">
                <option <?php if ($url['asform'] == 's') echo 'selected'; ?> value="s">Si</option>
                <option <?php if ($url['asform'] == 'n') echo 'selected'; ?> value="n">No</option>
            </select>

            <label for="asForm">SetCookie (si tengo que usar sesiones con cookies, afecta todas las urls del host):</label>
            <select id="setcookie" name="setcookie">
                <option <?php if ($url['setcookie'] == 's') echo 'selected'; ?> value="s">Si</option>
                <option <?php if ($url['setcookie'] == 'n') echo 'selected'; ?> value="n">No</option>
            </select>

            <label for="campo3">Inputs:</label>
            <textarea rows="7" cols="20" id="input" name="input">{{ $url['input'] }}</textarea>
            
            @csrf

            <button 
                hx-patch="/xurls/{{ $url['id'] }}"
                hx-target="#url_list"
                class="adders">
                guardar
            </button>

            <button
                class="adders"
                hx-get="/juancheo"
                hx-trigger="click"
                hx-swap="innerHTML"
                hx-target=".request-detail_{{ $url['id'] }}">
                cerrar
            </button>
            
        </form>
    
    </div>

</div>