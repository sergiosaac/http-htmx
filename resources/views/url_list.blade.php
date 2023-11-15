@foreach ($urls as $url)
                
    <div class="lista-requets">
        
        <div class="request">

            <form action="/response" method="POST">
                
                <input type="hidden" name="protocolo" value="{{ $url->host->protocolo }}">
                <input type="hidden" name="host" value="{{ $url->host->host }}">
                <input type="hidden" name="method" value="{{ $url->method }}">
                <input type="hidden" name="port" value="{{ $url->host->port }}">
                <input type="hidden" name="url" value="{{ $url->url }}">
                <input type="hidden" name="header" value='{{ $url->header }}'>
                <input type="hidden" name="input" value="{{ $url->input }}">
                
                @csrf
                
                <a 
                    href="/servicios"
                    hx-post="/response" 
                    hx-target=".contenedor-azul">
                    <strong style="color:#004d92;">
                    {{ $url->method }}
                    </strong>
                    {{ $url->url }}
                </a>

            </form>
            
            <span 
                class="edit"
                hx-get="/url/{{ $url->id }}"
                hx-target=".request-detail_{{ $url->id }}">
                edit
            </span>
            
            <span 
                class="del"
                hx-delete="/url/{{ $url->id }}/{{ $url->host->id }}"
                hx-target="body"
                hx-confirm="Sure????">
                del
            </span>
        
        </div>

        <div class="request-detail_{{ $url->id }}">
        </div>
        
    </div>

@endforeach