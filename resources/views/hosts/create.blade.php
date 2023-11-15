<div id="admin_host">

    <p style="color:#004d92;">my HOSTs</p>

    <div style="opacity:0.8; background-color:#f8f8f8; padding:15px;">

        <form action="/host" method="post">

            <label for="method">Protocolo:</label>
            <select id="method" name="protocolo">
                <option value="http">http</option>
                <option value="https">https</option>
            </select>

            <label for="host">Host:</label>
            <input type="text" name="host" value="">
        
            <label for="port">Port:</label>
            <input type="text" name="port" value="">

            @csrf

            <button 
                hx-post="/xhost"
                hx-target=".contenedor-azul"
                class="adders">
                guardar
            </button>

            <button
                class="adders"
                hx-get="/juancheo"
                hx-trigger="click"
                hx-swap="innerHTML"
                hx-target=".contenedor-azul">
                cerrar
            </button>

        </form>

    </div>

</div>