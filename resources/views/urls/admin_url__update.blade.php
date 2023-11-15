<div style="opacity:0.8; background-color:#f8f8f8; padding:25px;" id="admin_url">

    <h2 style="color:#004d92;">URLs</h2>

    <div style="opacity:0.8; background-color:#f8f8f8; padding:1px;">
        <form action="/url/{{ $url['id'] }}" method="PATCH">
            <label for="campo4">Method:</label>
            <select id="opciones" name="method">
                <option <?php if ($url['method'] == 'post') echo 'selected'; ?> value="post">post</option>
                <option <?php if ($url['method'] == 'get') echo 'selected'; ?> value="get">get</option>
                <option <?php if ($url['method'] == 'put') echo 'selected'; ?> value="put">put</option>
                <option <?php if ($url['method'] == 'patch') echo 'selected'; ?> value="patch">patch</option>
                <option <?php if ($url['method'] == 'delete') echo 'selected'; ?> value="DELETE">delete</option>
            </select>

            <input type="text" name="url" value="{{ $url['url'] }}">

            <label for="campo3">Headers:</label>
            <textarea id="header" name="header">{{ $url['header'] }}</textarea>

            <label for="campo3">Inputs:</label>
            <textarea id="input" name="input">{{ $url['input'] }}</textarea>
            @csrf

            <button 
                hx-patch="/url/{{ $url['id'] }}"
                hx-target="#url_list"
                class="adders">
                guardar
            </button>

            <button
                class="adders"
                hx-trigger="click" 
                hx-get="/url_list/{{ $url['host']->id }}"
                hx-target="#url_list">
                cerrar
            </button>
        
        </form>
    
    </div>

</div>