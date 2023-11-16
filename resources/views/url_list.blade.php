<style>
.htmx-settling img {
  opacity: 0;
}
img {
 transition: opacity 300ms ease-in;
 margin-bottom:-3px;
}
</style>
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
                class="fade-me-out"    
                href="/servicios/{{ $url->id }}"
                hx-get="/request/{{ $url->id }}" 
                hx-target=".contenedor-azul">
                <img alt="Result loading..." class="htmx-indicator" width="15" height="15" src="Iphone-spinner-2.gif"/>
                <strong style="color:#004d92;">
                {{ $url->method }}
                </strong>
                {{ $url->url }}
            </a>

        </form>

        @if ($url->setcookie === 's')
        <span style="opacity:0.3;color:black;margin-left:-2px;" class="edit">setCookie</span>
        @endif
        
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