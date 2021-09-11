<?php


use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;



function view(Response $response, $template, $with = []){
    $cache = __DIR__ . '/../../cache';
    $views = __DIR__ . '/../../resources/views';
    $blade = (new Blade($views, $cache))->make($template, $with);
    $response->getBody()->write($blade->render());
    return $response;
}


function asset($dir){

    global $base_url;
    $path = $base_url . "/" . $dir;
    echo $path;
}

function dd($value, $die = true){

    var_dump($value);
    if($die) exit();
}

function html($text){

    return html_entity_decode($text);
}


function old($name){

    if(isset($_SESSION["temporary_old"][$name])){
        return $_SESSION["temporary_old"][$name];
    }else{
        return null;
    }
}
