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

Route::get('/admin_host', function () {
    
    $hosts = Host::all();
    
    return view('hosts/admin_host',
        ['hosts' => $hosts]
    );
});

Route::get('/admin_url/{id?}', function ($id = null) {

    if ($id) {
        $url = Url::find($id);
        return view('urls/admin_url__update',
            [
                'url' => $url
            ]);
    }
});

Route::get('/create_url/{id?}', function ($id = null) {

    if ($id) {
        $host = Host::find($id);
        return view(
            'urls/admin_url',
            ['host' => $host]
        );
    }
});

Route::patch('/url/{id}', function (Request $request, $id) {

    $url = Url::find($id);
    
    $url->method = strtolower($request->method);
    $url->url = $request->url;
    $url->header = $request->header;
    $url->input = $request->input;
    $url->save();
    
    $host_selected = Host::find($url->host->id);
    $urls = $host_selected->urls;
    return view('urls/url_list',['urls' => $urls]);
});

Route::post('/url', function (Request $request) {

    $url = new Url();
    
    $url->method = strtolower($request->method);
    $url->url = $request->url;
    $url->header = $request->header;
    $url->input = $request->input;
    $url->host_id = $request->host_id;
    $url->save();
    
    // $host_selected = Host::find($url->host->id);
    // $urls = $host_selected->urls;
    // return view('url_list',['urls' => $urls]);

    $host_selected = Host::find($request->host_id);
    $urls = $host_selected->urls;
    $hosts = Host::all();
    
    return view('http',
        [
            'urls' => $urls,
            'hosts' => $hosts,
            'host_selected' => $host_selected
        ]
    );
});

Route::delete('/url/{id}/{host_id}', function ($id, $host_id) {
    
    $url = Url::find($id);
    $url->delete();
    $host_selected = Host::find($host_id);
    $urls = $host_selected->urls;
    $hosts = Host::all();
    
    return view('http',
        [
            'urls' => $urls,
            'hosts' => $hosts,
            'host_selected' => $host_selected
        ]
    );
});

Route::get('/url_list/{id?}', function ($id = null) {
    $host_selected = Host::find($id);
    $urls = $host_selected->urls;
    return view('urls/url_list',['urls' => $urls]);    
});