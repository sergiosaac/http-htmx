<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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
    return view('welcome');
});


Route::get('/http', function () {
    return view('http');
});


Route::post('/response', function (Request $request) {

    $http = [];
    $http['url'] = $request->protocolo.'://'.$request->host.':'.$request->port.$request->url;
    $http['method'] = $request->method;

    switch ($http['method']) {
        case "get":
            $response = Http::withHeaders(json_decode($request->header,true))->get($http['url']);
            break;
        case "post":
            echo "Your favorite color is blue!";
            break;
        case "patch":
            echo "Your favorite color is green!";
            break;
        case "put":
            echo "Your favorite color is green!";
            break;
        case "delete":
            echo "Your favorite color is green!";
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green!";
    }

    $data = json_decode($response, true);
    $body = json_encode($data, JSON_PRETTY_PRINT);
    
    return view(
        'response',[
        'method' => $http['method'],
        'url' => $http['url'],
        'response' => $response,
        'body' => $body
    ]);
});

Route::get('/admin_host', function () {
    return view('admin_host');
});

Route::get('/admin_url/{id?}', function ($id = null) {

    if ($id) {
        return view('admin_url__update');
    } else {
        return view('admin_url');
    }
});
