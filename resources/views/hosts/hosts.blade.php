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
            <a 
                style="text-decoration:none; color:#004d92 !important;"
                href="/http/{{ $host->id }}"
                hx-trigger="click"
                hx-get="/http/{{ $host->id }}"
                hx-swap="outerHTML"
                hx-target="body">
                <strong>
                    {{ $host->host_print() }}
                </strong>
            </a>
            
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