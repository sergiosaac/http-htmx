<div id="admin_host">

    <p style="color:#004d92;">my HOSTs</p>
    
    @foreach($hosts as $host)
        <p class="host_list">
            {{ $host->host }}
            <span 
                class="edit"
                hx-get="/admin_url"
                hx-target=".request-detail">
                edit
            </span>
            
            <span class="del">del</span>
        </p>
    @endforeach

    <button class="adders" > agregar </button>
    
</div>