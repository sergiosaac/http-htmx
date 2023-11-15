<div style="opacity:0.8; background-color:#f8f8f8; padding:15px;">

    <form action="/host" method="patch">

        <label for="protocolo">Protocolo:</label>
        <select id="protocolo" name="protocolo">
            <option <?php if ($host->protocolo == 'http') echo 'selected'; ?> value="http">http</option>
            <option <?php if ($host->protocolo == 'https') echo 'selected'; ?> value="https">https</option>
        </select>

        <label for="host">Host:</label>
        <input type="text" name="host" value="{{ $host->host }}">
    
        <label for="port">Port:</label>
        <input type="text" name="port" value="{{ $host->port }}">

        @csrf

        <button 
            hx-patch="/xhost/{{ $host->id }}"
            hx-target=".contenedor-azul"
            class="adders">
            guardar
        </button>

        <button
            class="adders"
            hx-get="/juancheo"
            hx-trigger="click"
            hx-swap="innerHTML"
            hx-target="#host-detail_{{ $host->id }}">
            cerrar
        </button>

    </form>
</div>