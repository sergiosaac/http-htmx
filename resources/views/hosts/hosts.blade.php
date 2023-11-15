<div id="admin_host">

    <p style="color:#004d92;">my HOSTs</p>

    <button 
        class="adders"
        hx-get="/xhosts-create"
        hx-swap="innerHTML"
        hx-target=".contenedor-azul">
         + host 
    </button>
    
    @foreach($hosts as $host)
        
        <p class="host_list">
            <strong>
                {{ $host->host_print() }}
            </strong>
            <span 
                class="edit"
                hx-get="/xhosts/{{ $host->id }}"
                hx-target="#host-detail_{{ $host->id }}">
                edit
            </span>
            
            <span 
                class="del"
                hx-delete="/xhosts/{{ $host->id }}"
                hx-swap="innerHTML"
                hx-target=".contenedor-azul"
                hx-confirm="Sure????">
                del
            </span>
        </p>

        <div id="host-detail_{{ $host->id }}"></div>
    
    @endforeach

</div>