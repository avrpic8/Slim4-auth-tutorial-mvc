<?php

use Slim\App;
use System\Application\Application;
use Psr\Http\Message\ResponseInterface as Response;
use Jenssegers\Blade\Blade;
use Laminas\Config\Config;

function view(Response $response, $template, $with = []){
    $cache = __DIR__ . '/../../cache';
    $views = __DIR__ . '/../../resources/views';
    $blade = (new Blade($views, $cache))->make($template, $with);
    $response->getBody()->write($blade->render());
    return $response;
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

function flash($name, $message = null){

    if(empty($message)){
        if(isset($_SESSION["temporary_flash"][$name])){
            $temporary = $_SESSION["temporary_flash"][$name];
            unset($_SESSION["temporary_flash"][$name]);
            return $temporary;
        }else{
            return false;
        }
    }else{
        $_SESSION["flash"][$name] = $message;
    }
}

function flashExist($name){

    return isset($_SESSION["temporary_flash"][$name]) === true ? true : false;
}

function allFlashes(){

    if(isset($_SESSION["temporary_flash"])){
        $temporary = $_SESSION["temporary_flash"];
        unset($_SESSION["temporary_flash"]);
        return $temporary;
    }else{
        return false;
    }
}

function error($name, $message = null){

    if(empty($message)){
        if(isset($_SESSION["temporary_errorFlash"][$name])){
            $temporary = $_SESSION["temporary_errorFlash"][$name];
            unset($_SESSION["temporary_errorFlash"][$name]);
            return $temporary;
        }else{
            return false;
        }
    }else{
        $_SESSION["errorFlash"][$name] = $message;
    }
}

function errorExist($name){

    return isset($_SESSION["temporary_errorFlash"][$name]) === true ? true : false;
}

function allErrors(){

    if(isset($_SESSION["temporary_errorFlash"])){
        $temporary = $_SESSION["temporary_errorFlash"];
        unset($_SESSION["temporary_errorFlash"]);
        return $temporary;
    }else{
        return false;
    }
}

function currentDomain(): string{

    $httpProtocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") ? "https://" : "http://";
    $currentUrl = $_SERVER['HTTP_HOST'];
    return $httpProtocol . $currentUrl;
}

function asset($src): string{

    return currentDomain() . ("/" . trim($src, "/ "));
}

function url($url): string{

    return currentDomain() . ("/" . trim($url, "/ "));
}

function currentUrl(): string{

    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function generateToken(){

    return bin2hex(openssl_random_pseudo_bytes(32));
}

function getApp(): App{
    return Application::getApp();
}

function getConfig(): Config{
    return Application::getConfig();
}


