<select
    name="host"
    hx-get="/http"
    hx-trigger="change"
    hx-swap="outerHTML"
    hx-target="body">

    @foreach ($hosts as $host)
        <option 
            value="{{ $host->id }}"
            <?php if ($host_selected->id == $host->id) echo 'selected'; ?>
            >
            
            @if ($host->port == 80)
                {{ $host->host }}
            @else
                {{ $host->host.':'.$host->port }}
            @endif
            
        </option>
    @endforeach

</select>