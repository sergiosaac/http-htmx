<div id="response">

    <h2 style="color:#004d92;" >RESPONSE</h2>

    <strong style="color:blue" > {{ strtoupper($method) }} - {{ $url }} </strong>

    @if($response)

        

        <ul style="list-style-type: none; padding: 0;">
            
            <li><strong>Status:</strong> {{ $response->status() }} </li>
            @foreach ($response->headers() as $key => $header)
                <li><strong> {{ $key }} </strong>: {{ $header[0] }} </li>
                @if($key === 'Set-Cookie')
                    <span style="font-size:12px; color:grey;">
                        Quizás podrías usar sesion en este servicio, para eso podes agrega este key/value en tus headers.<br/>
                        <span style="color:#004d92 !important;font-size:12px" >
                                "Cookie" : "{{ $header[0] }}"
                        </span>
                    </span>
                    <br/>
                    <br/>
                @endif
            @endforeach
        </ul>

        <strong>Time </strong> : {{ $execution_time_print }} <br/>

        <strong>Body: </strong>
        
    <pre style="opacity:0.6; font-size:13px;" >
{{ $body }}
    </pre>
    @else
        <p>
            <strong>Body: </strong>
        </p>
        {{ $body }}
    
    @endif
   
</div>