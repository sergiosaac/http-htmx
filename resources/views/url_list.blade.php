@foreach ($urls as $url)

    <div class="request">

        <form action="/response" method="POST">
            
            <!-- <input type="hidden" name="protocolo" value="{{ $url->host->protocolo }}">
            <input type="hidden" name="host" value="{{ $url->host->host }}">
            <input type="hidden" name="method" value="{{ $url->method }}">
            <input type="hidden" name="port" value="{{ $url->host->port }}">
            <input type="hidden" name="url" value="{{ $url->url }}">
            <input type="hidden" name="header" value='{{ $url->header }}'>
            <input type="hidden" name="input" value="{{ $url->input }}">
            <input type="hidden" name="asform" value="{{ $url->asform }}">
            
            @csrf -->
            
            <a 
                href="/servicios/{{ $url->id }}"
                hx-get="/request/{{ $url->id }}" 
                hx-target=".contenedor-azul">
                <strong style="color:#004d92;">
                {{ $url->method }}
                </strong>
                {{ $url->url }}
            </a>

        </form>
        
        <span 
            class="edit"
            hx-get="/xurls/{{ $url->id }}"
            hx-target=".request-detail_{{ $url->id }}">
            edit
        </span>
        
        <span 
            class="del"
            hx-delete="/xurls/{{ $url->id }}"
            hx-swap="innerHTML"
            hx-target="#url_list"
            hx-confirm="Sure????">
            del
        </span>
    </div>

    <div class="request-detail_{{ $url->id }}">
    </div>

@endforeach