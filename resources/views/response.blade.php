<div id="response">

    <h2 style="color:#004d92;" >RESPONSE</h2>

    <strong style="color:blue" > {{ strtoupper($method) }} - {{ $url }} </strong>
    
    <ul style="list-style-type: none; padding: 0;">
        
        <li><strong>Status:</strong> {{ $response->status() }} </li>
        @foreach ($response->headers() as $key => $header)
            <li><strong> {{ $key }} </strong>: {{ $header[0] }} </li>
        @endforeach

    </ul>

    <strong>Body: </strong>

    <pre style="opacity:0.6; font-size:13px;" >
{{ $body }}
    </pre>
</div>