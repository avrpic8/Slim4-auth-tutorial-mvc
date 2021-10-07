<?php

function sideBarActive($url, $contain = true){

    if ($contain){
        return (strpos(currentRoute(), $url) === 0) ? 'active' : '';
    }else{
        return currentRoute() === $url ? 'active' : '';
    }
}

function errorClass($name): string{

    return errorExist($name) ? 'is-invalid' : '';
}

function errorText($name): string{

    return errorExist($name) ? '<div><small class="text-danger">' . error($name) . '</small></div>' : '';
}

function oldOrValue($name, $value){

    return empty(old($name)) ? $value : old($name);
}