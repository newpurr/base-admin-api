<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\Router;

Route::get('/', function (Router $router) {
    // $client = new \GuzzleHttp\Client(['cookies' => true]);
    // $r = $client->request('GET', 'https://mall.api.epet.com/v3/index/main.html?do=getDynamicV415&pet_type=dog&version=415&is_single=0&system=wap&isWeb=1');
    //
    // $cookieJar = $client->getConfig('cookies');
    //
    // var_dump($r, $cookieJar->toArray());
    dd($router->getRoutes());
    return view('welcome');
});

Route::post('/upload', 'Util\FileManager@upload');
