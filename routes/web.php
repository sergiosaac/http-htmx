<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Url;
use App\Models\Host;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//main
Route::get('/', function () {
    return redirect('http');
});

Route::get('/http/{id?}', function (Request $request, $id = null) {

    $hosts = Host::all();

    if ($request->host) {
        $host_selected = Host::find($request->host);
    } elseif($id) {
        $host_selected = Host::find($id);
    } else {
        $host_selected = Host::find(1);
    }

    $urls = $host_selected->urls;
    
    return view('http',
        [
            'urls' => $urls,
            'hosts' => $hosts,
            'host_selected' => $host_selected
        ]
    );
});

Route::post('/response', function (Request $request) {

    $http = [];

    if ($request->port == 80) {
        $http['url'] = $request->protocolo.'://'.$request->host.$request->url;
    } else {
        $http['url'] = $request->protocolo.'://'.$request->host.':'.$request->port.$request->url;
    }

    $http['method'] = strtolower($request->method);

    switch ($http['method']) {
        case "get":
            $response = Http::withHeaders(json_decode($request->header,true))->get($http['url']);
            break;
        case "post":
            $response = Http::withHeaders(json_decode($request->header,true))->post($http['url'],json_decode($request->input,true));
            break;
        case "patch":
            //$response = Http::withHeaders(json_decode($request->header,true))->patch($http['url'],json_decode($request->input,true));
            break;
        case "put":
            //$response = Http::withHeaders(json_decode($request->header,true))->put($http['url'],json_decode($request->input,true));
            break;
        case "delete":
            $response = Http::withHeaders(json_decode($request->header,true))->delete($http['url']);
            break;
        default:
            echo "WTF";
    }

    $data = json_decode($response, true);

    if ($data) {
        $data = json_encode($data, JSON_PRETTY_PRINT);
    } else {
        $data = $response;
    }
    
    return view(
        'response',[
        'method' => $http['method'],
        'url' => $http['url'],
        'response' => $response,
        'body' => $data
    ]);
});

//resources hosts
Route::get('/xhosts', function () {
    
    $hosts = Host::all();
    return view('hosts/hosts',['hosts' => $hosts]);
});

Route::get('/xhosts/{id}', function ($id) {

    return view('hosts/update',['host' => Host::find($id)]);
});

Route::post('/xhost', function (Request $request) {
    
    $host = new Host();
    $host->protocolo = $request->protocolo;
    $host->host = $request->host;
    $host->port = $request->port;
    $host->save();
    
    return redirect('xhosts');
});

Route::patch('/xhost/{id}', function (Request $request, $id) {
    
    $host = Host::find($id);
    $host->protocolo = $request->protocolo;
    $host->host = $request->host;
    $host->port = $request->port;
    $host->save();
    
    //redirect http res cod WTF!!
    $hosts = Host::all();
    return view('hosts/hosts',['hosts' => $hosts]);
});

Route::delete('/xhosts/{id}', function ($id) {
    
    $host = Host::with('urls')->find($id);
    $host->urls()->delete();
    $host->delete();
    
    //redirect http res cod WTF!!
    $hosts = Host::all();
    return view('hosts/hosts',['hosts' => $hosts]);
});

Route::get('/xhosts-create', function () {
    
    return view('hosts/create');
});

//resources urls
Route::get('/xurls', function () {

    return view('urls/urls',['urls' => Urls::all()]);
});

Route::get('/xurls/{id?}', function ($id) {
    
    return view('urls/update',['url' => Url::find($id)]);
});

Route::post('/xurls', function (Request $request) {

    $url = new Url();
    
    $url->method = strtolower($request->method);
    $url->url = $request->url;
    $url->header = $request->header;
    $url->input = $request->input;
    $url->host_id = $request->host_id;
    $url->save();

    // wtf redirect
    $host_id = $url->host->id;
    return view('urls/urls',['urls' => Host::find($host_id)->urls]);
});

Route::patch('/xurls/{id}', function (Request $request, $id) {

    $url = Url::find($id);
    
    $url->method = strtolower($request->method);
    $url->url = $request->url;
    $url->header = $request->header;
    $url->input = $request->input;
    $url->save();
    
    // wtf redirect
    $host_id = $url->host->id;
    return view('urls/urls',['urls' => Host::find($host_id)->urls]);
});

Route::delete('/xurls/{id}', function ($id) {
    
    $url = Url::find($id);
    $host_id = $url->host->id;
    $url->delete();
    
    // wtf redirect
    return view('urls/urls',['urls' => Host::find($host_id)->urls]);
});

Route::get('/xurls-create/{host_id}', function ($host_id) {
    
    return view('urls/create',['host' => Host::find($host_id)]);
});

//juachaseadasssss....
Route::get('/juancheo', function () {
    echo '';
});