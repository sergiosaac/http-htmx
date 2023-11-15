<div id="admin_url">

    <p style="color:#004d92;">new URL for <strong>{{ $host['host'] }}:{{ $host['port'] }}</strong></p>

    <div style="opacity:0.8; background-color:#f8f8f8; padding:15px;" class="request-detail">

        <form action="/url" method="POST">

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
            <textarea id="header" name="header"></textarea>

            <label for="input">Inputs:</label>
            <textarea id="input" name="input"></textarea>

            @csrf

            <button 
                hx-post="/url"
                hx-target="body"
                class="adders">
                guardar
            </button>

            <button
                class="adders"
                hx-trigger="click" 
                hx-get="/http/{{ $host['id'] }}"
                hx-target="body">
                cerrar
            </button>

        </form>
    </div>
</div>

